@extends('one-organization')

@section('content')
    <div class="my-container">
        <h4 class="text-center mt-4">Кружки и секции</h4>
        <div class="row wrapper mb-5 ml-0 mt-4">
            @foreach($groups as $group)
                <div class="card mb-4 mr-auto" style="width: 32%;">
                    <a href="#">
                        @if(!empty($group->image))
                            <img src="{{ asset("storage/") . $group->image}}" class="card-img-top" height="200px">
                        @else
                            <img src="/img/logo.jpg" class="card-img-top">
                        @endif
                    </a>
                    <div class="card-body">
                        <h5 class="card-title h-s">{{$group->name}}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
