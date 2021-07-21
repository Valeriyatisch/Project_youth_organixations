<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutRequest;
use App\Models\Districts;
use App\Models\News;
use App\Models\Organizations;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function pmcShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMCAdmin')
        {
            $org = Organizations::where('id', auth()->user()->organization_id)->first();
            return view('about-form', [
                'name' => 'pmc-admin',
                'dists' => Districts::where('id', '!=', $org->dist_id)->get(),
                'my_dist' => Districts::where('id', $org->dist_id)->first(),
                'org' => $org]);
        }
        else return view('errors/404');
    }

    public function pmkShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMKAdmin')
        {
            $org = Organizations::where('id', auth()->user()->organization_id)->first();
            return view('about-form', [
                'name' => 'pmk-admin',
                'dists' => Districts::where('id', '!=', $org->dist_id)->get(),
                'my_dist' => Districts::where('id', $org->dist_id)->first(),
                'org' => $org]);
        }
        else return view('errors/404');
    }

    public function updateAbout(AboutRequest $req)
    {
        $org = Organizations::find(auth()->user()->organization_id);
        $org->full_name = $req->input('fullname');
        $org->short_name = $req->input('shortname');
        $org->email = $req->input('email');
        $org->phone = $req->input('phone');
        $org->address = $req->input('address');
        $org->dist_id = $req->input('district');
        $org->vk_group = $req->input('vkgroup');
        $org->about = $req->input('text');
        $org->image = $this->update($req);

        $org->save();

        if(auth()->user()->role == "PMCAdmin")
            return redirect('/pmc-admin/about-form')->with('success', 'Информация обновлена!');

        if(auth()->user()->role == "PMKAdmin")
            return redirect('/pmk-admin/about-form')->with('success', 'Информация обновлена!');
    }

    public function update(Request $request)
    {
        if(!empty($request->file('img')))
        {
            $path = $request->file('img')->store('/public/images');
            $path = str_replace("public", "", $path);
            return $path;
        }
        return null;
    }
}
