@extends('pmk-admin')

@section('content')
    <div class="mt-2 d-flex justify-content-center">
        <div class="mt-2 w-50">
            <h3>Форма добавления расписания</h3>

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

            <form class="" action="/schedule-form" method="post">
                @csrf
                <div class="form-group mt-3">
                    <label for="name" class="mb-2">Наименование клубного формирования</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Введите наименование">
                </div>

                <div class="form-group mt-3">
                    <label for="address" class="mb-2">Адрес</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="Введите адрес">
                </div>

                <div class="form-group mt-3">
                    <label for="worker" class="mb-2">Сотрудник</label>
                    <input type="text" name="worker" class="form-control" id="worker" placeholder="Введите фамилию и инициалы">
                </div>

                <div class="form-group mt-3">
                    <label for="group" class="mb-2">Группа</label>
                    <textarea name="group" class="form-control" rows="3" id="group" placeholder="Введите номера групп"></textarea>
                </div>

                <div class="row justify-content-between pl-3 pr-3">
                    <div class="form-group">
                        <label class="" for="monday">Понедельник</label>
                        <textarea name="monday" class="form-control" rows="3" id="monday" placeholder="Введите время"></textarea>
                    </div>

                    <div>
                        <label class="" for="tuesday">Вторник</label>
                        <textarea name="tuesday" class="form-control" rows="3" id="tuesday" placeholder="Введите время"></textarea>
                    </div>

                    <div>
                        <label class="" for="wednesday">Среда</label>
                        <textarea name="wednesday" class="form-control" rows="3" id="wednesday" placeholder="Введите время"></textarea>
                    </div>
                </div>

                <div class="row justify-content-between pl-3 pr-3">
                    <div class="form-group">
                        <label class="" for="thursday">Четверг</label>
                        <textarea name="thursday" class="form-control" rows="3" id="thursday" placeholder="Введите время"></textarea>
                    </div>

                    <div>
                        <label class="" for="friday">Пятница</label>
                        <textarea name="friday" class="form-control" rows="3" id="friday" placeholder="Введите время"></textarea>
                    </div>

                    <div>
                        <label class="" for="saturday">Суббота</label>
                        <textarea name="saturday" class="form-control" rows="3" id="saturday" placeholder="Введите время"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4 mb-3">Добавить</button>
            </form>
        </div>
    </div>
@endsection
