@extends('admin-site')

@section('content')
    <div class="mt-2 d-flex justify-content-center">
        <div class="mt-2 w-50">
            <h3>Форма добавления организаций</h3>

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

            <form class="" action="/admin-site/organizations-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="fullname" class="mb-2">Полное наименование организации</label>
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Введите полное название организации">
                </div>

                <div class="form-group mt-3">
                    <label for="shortname" class="mb-2">Сокращенное наименование организации</label>
                    <input type="text" name="shortname" class="form-control" id="shortname" placeholder="Введите сокращенное название организации">
                </div>

                <div class="form-group mt-3">
                    <label for="district" class="mb-2">Район</label>
                    <select class="custom-select" name="district" id="district">
                        @foreach($dists as $elem)
                        <option value="{{$elem->id}}">{{$elem->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="address" class="mb-2">Адрес</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Введите адрес организации">
                </div>

                <div class="form-group mt-3 mb-2">
                    <label for="phone" class="mb-2">Телефон</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Введите номер телефона">
                </div>

                <div class="form-group mt-3">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Введите email">
                </div>

                <div class="form-group mt-3">
                    <label for="org" class="mb-2">Тип организации</label>
                    <select class="custom-select" name="org" id="org">
                        @foreach($type_orgs as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="sub" class="mb-2">Является структурным подразделением оргнаизации</label>
                    <select class="custom-select" name="sub" id="sub">
                        <option value="0" selected>Не является</option>
                        @foreach($orgs as $elem)
                            <option value="{{$elem->id}}">{{$elem->short_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="vkgroup" class="mb-2">Группа вконтакте</label>
                    <input type="text" name="vkgroup" class="form-control" id="vkgroup" placeholder="Введите ссылку">
                </div>

                <div class="custom-file mt-3 mb-2">
                    <input type="file" name="logo" class="form-control-file" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary mt-3 mb-3">Добавить</button>
            </form>
        </div>
    </div>
@endsection
