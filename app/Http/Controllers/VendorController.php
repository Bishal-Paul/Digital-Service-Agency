<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use App\Models\VendorAccount;
use App\Models\VendorWork;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class VendorController extends Controller
{
    function RegisterToSell(){
        $cat = ServiceCategory::all();
        return view('frontend.start_selling', compact('cat'));
    }

    function PostVendor(Request $request){
        $request->validate([
            'name' => ['required'],
            'username' => ['required', 'unique:vendor_accounts'],
            'email' => ['required', 'unique:vendor_accounts'],
            'password' => ['required']
        ]);

        VendorAccount::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('AddYourWork');
    }

    function SubmitWork(Request $request){
        
        $vendor_ids = VendorAccount::latest()->take(1)->get('id');
        foreach($vendor_ids as $vendor_id){
            $id = $vendor_id->id;
        }
        $request->validate([
            'category' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image']
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = Str::lower(Str::random(5)) . '-' . $file->getClientOriginalExtension();
            $image = Image::make($file)->save(public_path('thumbnail/' . $ext));

            VendorWork::insert([
                'vendor_id' => $id,
                'category' => $request->category,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $ext,
                'created_at' => Carbon::now()
            ]);

            return redirect()->route('WelcomeToDSA');
        } 
        else{
            return back();
        }
    }

    function WelcomeToDSA(){
        $vendor_ids = VendorAccount::latest()->take(1)->get('id');
        foreach ($vendor_ids as $vendor_id) {
            $id = $vendor_id->id;
        }
        $work = VendorWork::where('vendor_id', $id)->latest()->take(1)->first();
        $recent_work = VendorWork::orderBy('title', 'asc')->get();
        return view('frontend.vendor-store', compact('work', 'recent_work'));
    }

    //Backend
    function ViewSellerAccount(){
        $accounts = VendorAccount::all();
        return view('backend.seller_info.view_seller_accounts', compact('accounts'));
    }

    function ViewSellerWorks(){
        $works = VendorWork::get();
        return view('backend.seller_info.view_seller_works', compact('works'));
    }
}
