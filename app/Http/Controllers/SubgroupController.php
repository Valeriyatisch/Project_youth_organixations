<?php

namespace App\Http\Controllers;

use App\Models\Organizations;
use App\Models\Subgroups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubgroupController extends Controller
{
    public function pmkShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMKAdmin')
            return view('subgroup-form');
        else return view('errors/404');
    }

    public function submit(Request $req)
    {
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Поле имя обязательно для заполнения',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/pmk-admin/subgroup-form')
                ->withErrors($validator)
                ->withInput();
        }

        $subgr = new Subgroups();
        $subgr->name = $req->input('name');
        $subgr->text = $req->input('text');
        $subgr->organization_id = auth()->user()->organization_id;

        if(!empty($req->file('img')))
            $subgr->image = $this->uploadImage($req);

        $subgr->save();

        return redirect('/pmk-admin/subgroup-form')->with('success', 'Запись добавлена!');

    }

    public function uploadImage(Request $request)
    {
        $path = $request->file('img')->store('/public/images');
        $path = str_replace("public", "", $path);

        return $path;
    }

    public function showGroups($id)
    {
        return view('subgroups', [
            'org' => Organizations::find($id),
            'groups' => Subgroups::where('organization_id', $id)->get()
        ]);
    }
}
