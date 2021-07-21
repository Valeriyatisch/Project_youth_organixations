@extends('layouts.admin')

@section('tables')
<div class="collapse show" id="collapseTables">
    <nav class="nav flex-column">
        <a class="nav-link text-size text-white" href="/admin-site/organizations-table">Организации</a>
        <a class="nav-link text-size text-white" href="/admin-site/news-table">Новости</a>
        <a class="nav-link text-size text-white" href="/admin-site/events-table">Мероприятия</a>
        <a class="nav-link text-size text-white" href="/admin-site/users-table">Пользователи</a>
    </nav>
</div>
@endsection

@section('forms')
<div class="collapse show" id="collapseContent">
    <nav class="nav flex-column">
        <a class="nav-link text-size text-white" href="/admin-site/news-form">Добавить новость</a>
        <a class="nav-link text-size text-white" href="/admin-site/events-form">Добавить мероприятие</a>
        <a class="nav-link text-size text-white" href="/admin-site/organizations-form">Добавить организацию</a>
        <a class="nav-link text-size text-white" href="/admin-site/users-form">Добавить пользователя</a>
    </nav>
</div>
@endsection

@section('data')
<div class="collapse show mb-3" id="collapseAccount">
    <nav class="nav flex-column">
        <a class="nav-link text-size text-white" href="/admin-site/data-form">Мои данные</a>
    </nav>
</div>
@endsection
