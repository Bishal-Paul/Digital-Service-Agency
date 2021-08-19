<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Models\ServiceCategory;
use App\Models\ServiceInner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Print_;

class PricingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function AddPricing(){

        return view('backend.pricing.add_pricing');
    }

    function PostPricing(Request $request){

        Pricing::insert([
            'price' => $request->price,
            'time' => $request->time,
            'title' => $request->title,
            'users' => $request->users,
            'storage' => $request->storage,
            'support' => $request->support,
            'other1' => $request->other1,
            'created_at'=> Carbon::now()
        ]);
        return back()->with('success', 'Data added successfully');
    }

    function ViewPricing(){
        $pricing = Pricing::all();
        return view('backend.pricing.view_pricing', compact('pricing'));
    }

    function DeletePricing($id){
        Pricing::findorfail($id)->delete();
        return back()->with('success', 'Data deleted successfully');
    }

    function EditPricing($id){
        $pricing = Pricing::find($id);
        return view('backend.pricing.edit_pricing', compact("pricing"));
    }

    function UpdatePricing(Request $request){
        $id = $request->id;
        Pricing::findOrFail($request->id)->update([
            'price' => $request->price,
            'time' => $request->time,
            'title' => $request->title,
            'users' => $request->users,
            'storage' => $request->storage,
            'support' => $request->support,
            'other1' => $request->other1,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('message', 'Data Updated Successfully');
    }

    
}
