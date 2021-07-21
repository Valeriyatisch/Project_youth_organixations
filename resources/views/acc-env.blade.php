@extends('one-organization')

@section('content')
    <div class="my-container">
        <h4 class="text-center mt-4">Доступная среда</h4>
        <div class="t-a">
            @foreach($envs as $env)
                <h5 class="mt-4 h-s">{{$env->org_name}}</h5>
                <p>{{$env->address}}</p>
                <div class="row wrapper ml-0">
                    @foreach($env_cons as $con)
                        @if($con->id_env == $env->id)
                            <div>
                                <img src="{{$con->img}}">
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection

