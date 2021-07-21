@extends('one-organization')

@section('content')
    <div class="my-container">
        <h4 class="mt-4 text-center">Контакты</h4>

        <div class="row mt-4 mr-0 ml-0">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A3282f342ec9c22e72fde7ab00be011d934a7ec55c09da81b0e0438a4392dec0a&amp;source=constructor" width="572" height="358" frameborder="0"></iframe>
            <div class="ml-4">
                <h6>Адрес</h6>
                <p>{{$org->address}}</p>
                <h6>Телефон</h6>
                <p>{{$org->phone}}</p>
                <h6>Электронная почта</h6>
                <p>{{$org->email}}</p>
            </div>

        </div>

    </div>
@endsection
