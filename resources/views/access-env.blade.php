@extends('pmc-admin')

@section('content')
    <div class="mt-2 d-flex justify-content-center">
        <div class="mt-2 w-50">
            <h3>Доступная среда</h3>

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

            <form class="" action="/acc-env" method="post">
                @csrf
                <div class="form-group mt-3">
                    <label for="name" class="mb-2">Название подразделения</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <div class="form-group mt-3">
                    <label for="address" class="mb-2">Адрес</label>
                    <input type="text" name="address" class="form-control" id="address">
                </div>

                @foreach($envImg as $elem)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$elem->id}}" name="check[]" value="{{$elem->id}}">
                    <label class="form-check-label" for="inlineCheckbox{{$elem->id}}">
                        <img src="{{$elem->img}}">
                    </label>
                </div>
                @endforeach

                <div class="form-group mt-3"></div>

                <button type="submit" class="btn btn-primary mt-3 mb-5">Добавить</button>
            </form>
        </div>
    </div>
@endsection
