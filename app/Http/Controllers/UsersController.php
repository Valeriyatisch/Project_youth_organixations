<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Organizations;
use App\Models\TypeOrgs;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function submit(UsersRequest $req)
    {
        $user = new Users();
        $user->name = $req->input('name');
        $user->surname = $req->input('surname');
        $user->email = $req->input('email');
        $user->password = Hash::make($req->input('pwd'));
        $user->role = $this->getType($req);
        $user->organization_id = $req->input('org');

        $user->save();

        return redirect('/admin-site/users-form')->with('success', 'Пользователь добавлен!');
    }

    public function show()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'siteAdmin')
            return view('users-form', ['org' => Organizations::all()->sortBy('name')]);
        else return view('errors/404');
    }

    public function getType(UsersRequest $req)
    {
        $org = new Organizations();
        $type_id = $org->where('id', $req->input('org'))->first()->type_org_id;

        if($type_id == 1)
            $role = "PMCAdmin";
        if($type_id == 2)
            $role = "PMKAdmin";

        return $role;
    }

    public function showUsersTable()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'siteAdmin')
            return view('users-table', ['users' => Users::where('role', '!=', 'client')->get(), 'orgs' => Organizations::all()]);
        else return view('errors/404');
    }
}
