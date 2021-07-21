@extends('layouts.admin')

@section('tables')
    <div class="collapse show" id="collapseTables">
        <nav class="nav flex-column">
            <a class="nav-link text-size text-white" href="/pmc-admin/news-table">Новости</a>
            <a class="nav-link text-size text-white" href="/pmc-admin/events-table">Мероприятия</a>
            <a class="nav-link text-size text-white" href="#">Доступная среда</a>
            <a class="nav-link text-size text-white" href="#">Документы</a>
        </nav>
    </div>
@endsection

@section('forms')
    <div class="collapse show" id="collapseContent">
        <nav class="nav flex-column">
            <a class="nav-link text-size text-white" href="/pmc-admin/about-form">О нас</a>
            <a class="nav-link text-size text-white" href="/pmc-admin/news-form">Добавить новость</a>
            <a class="nav-link text-size text-white" href="/pmc-admin/events-form">Добавить мероприятие</a>
            <a class="nav-link text-size text-white" href="/pmc-admin/environment-form">Доступная среда</a>
            <a class="nav-link text-size text-white" href="/pmc-admin/doc-form">Документы</a>
        </nav>
    </div>
@endsection

@section('data')
    <div class="collapse show mb-3" id="collapseAccount">
        <nav class="nav flex-column">
            <a class="nav-link text-size text-white" href="/pmc-admin/data-form">Мои данные</a>
        </nav>
    </div>
@endsection
