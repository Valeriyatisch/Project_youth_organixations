@extends('one-organization')

@section('content')
    <div class="my-container">
        <h4 class="text-center mt-4">Наша команда</h4>
        <div class="row wrapper mb-5 ml-0 mt-4">
            @foreach($workers as $worker)
                <div class="card ml-2 mr-2 mb-4" style="width: 30%;">
                    <a href="#">
                        @if(!empty($worker->image))
                            <img src="{{ asset("storage/") . $worker->image}}" class="card-img-top" height="360px">
                        @else
                            <img src="/img/logo.jpg" class="card-img-top" height="360px">
                        @endif
                    </a>
                    <div class="card-body">
                        <h6 class="card-title">{{$worker->name}}</h6>
                        <p class="t-size">{{$worker->position}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
