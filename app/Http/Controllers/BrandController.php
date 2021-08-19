<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function AddBrand(){

        return view('backend.brand.add_brand');
    }

    function PostBrand(Request $request){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) .'-'. $file->getClientOriginalExtension(); 
            $image = Image::make($file)->resize(300, 200)->save(public_path('thumbnail/'.$ext));

            Brand::insert([
                'name'=>$request->name,
                'image'=>$ext,
                'created_at'=>Carbon::now()
            ]);
            return back()->with('success', 'Data inserted!');
        }
        else{
            return back();
        }
    }

    function ViewBrand(){
        $brands = Brand::all();
        return view('backend.brand.view_brand', compact('brands'));
    }

    function DeleteBrand($id){
        Brand::findorfail($id)->delete();
        return back()->with('success', 'Data deleted successfully');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
