@extends('layouts.main')

@section('content')
    <div class="my-container">
        <h4 class="text-center mt-4">Мероприятия</h4>
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
    </div>
@endsection
