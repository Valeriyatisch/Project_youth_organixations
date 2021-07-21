@extends('layouts.main')

@section('title')Главная страница@endsection

@section('content')
    <div class="main container">
        <img src="/img/young_people.jpg">
        <h3>Публичный портал <br>молодежных организаций <br>Санкт-Петербурга</h3>
    </div>

    <div class="my-container">
        <h4 class="text-center mt-5">Новости</h4>
        <div class="row wrapper ml-0">
            @foreach($news as $new)
                <div class="card mt-3 m-2" style="width: 30%;">
                    <a href="{{route('one-news', $new->id)}}"><img src="{{asset("storage/" . $new->image)}}" class="card-img-top" height="200px"></a>
                    <div class="card-body">
                        <h5 class="card-title">{{$new->header}}</h5>
                        <p class="card-text">{{substr($new->text, 0, strpos($new->text, ' ', 400)) .'...'}}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{$new->created_at}}</small>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-3 text-center">
            <button type="button" class="btn btn-primary mb-2"><a class="text-white dec-non p-3" href="/events">Смотреть все</a></button>
        </div>

        <h4 class="text-center mt-5">Мероприятия</h4>
        <div>
            @foreach($events as $event)
                <div class="card mb-3 mt-4">
                    <div class="row no-gutters">
                        <div class="col-md-4 align-self-center">
                            <a href="{{route('one-event', $event->id)}}">
                                <img src="{{asset("storage/" . $event->image)}}" class="card-img" height="200px">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$event->header}}</h5>
                                <p class="card-text">{{substr($event->text, 0, strpos($event->text, ' ', 300)) .'...'}}</p>
                                <p class="card-text"><small class="text-muted">{{$event->created_at}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="mt-4 text-center">
                <button type="button" class="btn btn-primary mb-2"><a class="text-white dec-non p-3" href="/news">Смотреть все</a></button>
            </div>
        </div>

        <h4 class="text-center mt-5">Карта</h4>
        <div class="mt-4 text-center">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A6a2e229ad6f79f8ed1514e0dd60d564cffad892d2f66f3c267c02d541f79b55a&amp;source=constructor" width="960" height="550" frameborder="0">
            </iframe>
        </div>
    </div>
@endsection
