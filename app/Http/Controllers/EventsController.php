<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventsRequest;
use App\Models\Events;
use App\Models\Organizations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function submit(EventsRequest $req)
    {
        $events = new Events();
        $events->header = $req->input('header');
        $events->text = $req->input('text');
        $events->add_info = $req->input('additional');
        $events->image = $this->update($req);
        $events->added_by = auth()->user()->name . ' ' . auth()->user()->surname;

        if(auth()->user()->organization_id != 0)
            $events->organization_id = auth()->user()->organization_id;
        else
            $events->organization_id = null;

        $events->save();

        if(auth()->user()->role == 'siteAdmin')
            return redirect('/admin-site/events-form')->with('success', 'Мероприятие добавлено!');

        if(auth()->user()->role == 'PMCAdmin')
            return redirect('/pmc-admin/events-form')->with('success', 'Мероприятие добавлено!');
    }

    public function update(Request $request)
    {
        $path = $request->file('img')->store('/public/images');
        $path = str_replace("public", "", $path);

        return $path;
    }

    public function show()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'siteAdmin')
            return view('events-form', ['name' => 'admin-site']);
        else return view('errors/404');
    }

    public function pmcShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMCAdmin')
            return view('events-form', ['name' => 'pmc-admin']);
        else return view('errors/404');
    }

    public function pmkShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMKAdmin')
            return view('events-form', ['name' => 'pmk-admin']);
        else return view('errors/404');
    }

    public function showEventsTable()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'siteAdmin')
            return view('events-table', ['name' => 'admin-site', 'events' => Events::all(), 'orgs' => Organizations::all()]);
        else return view('errors/404');
    }

    public function pmcShowEventsTable()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMCAdmin')
            return view('events-table', [
                'name' => 'pmc-admin',
                'events' => Events::where('organization_id', auth()->user()->organization_id)->get(),
                'orgs' => Organizations::all()]);
        else return view('errors/404');
    }

    public function pmkShowEventsTable()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMKAdmin')
            return view('events-table', [
                'name' => 'pmk-admin',
                'events' => Events::where('organization_id', auth()->user()->organization_id)->get(),
                'orgs' => Organizations::all()]);
        else return view('errors/404');
    }

    public function showEvents()
    {
        return view('events', ['events' => DB::table('events')->orderBy('created_at', 'desc')->paginate(9)]);
    }

    public function showOneEvent($id)
    {
        return view('one-event', ['event' => Events::find($id)]);
    }
}
