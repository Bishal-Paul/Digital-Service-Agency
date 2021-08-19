<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\BillingInfo;
use App\Models\CheckoutInfo;
use App\Models\City;
use App\Models\Country;
use App\Models\Pricing;
use App\Models\ServiceCategory;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function StartPlan($id)
    {
        $cat = ServiceCategory::all();
        $service = Pricing::where('title', $id)->get();
        $countries = Country::all();
        $states = State::all();
        $citys = City::all();
        
        foreach($service as $item){
            $price = $item->price;
        }
        session(['price' => $price]);
        session(['service' => $service]);
        return view('frontend.start_plan', compact('cat', 'service', 'countries', 'states', 'citys'));
    }

    function Checkout(Request $request){

        $amount = $request->session()->get('price');
        $service = $request->session()->get('service');
        foreach($service as $item){
            $id = $item->id;
            $title = $item->title;
            $price = $item->price;
        }

        if(isset($request->payment)){
            if($request->payment == 'stripe'){
                $token = $request->stripeToken;

                \Stripe\Stripe::setApiKey("sk_test_51H8SIlGBULCb8KcFWBHKuPhknXJTsT8NGe882mjmOPaplkVoLbl7X2P1VHorJ9HZFTSAzCbaHLHW66NjyxpTpY8v00q3neZOL6");

                $charge = \Stripe\Charge::create([
                    "amount" => $amount * 100,
                    "currency" => "usd",
                    "source" => $token, // obtained with Stripe.js
                    "description" => "My First Test Charge (created for API docs)"
                ]);

                $shipping_id = CheckoutInfo::insertGetId([
                    'user_id' => $request->user_id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'address2' => $request->address2,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'zip' => $request->zip,
                    'payment' => $request->payment,
                    'created_at' => Carbon::now(),
                ]);

                BillingInfo::insert([
                    'pricing_id' => $id,
                    'shipping_id' => $shipping_id,
                    'service_name' => $title,
                    'price' => $price,
                    'created_at' => Carbon::now()
                ]);
                
                $billing = BillingInfo::where('shipping_id', $shipping_id)->get();
                Mail::to(Auth::user()->email)->send(new OrderShipped($billing));
                return view('frontend.checkout_complete');
            }
            elseif($request->payment == 'paypal') {
                return back()->with('success', 'Paypal Payment method is currently not available.');
            }
            else{
                return back()->with('success','You have changed the Payment method value.');
            }
        }
        else{
            return back()->with('success', 'Please select a Payment Method.');
        }
    }


    // Get Country, State City by Ajax
    function GetState($id){
        $state = State::where('country_id', $id)->orderBy('name', 'asc')->get();
        return response()->json($state);
    }

    function GetCity($id){
        $city = City::where('state_id', $id)->orderBy('name', 'asc')->get();
        return response()->json($city);
    }

    //Order Details

    function ViewOrders(){
        $billings = BillingInfo::with('shipping')->latest()->paginate(10);
        return view('backend.order_details.view_all_users', compact('billings'));
    }

    function OrderDetails($id){
        $billings = BillingInfo::with('shipping')->findOrFail($id);
        return view('backend.order_details.order_details', compact('billings'));
    }
    
}


