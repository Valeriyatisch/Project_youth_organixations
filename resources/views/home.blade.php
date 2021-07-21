@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Мои данные</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

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

                            <form class="" action="{{route('user-change')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-3">
                                    <label for="name" class="mb-2">Имя</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Введите имя" value="{{$data->name}}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="surname" class="mb-2">Фамилия</label>
                                    <input type="text" name="surname" class="form-control" id="surname" placeholder="Введите фамилию" value="{{$data->surname}}">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="email" class="mb-2">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{$data->email}}">
                                </div>

                                <label for="pwd" class="mb-2">Пароль</label><br>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Введите пароль" aria-label="" aria-describedby="basic-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Изменить</button>
                                    </div>
                                </div>

                                <div class="collapse" id="collapseExample">
                                    <div class="form-group mt-3">
                                        <label for="newpwd" class="mb-2">Новый пароль</label>
                                        <input type="password" name="newpwd" class="form-control" id="newpwd">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="confirmpwd" class="mb-2">Подтвердите новый пароль</label>
                                        <input type="password" name="confirmpwd" class="form-control" id="confirmpwd">
                                    </div>
                                </div>

                                <div class="custom-file mt-3 mb-2">
                                    <label for="img" class="mb-2">Выберите изображение</label>
                                    <input type="file" name="img" id="img" class="form-control-file" accept="image/*">
                                </div>

                                <div class="form-group mt-3"></div>

                                <button type="submit" class="btn btn-primary mt-3 mb-5">Сохранить</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
