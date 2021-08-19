<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Pricing;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    function AddCoupon(){
        $plan = Pricing::all();
        return view('backend.coupon.add_coupon', compact('plan'));
    }

    function PostCoupon(Request $request){
        Coupon::insert([
            'plan_id' => $request->plan_id,
            'coupon_name' => $request->coupon_name,
            'coupon_code' => $request->coupon_code,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Coupon added successfully');
    }

    function ViewCoupon(){
        $coupon = Coupon::with('plan')->get();
        return view('backend.coupon.view_coupon', compact('coupon'));
    }

    function DeleteCoupon($id){
        Coupon::findorfail($id)->delete();
        return back()->with('success', 'Data deleted successfully');
    }

    function EditCoupon($id){
        $coupon = Coupon::findOrFail($id);
        $plan = Pricing::all();
        return view('backend.coupon.edit_coupon', compact("coupon", 'plan'));
    }

    function UpdateCoupon(Request $request){
        $id = $request->id;
        Coupon::findOrFail($id)->update([
            'plan_id' => $request->plan_id,
            'coupon_name' => $request->coupon_name,
            'coupon_code' => $request->coupon_code,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success', 'Data Updated Successfully');
    }

    function CheckCoupon(Request $request){
        $coupon = $request->coupon_code;
        if(isset($coupon)){
            if(Coupon::where('coupon_code', $request->coupon_code)->exists()){
                if(Carbon::now()->format('Y-m-d') <= Coupon::where('coupon_code', $request->coupon_code)->first()->coupon_validity){
                     $id = $request->my_id;
                     if(Coupon::where('plan_id', $id)->first()){
                        $price = Pricing::where('id', $id)->get('price');
                        $discount = Coupon::where('plan_id', $id)->get('coupon_discount');
                        
                        return back()->with('success', 'Congratulations. You got the discount.');
                     }
                     else{
                        return back()->with("failed", 'Sorry, Invaild Coupon Code.');
                     }
                }
                else {
                    return back()->with("failed", 'Sorry, this Coupon has expired.');
                }
            }
            else {
                return back()->with("failed", 'Invaild Coupon');
            }
        }
        else{
            return back()->with("failed",'Please submit a Coupon if have one.');
        }
    }
}
