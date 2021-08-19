<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function Dashboard(){
        return view('backend.dashboard');
    }

    function Users(){
        $users = User::all();
        return view('backend.users.view_all_users', compact('users'));
    }

    function ChangeRole($id){
        $user = User::findOrFail($id);
        return view('backend.users.change_role', compact('user'));
    }

    function UpdateRole(Request $request){
        $id = $request->id;
        User::findOrFail($id)->update([
            'type' => $request->user_type,
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success', 'User Role Updated.');
    }
}
