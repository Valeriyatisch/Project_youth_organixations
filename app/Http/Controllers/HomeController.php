<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['data' => Auth::user()]);
    }

    public function dataChange(Request $req)
    {
        $rules = [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'img' => 'nullable|image|max:2048'
        ];
        $messages = [
            'name.required' => 'Поле имя является обязательным',
            'surname.required' => 'Поле фамилия является обязательным',
            'email.required' => 'Поле email является обязательным',
            'email.email' => 'Поле email неверного формата!',
            'img.image'=> 'Изображение имеет неверный формат',
            'img.max' => 'Изображение должно быть не более 2 Мб'
        ];

        $validator = Validator::make($req->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/home')
                ->withErrors($validator)
                ->withInput();
        }

        $user = Users::find(auth()->user()->id);
        $user->name = $req->input('name');
        $user->surname = $req->input('surname');
        $user->email = $req->input('email');
        $user->image = $this->uploadImage($req);

        if(!empty($req->input('pwd')) || !empty($req->input('newpwd')) || !empty($req->input('confirmpwd')))
        {
            $rules['pwd'] = 'required';
            $rules['newpwd'] = 'required';
            $rules['confirmpwd'] = 'required';

            $messages['pwd.required'] = 'Заполните поле пароль';
            $messages['newpwd.required'] = 'Заполните поле новый пароль';
            $messages['confirmpwd.required'] = 'Заполните поле подтвердить пароль';

            $validator = Validator::make($req->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect('/home')
                    ->withErrors($validator)
                    ->withInput();
            }

            if (Hash::check($req->input('pwd'), auth()->user()->password))
            {
                if($req->input('newpwd') == $req->input('confirmpwd'))
                {

                    $user->password = Hash::make($req->input('newpwd'));
                    $user->save();
                    return redirect('/home')->with('success', 'Данные сохранены!');
                }

                $validator->errors()->add('wrong', 'Пароли не совпадают!');
                return redirect('/home')->withErrors($validator)->withInput();
            }
            else
            {
                $validator->errors()->add('wrong', 'Неверный пароль!');
                return redirect('/home')->withErrors($validator)->withInput();
            }
        }

        $user->save();
        return redirect('/home')->with('success', 'Данные сохранены!');
    }

    public function uploadImage(Request $request)
    {
        if(!empty($request->input('img')))
        {
            $path = $request->file('img')->store('/public/images');
            $path = str_replace("public", "", $path);

            return $path;
        }
        return null;
    }

}
