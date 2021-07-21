@extends('layouts.main')



@section('content')
    <div class="my-container">
        <h4 class="text-center mt-4">Карта</h4>

        <div class="mt-4 text-center">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A6a2e229ad6f79f8ed1514e0dd60d564cffad892d2f66f3c267c02d541f79b55a&amp;source=constructor" width="900" height="550" frameborder="0">
            </iframe>
        </div>
    </div>
@endsection
