@extends('layouts.main')

@if($org->type_org_id == 1)
    @section('head-pmc')
        <div class="my-container">
            <div class="parent mt-4">
                @if(!empty($org->image))
                    <img src="{{asset('/storage') . $org->image}}">
                @else
                    <img src="/img/youth.jpg">
                @endif
                <h4 class="mb-0">{{$org->short_name}}</h4>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about', $org->id)}}">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('org-news', $org->id)}}">Новости</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('clubs', $org->id)}}">Клубы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('acc-env', $org->id)}}">Доступная среда</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('org-doc', $org->id)}}">Документы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact', $org->id)}}">Контакты</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    @endsection
@endif


@if($org->type_org_id == 2)
@section('head-pmk')
    <div class="my-container">
        <div class="parent mt-4">
            @if(!empty($org->image))
                <img src="{{asset('/storage') . $org->image}}">
            @else
                <img src="/img/youth.jpg">
            @endif
            <h4 class="mb-0">{{$org->short_name}}</h4>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about', $org->id)}}">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('org-news', $org->id)}}">Новости</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subgroups', $org->id)}}">Кружки и секции</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('team', $org->id)}}">Наша команда</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('schedule', $org->id)}}">Расписание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('org-doc', $org->id)}}">Документы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact', $org->id)}}">Контакты</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
@endsection
@endif
