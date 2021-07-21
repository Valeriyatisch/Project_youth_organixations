<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrgsRequest;
use App\Models\News;
use App\Models\Organizations;
use Illuminate\Support\Facades\DB;
use App\Models\TypeOrgs;
use App\Models\Districts;
use Illuminate\Http\Request;

class OrgsController extends Controller
{
    public function submit(OrgsRequest $req)
    {
        $org = new Organizations();
        $org->full_name = $req->input('fullname');
        $org->short_name = $req->input('shortname');
        $org->email = $req->input('email');
        $org->phone = $req->input('phone');
        $org->address = $req->input('address');
        $org->dist_id = $req->input('district');
        $org->type_org_id = $req->input('org');
        $org->org_id = $req->input('sub');
        $org->logo = $this->uploadImage($req);
        $org->vk_group = $req->input('vkgroup');

        $org->save();

        return redirect('/admin-site/organizations-form')->with('success', 'Организация добавлена!');
    }

    public function show()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'siteAdmin')
            return view('org-form', [
                'type_orgs' => TypeOrgs::all(),
                'dists' => Districts::all(),
                'orgs' => Organizations::where('type_org_id', 1)->get()]);
        else return view('errors/404');
    }

    public function showOrganizationTable()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'siteAdmin')
            return view('organization-table', ['data' => DB::table('organizations')->paginate(10), 'dist' => Districts::all()]);
        else return view('errors/404');
    }

    public function showOrganization()
    {
        if(isset($_GET['dist']))
        {
            return view('sort-org', [
                'orgs' => DB::table('organizations')->where('dist_id', '=', $_GET['dist'])->paginate(12),
                'dists' => Districts::all(),
                'type_orgs' => TypeOrgs::all()
            ]);
        }

        return view('youth-organization', [
            'orgs' => DB::table('organizations')->paginate(12),
            'dists' => Districts::all(),
            'type_orgs' => TypeOrgs::all()
            ]);
    }

    public function showOneOrganization($id)
    {
        return view('news-org', ['news' => News::where('organization_id', $id)->get(), 'org' => Organizations::find($id)]);
    }

    public function uploadImage(\Illuminate\Http\Request $request)
    {
        if(!empty($request->file('logo')))
        {
            $path = $request->file('logo')->store('/public/images');
            $path = str_replace("public", "", $path);

            return $path;
        }
        return null;
    }

    public function showAbout($id)
    {
        return view('about', [
            'org' => Organizations::find($id)
        ]);
    }

    public function showClubs($id)
    {
        return view('clubs', [
            'org' => Organizations::find($id),
            'clubs' => Organizations::where('org_id', $id)->get()
        ]);
    }

    public function showMap()
    {
        return view('map');
    }
}
