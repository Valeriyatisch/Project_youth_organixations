@extends('pmk-admin')

@section('content')
    <div class="mt-2 d-flex justify-content-center">
        <div class="mt-2 w-50">
            <h3>Форма добавления сотрудников</h3>

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

            <form class="" action="/team-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="name" class="mb-2">ФИО</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Введите ФИО сотрудника">
                </div>

                <div class="form-group mt-3">
                    <label for="position" class="mb-2">Должность</label>
                    <input type="text" name="position" class="form-control" id="position" placeholder="Введите должность">
                </div>

                <div class="custom-file mb-3">
                    <label for="img" class="mb-2">Фото</label>
                    <input type="file" name="img" class="form-control-file" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary mt-4 mb-3">Добавить</button>
            </form>
        </div>
    </div>
@endsection
