<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Bannar;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function AddBannar(){
        return view('backend.bannar.add_bannar');
    }

    function PostBannar(Request $request){
        $request->validate([
            'image' => ['image', 'required']
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) . '-' . $file->getClientOriginalExtension();
            $image = Image::make($file)->save(public_path('thumbnail/' . $ext));

            Bannar::insert([
                'title' => $request->title,
                'image' => $ext,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Data inserted!');
        } 
        else {
            return back();
        }
    }

    function ViewBannar(){
        $bannar = Bannar::all();
        return view('backend.bannar.view_bannar', compact('bannar'));
    }

    function DeleteBannar($id){
        Bannar::findorfail($id)->delete();
        return back()->with('success', 'Data deleted successfully');
    }

    // Video Part

    function AddVideo(){

        return view('backend.bannar.add_video');
    }

    function PostVideo(Request $request){
        if($request->hasFile('video')){
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            $path = public_path('thumbnail/video');
            $file->move($path, $filename);

            Video::insert([
                'title' => $request->title,
                'video' => $filename,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Data inserted!');
        } 
        else {
            return back();
        }
    }

    function ViewVideo(){
        $video = Video::all();
        return view('backend.bannar.view_video', compact('video'));
    }

    function DeleteVideo($id){
        Video::findorfail($id)->delete();
        return back()->with('success', 'Data deleted successfully');
    }
}
