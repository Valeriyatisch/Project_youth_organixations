@extends('layouts.admin')

@section('img-block')
    <div class="mt-2">
        <img src="/img/admin.png" class="bg-light rounded-circle mx-auto d-block" width="100" height="100">
        {{--        @if(!empty(Auth::user()->image))--}}
        {{--            <img src="{{ asset(Auth::user()->image) }}" class="bg-light rounded-circle mx-auto d-block" width="100" height="100">--}}
        {{--        @else--}}
        {{--            --}}
        {{--        @endif--}}
        <p class="text-light text-center mt-2">{{Auth::user()->name}}</p>
    </div>

@endsection

@section('tables')
    <div class="collapse show" id="collapseTables">
        <nav class="nav flex-column">
            <a class="nav-link text-size text-white" href="/pmk-admin/news-table">Новости</a>
            <a class="nav-link text-size text-white" href="/pmk-admin/events-table">Мероприятия</a>
            <a class="nav-link text-size text-white" href="/pmk-admin/subgroup-form">Кружки и секции</a>
            <a class="nav-link text-size text-white" href="/pmk-admin/team-form">Сотрудники</a>
            <a class="nav-link text-size text-white" href="/pmk-admin/schedule-form">Расписание</a>
            <a class="nav-link text-size text-white" href="/pmk-admin/doc-form">Документы</a>
        </nav>
    </div>
@endsection

@section('forms')
    <div class="collapse show" id="collapseContent">
        <nav class="nav flex-column">
            <a class="nav-link text-size text-white" href="/pmk-admin/about-form">О нас</a>
            <a class="nav-link text-size text-white" href="/pmk-admin/news-form">Добавить новость</a>
            <a class="nav-link text-size text-white" href="/pmk-admin/events-form">Добавить мероприятие</a>
            <a class="nav-link text-size text-white" href="/pmk-admin/subgroup-form">Добавить кружок/секцию</a>
            <a class="nav-link text-size text-white" href="/pmk-admin/team-form">Добавить сотрудника</a>
            <a class="nav-link text-size text-white" href="/pmk-admin/schedule-form">Добавить расписание</a>
            <a class="nav-link text-size text-white" href="/pmk-admin/doc-form">Документы</a>
        </nav>
    </div>
@endsection

@section('data')
    <div class="collapse show mb-3" id="collapseAccount">
        <nav class="nav flex-column">
            <a class="nav-link text-size text-white" href="/pmk-admin/data-form">Мои данные</a>
        </nav>
    </div>
@endsection

