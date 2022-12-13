<?php

namespace App\Http\Controllers;
use App\Models\User;
use SoftDeletes;
use Auth;

use Illuminate\Http\Request;


class UserController extends Controller
{

     public function index()
    {
        $users = User::paginate(10);
        return view('users.index' , compact('users'));
    }


     public function admin_status(Request $request , $id)
    {
        $user = User::find($id);

        User::where('id' , $id)->update(['is_admin' => $request->is_admin]);
        return back();
        $user->is_admin = $request->is_admin ;

    } // admin_status

     public function update(Request $request )
    {
        $user->name = $request->name ;
        $user->is_admin = $request->is_admin ;
        $user->name = $request->email ;
        $user->email_verified_at = $request->email_verified_at ;
        $user->password = $request->password ;
        $user->current_team_id = $request->current_team_id ;
        $user->profile_photo_path = $request->profile_photo_path ;
        $user->save() ;

        return back();
    } // admin_status



    public function soft_delete($id)
    {
       $user = User::find($id)->delete();
        return redirect()->route('users.index')->with('success' , 'User Deleted Successfully');

    }// soft_delete


    public function users_trash()
    {
        $users = User::onlyTrashed()->paginate(10);

        return view('users.users_trash', compact('users'));

    } // users_trash


    public function users_restore($id)
    {
     $user = User::withTrashed()->find($id);
     $user->restore();
     return redirect()->route('users.index')->with('success', 'User Restored Successfully');

    }


    public function destroy($id)
    {
        $user = User::withTrashed()->find($id);
        $user->forceDelete() ;
        return redirect()->route('users.index')->with('success' , 'User Deleted Successfully');

    }// delete


    public function trash_number()
    {
        $users = User::onlyTrashed()->get();
        return view('layouts.backend.back_app' , compact('users'));

    }// delete



}
