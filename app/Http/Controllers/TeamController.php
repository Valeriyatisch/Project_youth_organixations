<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Organizations;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function pmkShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMKAdmin')
            return view('team-form');
        else return view('errors/404');
    }

    public function submit(Request $req)
    {
        $rules = [
            'name' => 'required',
            'position' => 'required'
        ];
        $messages = [
            'name.required' => 'Поле ФИО обязательно для заполнения',
            'position.required' => 'Поле должность обязательно для заполнения'
        ];

        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/pmk-admin/team-form')
                ->withErrors($validator)
                ->withInput();
        }

        $team = new Team();
        $team->name = $req->input('name');
        $team->position = $req->input('position');
        $team->image = $this->uploadImage($req);
        $team->organization_id = auth()->user()->organization_id;

        $team->save();

        return redirect('/pmk-admin/team-form')->with('success', 'Сотрудник добавлен!');
    }

    public function uploadImage(Request $request)
    {
        if(!empty($request->file('img')))
        {
            $path = $request->file('img')->store('/public/images');
            $path = str_replace("public", "", $path);
            return $path;
        }
        return null;
    }

    public function showTeam($id)
    {
        return view('team', [
            'org' => Organizations::find($id),
            'workers' => Team::where('organization_id', $id)->get()
        ]);
    }
}
