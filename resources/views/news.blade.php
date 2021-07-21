@extends('layouts.main')

@section('content')
    <div class="my-container">
        <h4 class="text-center mt-4">Новости</h4>
        <div class="row wrapper mb-5 ml-0">
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
    </div>
@endsection
