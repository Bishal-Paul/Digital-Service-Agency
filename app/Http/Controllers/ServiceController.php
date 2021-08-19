<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\ServiceInner;
use App\Models\Work;
use Carbon\Carbon;
use Faker\Provider\Image as ProviderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use League\CommonMark\Inline\Element\Image as ElementImage;

class ServiceController extends Controller
{
    
    function AddServiceCat(){

        return view('backend.service.add_service_category');
    }

    function PostServiceCat(Request $request){

        if($request->hasFile('cat_image')){
            $file = $request->file('cat_image');
            $ext = Str::lower(Str::random(5)) .'-'. $file->getClientOriginalExtension(); 
            $image = Image::make($file)->save(public_path('thumbnail/'.$ext));

            ServiceCategory::insert([
                'title' => $request->title,
                'summary' => $request->summary,
                'cat_image' => $ext,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Data inserted!');
        }
        else{
            return back();
        }
    }

    function ViewServiceCat(){
        $cat = ServiceCategory::all();
        return view('backend.service.view_service_category', compact('cat'));
    }

    function EditServiceCat($id){
        $category = ServiceCategory::findOrFail($id);
        return view('backend.service.edit_service_category', compact('category'));
    }

    function UpdateServiceCat(Request $request){

        if($request->hasFile('cat_image')){
            $image = $request->file('cat_image');
            $id = $request->category_id;
            $old_image = ServiceCategory::findOrFail($id)->cat_image;
            
            if(file_exists(public_path('thumbnail/'.$old_image))){
                unlink(public_path('thumbnail/'.$old_image));
            }

            $ext = Str::lower(Str::random(5)) . '.' .$image->getClientOriginalExtension();
            Image::make($image)->save(public_path('thumbnail/'.$ext));
            
            ServiceCategory::findOrFail($id)->update([
                'title' => $request->title,
                'summary' => $request->summary,
                'cat_image' => $ext,
                'updated_at' => Carbon::now()
            ]);
        }
        else {
            $id = $request->category_id;
            ServiceCategory::findOrFail($id)->update([
                'title' => $request->title,
                'summary' => $request->summary,
                'updated_at' => Carbon::now()
            ]);
        }

        return back()->with('success', 'Category Updated Successfully');
    }

    function DeleteServiceCat($id){
        ServiceCategory::findOrFail($id)->delete();
        return back()->with('success', 'Category Deleted Successfully');
    }

    // Service Inner

    function Services(){
        $cat = ServiceCategory::all();
        return view('frontend.services', compact('cat'));
    }

    function AddServiceInner(){
        $cat = ServiceCategory::all();
        return view('backend.service.add_service_inner', compact('cat'));
    }

    function PostServiceInner(Request $request){

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) .'-'. $file->getClientOriginalExtension(); 
            $image = Image::make($file)->save(public_path('thumbnail/'.$ext));

            ServiceInner::insert([
                'title' => $request->title,
                'image' => $ext,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Service Inserted Successfully..');
        }
        else{
            return back();
        }
    }

    function ViewServiceInner(){
        $items = ServiceInner::all();
        return view('backend.service.view_service_inner', compact('items'));
    }

    function EditServiceInner($id){
        $serinner = ServiceInner::findOrFail($id);
        $category = ServiceCategory::all();
        return view('backend.service.edit_service_inner', compact('serinner','category'));
    }

    function UpdateServiceInner(Request $request){
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $id = $request->service_id;
            $old_image = ServiceInner::findOrFail($id)->image;
            
            if(file_exists(public_path('thumbnail/'.$old_image))){
                unlink(public_path('thumbnail/'.$old_image));
            }

            $ext = Str::lower(Str::random(5)) . '.' .$image->getClientOriginalExtension();
            Image::make($image)->save(public_path('thumbnail/'.$ext));
            
            ServiceInner::findOrFail($id)->update([
                'title' => $request->title,
                'image' => $ext,
                'description' => $request->description,
                'category_id' => $request->category,
                'updated_at' => Carbon::now()
            ]);
        }
        else {
            $id = $request->service_id;
            ServiceInner::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category,
                'updated_at' => Carbon::now()
            ]);
        }

        return back()->with('success', 'Service Content Updated Successfully');
    }

    function DeleteServiceInner($id){
        ServiceInner::findOrFail($id)->delete();
        return back()->with('success', 'Service Deleted Successfully');
    }

    function Service($id){
        $cat = ServiceCategory::all();
        $service = ServiceInner::where('category_id', $id)->get();
        return view('frontend.service_page', compact('service','cat'));
    }

    function SingleService($id){
        $cat = ServiceCategory::all();
        $recent_work = Work::all();
        $single_service = ServiceInner::with('category')->where('title', $id)->get();
        return view('frontend.single_service', compact('cat','recent_work', 'single_service'));
    }
}
