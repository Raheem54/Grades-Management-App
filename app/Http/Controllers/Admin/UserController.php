<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data['users']=User::all();
        return view("admin.users.index")->with($data);
    }
    public function create(){
        return view("admin.users.create");
    }
    public function store(CreateNewUser $creator,Request $request){
        $creator->create($request->all());
        return redirect(url("dashboard/users"));
    }
    public function delete(Request $request){
        $user=User::find($request->id);
        if($user) {
            $user->delete();
        }
        return redirect()->back();
    }

}
