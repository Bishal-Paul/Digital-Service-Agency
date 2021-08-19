<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ServiceCategory;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Testimonial;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    
    function AddTestimonial(){

        return view('backend.testimonial.add_testimonial');
    }

    function PostTestimonial(Request $request){

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) .'-'. $file->getClientOriginalExtension(); 

            $image = Image::make($file)->save(public_path('thumbnail/'.$ext));

            Testimonial::insert([
                'name' => $request->name,
                'username' => $request->username,
                'text' => $request->text,
                'image' => $ext,
                'created_at' => Carbon::now(),
            ]);

            return back()->with('success', 'Data inserted!');
        }
    }

    function EditTestimonial($id){
        $items = Testimonial::findOrFail($id);
        return view('backend.testimonial.edit_testimonial', compact('items'));
    }

    function UpdateTestimonial(Request $request){

        if($request->hasFile('image')){
            $image = $request->file('image');
            $id = $request->id;
            $old_image = Testimonial::findOrFail($id)->image;
            
            if(file_exists(public_path('thumbnail/'.$old_image))){
                unlink(public_path('thumbnail/'.$old_image));
            }

            $ext = Str::lower(Str::random(5)) . '.' .$image->getClientOriginalExtension();
            Image::make($image)->save(public_path('thumbnail/'.$ext));
            
            Testimonial::findOrFail($id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'text' => $request->text,
                'image' => $ext,
                'updated_at' => Carbon::now()
            ]);
        }
        else {
            $id = $request->id;
            Testimonial::findOrFail($id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'text' => $request->text,
                'updated_at' => Carbon::now()
            ]);
        }
        return back()->with('success', 'Data Updated Successfully');
    }

    function ViewTestimonial(){
        $test = Testimonial::all();
        return view('backend.testimonial.view_testimonial', compact('test'));
    }

    function DeleteTestimonial($id){
        Testimonial::findorfail($id)->delete();
        return back()->with('success', 'Data deleted successfully');
    }



// RECENT WORKS

    function AddWork(){
        return view('backend.work.add_work');
    }
    function PostWork(Request $request){
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) .'-'. $file->getClientOriginalExtension(); 

            $image = Image::make($file)->resize(300, 200)->save(public_path('thumbnail/'.$ext));

            Work::insert([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $ext,
                'created_at' => Carbon::now(),
            ]);

            return back()->with('success', 'Data inserted!');
        }
    }

    function ViewWork(){
        $work = Work::all();
        return view('backend.work.view_work', compact('work'));
    }

    function EditWork($id){
        $work = Work::findOrFail($id);
        return view('backend.work.edit_work', compact('work'));
    }

    function UpdateWork(Request $request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $id = $request->work_id;
            $old_image = Work::findOrFail($id)->image;
            
            if(file_exists(public_path('thumbnail/'.$old_image))){
                unlink(public_path('thumbnail/'.$old_image));
            }

            $ext = Str::lower(Str::random(5)) . '.' .$image->getClientOriginalExtension();
            Image::make($image)->save(public_path('thumbnail/'.$ext));
            
            Work::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $ext,
                'updated_at' => Carbon::now()
            ]);
        }
        else {
            $id = $request->work_id;
            Work::findOrFail($id)->update([
                'title' => $request->title,
                'updated_at' => Carbon::now()
            ]);
        }
        return back()->with('success', 'Data Updated Successfully');
    }

    function DeleteWork($id){
        Work::findorfail($id)->delete();
        return back()->with('success', 'Data deleted successfully');
    }

    function WorkDetails($id){
        $work = Work::where('title', $id)->first();
        $cat = ServiceCategory::all();
        $all_works = Work::all();
        return view('frontend.work_details', compact('work', 'cat', 'all_works'));

    }



// Contact Part
    function PostContact(Request $request){
        Contact::insert([
            'company' => $request->company,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'summary' => $request->message,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Message Sent Successfully! ');
    }

    function ViewContact(){
        $contact = Contact::all();
        return view('backend.messages', compact('contact'));
    }

}
