<?php

namespace App\Http\Controllers;

use App\Models\Organizations;
use App\Models\Schedules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function pmkShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMKAdmin')
            return view('schedule-form');
        else return view('errors/404');
    }

    public function submit(Request $req)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'worker' => 'required',
            'group' => 'required'
        ];
        $messages = [
            'name.required' => 'Поле наименование обязательно для заполнения',
            'address.required' => 'Поле адрес обязательно для заполнения',
            'worker.required' => 'Поле сотрудник обязательно для заполнения',
            'group.required' => 'Поле группа обязательно для заполнения'
        ];

        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/pmk-admin/schedule-form')
                ->withErrors($validator)
                ->withInput();
        }

        $schedule = new Schedules();
        $schedule->name = $req->input('name');
        $schedule->address = $req->input('address');
        $schedule->worker = $req->input('worker');
        $schedule->group = $req->input('group');
        $schedule->mondey = $req->input('monday');
        $schedule->tuesday = $req->input('tuesday');
        $schedule->wednesday = $req->input('wednesday');
        $schedule->thursday = $req->input('thursday');
        $schedule->friday = $req->input('friday');
        $schedule->saturday = $req->input('saturday');
        $schedule->organization_id = auth()->user()->organization_id;

        $schedule->save();

        return redirect('/pmk-admin/schedule-form')->with('success', 'Расписание добавлено!');
    }

    public function showSchedule($id)
    {
        $schedule = Schedules::where('organization_id', $id)->get();
        $org = Organizations::find($id);

        return view('schedule', ['schedule' => $schedule, 'org' => $org]);
    }
}
