<?php

namespace App\Http\Controllers;

use App\Models\SiteInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class SiteInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function AddInfo()
    {

        return view('backend.info.add_info');
    }

    function PostInfo(Request $request)
    {
        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $ext = Str::lower(Str::random(5)) . '-' . $file->getClientOriginalExtension();
            $image = Image::make($file)->resize(128, 60)->save(public_path('thumbnail/' . $ext));


            SiteInfo::insert([
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'website' => $request->website,
                'site_logo' => $ext,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Information Inserted Successfully..');
        } else {
            return back();
        }
    }

    function ViewInfo()
    {
        $info = SiteInfo::all();
        return view('backend.info.view_info', compact('info'));
    }

    function EditInfo($id)
    {
        $info = SiteInfo::findOrFail($id);
        return view('backend.info.edit_blog', compact('info'));
    }

    function UpdateInfo(Request $request)
    {
        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $id = $request->id;
            $old_image = SiteInfo::findOrFail($id)->site_logo;

            if (file_exists(public_path('thumbnail/' . $old_image))) {
                unlink(public_path('thumbnail/' . $old_image));
            }

            $ext = Str::lower(Str::random(5)) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('thumbnail/' . $ext));

            SiteInfo::findOrFail($id)->update([
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'website' => $request->website,
                'top_logo' => $ext,
                'updated_at' => Carbon::now()
            ]);
        } else {
            $id = $request->id;
            SiteInfo::findOrFail($id)->update([
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'website' => $request->website,
                'updated_at' => Carbon::now()
            ]);
        }

        return back()->with('success', 'Information Updated Successfully');
    }

    function DeleteInfo($id)
    {
        SiteInfo::findorfail($id)->delete();
        return back()->with('success', 'Data deleted successfully');
    }
}
