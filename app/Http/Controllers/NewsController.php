<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewRequest;
use App\Models\Organizations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function submit(NewRequest $req)
    {
        $news = new News();
        $news->header = $req->input('header');
        $news->text = $req->input('text');
        $news->image = $this->update($req);

        if(auth()->user()->organization_id != 0)
            $news->organization_id = auth()->user()->organization_id;
        else
            $news->organization_id = null;

        $news->added_by = auth()->user()->name . ' ' . auth()->user()->surname;

        $news->save();

        if(auth()->user()->role == 'siteAdmin')
            return redirect('/admin-site/news-form')->with('success', 'Новость добавлена!');

        if(auth()->user()->role == 'PMCAdmin')
            return redirect('/pmc-admin/news-form')->with('success', 'Новость добавлена!');

        if(auth()->user()->role == 'PMKAdmin')
            return redirect('/pmk-admin/news-form')->with('success', 'Новость добавлена!');
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
            return view('news-form', ['name' => 'admin-site']);
        else return view('errors/404');
    }

    public function pmcShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMCAdmin')
            return view('news-form', ['name' => 'pmc-admin']);
        else return view('errors/404');
    }

    public function pmkShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMKAdmin')
            return view('news-form', ['name' => 'pmk-admin']);
        else return view('errors/404');
    }

    public function showNewsTable()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'siteAdmin')
            return view('news-table', ['name' => 'admin-site', 'news' => News::all(), 'org' => Organizations::all()]);
        else return view('errors/404');
    }

    public function pmcShowNewsTable()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMCAdmin')
            return view('news-table', [
                'name' => 'pmc-admin',
                'news' => News::where('organization_id', auth()->user()->organization_id)->get(),
                'org' => Organizations::all()]);
        else return view('errors/404');
    }

    public function pmkShowNewsTable()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMKAdmin')
            return view('news-table', [
                'name' => 'pmk-admin',
                'news' => News::where('organization_id', auth()->user()->organization_id)->get(),
                'org' => Organizations::all()]);
        else return view('errors/404');
    }

    public function showNews()
    {
        return view('news', [
            'news' => DB::table('news')->orderBy('created_at', 'desc')->paginate(9)
            ]);
    }

    public function showOneNews($id)
    {
        return view('one-news', ['new' => News::find($id)]);
    }

    public function showOrgNews($id)
    {
        return view('news-org', ['news' => News::where('organization_id', $id)->get(), 'org' => Organizations::find($id)]);
    }

    public function newsChange($id)
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'siteAdmin')
            return view('news-form', [
                'name' => 'admin-site',
                'new' => News::find($id)
            ]);
        else return view('errors/404');
    }

    public function change($id, Request $req)
    {
        $new = News::find($id);
        $new->header = $req->input('header');
        $new->text = $req->input('text');
        $new->save();

        if(auth()->user()->role == 'siteAdmin')
            return redirect("/admin-site/news-change/$id")->with('success', 'Новость изменена!');
    }
}
