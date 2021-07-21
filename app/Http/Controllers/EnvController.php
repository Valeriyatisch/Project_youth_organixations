<?php

namespace App\Http\Controllers;

use App\Models\AccEnvironment;
use App\Models\EnvConnection;
use App\Models\EnvImages;
use App\Models\Organizations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnvController extends Controller
{
    public function pmcShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMCAdmin')
            return view('access-env', ['envImg' => EnvImages::all()]);
        else return view('errors/404');
    }

    public function submit(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'address' => 'required',
            'check' => 'required'
        ]);

        $acc_env = new AccEnvironment();
        $acc_env->org_name = $req->input('name');
        $acc_env->address = $req->input('address');
        $acc_env->org_id = auth()->user()->organization_id;

        if($acc_env->save())
        {
            foreach ($req->input('check') as $value)
            {
                $env_con = new EnvConnection();
                $env_con->id_env = $acc_env->id;
                $env_con->id_img = $value;
                $env_con->save();
            }
        };

        return redirect('/pmc-admin/environment-form')->with('success', 'Запись добавлена!');
    }

    public function showEnvironment($id)
    {
        return view('acc-env', [
            'org' => Organizations::find($id),
            'envs' => AccEnvironment::where('org_id', $id)->get(),
            'env_cons' => DB::table('env_connections')->leftJoin('env_images', 'env_connections.id_img', '=', 'env_images.id')->get()
        ]);
    }
}
