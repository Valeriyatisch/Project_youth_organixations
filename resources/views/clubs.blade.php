@extends('one-organization')

@section('content')
    <div class="my-container">
        <h4 class="text-center mt-4">Клубы</h4>
            <div class="row wrapper mb-5 ml-0 mt-4">
                @foreach($clubs as $club)
                    <div class="card mr-auto mb-4" style="width: 32%;">
                        <a href="{{route('one-org', $club->id)}}">
                            @if(!empty($club->logo))
                                <img src="{{ asset("storage/") . $club->logo}}" class="card-img-top" height="200px">
                            @else
                                <img src="/img/group.png" class="card-img-top" height="200px">
                            @endif
                        </a>
                        <div class="card-body">
                            <h6 class="card-title">{{$club->full_name}}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
@endsection
