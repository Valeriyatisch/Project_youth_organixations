<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Files;
use App\Models\Organizations;
use App\Models\SectionFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class DocumentController extends Controller
{
    public function pmcShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMCAdmin')
            return view('doc-form', [
                'name' => 'pmc-admin',
                'doc_section' => Documents::where('organization_id', auth()->user()->organization_id)->get()
                ]);
        else return view('errors/404');
    }

    public function pmkShow()
    {
        if(isset(auth()->user()->role) && auth()->user()->role == 'PMKAdmin')
            return view('doc-form', [
                'name' => 'pmk-admin',
                'doc_section' => Documents::where('organization_id', auth()->user()->organization_id)->get()
            ]);
        else return view('errors/404');
    }

    public function submit(Request $req)
    {
        $rules = [
            'files' => 'required'
        ];
        $messages = [
            'files.required' => 'Файл не выбран',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/pmc-admin/doc-form')
                ->withErrors($validator)
                ->withInput();
        }

        if($req->input('sect_name') == 0)
        {
            $rules['name'] = 'required';
            $messages['name.required'] = 'Заполните поле название раздела';

            $validator = Validator::make($req->all(), $rules, $messages);

            if ($validator->fails()) {

                if(auth()->user()->role == 'PMCAdmin')
                {
                    return redirect('/pmc-admin/doc-form')
                        ->withErrors($validator)
                        ->withInput();
                }

                if(auth()->user()->role == 'PMKAdmin')
                {
                    return redirect('/pmk-admin/doc-form')
                        ->withErrors($validator)
                        ->withInput();
                }
            }

            $doc = new Documents();
            $doc->name_section = $req->input('name');
            $doc->organization_id = auth()->user()->organization_id;

            if($doc->save())
            {
                $this->uploadFile($doc->id, $req);
            }
        }
        else
        {
            $doc = Documents::find($req->input('sect_name'));
            $this->uploadFile($doc->id, $req);
        }

        if(auth()->user()->role == 'PMCAdmin')
            return redirect('/pmc-admin/doc-form')->with('success', 'Документы добавлены!');

        if(auth()->user()->role == 'PMKAdmin')
            return redirect('/pmk-admin/doc-form')->with('success', 'Документы добавлены!');
    }

    public function uploadFile($doc_id, Request $req)
    {
        $files = $req->file()["files"];

        foreach ($files as $file)
        {
            $path = $file->store('/public/documents');
            $path = str_replace("public", "", $path);

            $placeholders = array('.jpg', '.docx', '.doc', '.pdf');

            $new_file = new Files();
            $new_file->name = str_replace($placeholders, "", $file->getClientOriginalName());
            $new_file->file = $path;
            $new_file->type = "documents";

            if($new_file->save())
            {
                $sect_file = new SectionFile();
                $sect_file->id_document = $doc_id;
                $sect_file->id_file = $new_file->id;

                $sect_file->save();
            }
        }
    }

    public function showOrgDocuments($id)
    {
        return view('documents', [
            'org' => Organizations::find($id),
            'docs' => Documents::where('organization_id', $id)->get(),
            'files' => Files::all(),
            'sect_files' => SectionFile::all()
        ]);
    }
}
