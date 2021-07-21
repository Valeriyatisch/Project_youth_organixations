@extends('admin-site')

@section('content')
    <div class="mt-2 d-flex justify-content-center">
        <div class="mt-2 w-50">
            <h3>Форма добавления пользователей</h3>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form class="" action="/admin-site/users-form" method="post">
                @csrf
                <div class="form-group mt-3">
                    <label for="name" class="mb-2">Имя</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Введите имя">
                </div>

                <div class="form-group mt-3">
                    <label for="surname" class="mb-2">Фамилия</label>
                    <input type="text" name="surname" class="form-control" id="surname" placeholder="Введите фамилию">
                </div>

                <div class="form-group mt-3">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Введите email">
                </div>

                <div class="form-group mt-3">
                    <label for="pwd" class="mb-2">Пароль</label>
                    <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Введите пароль" autocomplete="new-password">
                </div>

                <div class="form-group mt-3">
                    <label for="org" class="mb-2">Организация</label>
                    <select class="custom-select" name="org" id="org">
                        @foreach($org as $elem)
                            <option value="{{$elem->id}}">{{ $elem->short_name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3 mb-5">Добавить</button>
            </form>
        </div>
    </div>
@endsection
