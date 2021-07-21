@extends('admin-site')

@section('content')
    <div class="ml-4 mr-4">
        <h4 class="text-md-center">Список администраторов</h4>
        <table class="table mt-4 size">
            <thead>
            <tr>
                <th>id</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Организация</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        @foreach($orgs as $org)
                            @if($user->organization_id == $org->id)
                                {{ $org->short_name }}
                            @endif
                        @endforeach
                    </td>
                    <td class="row justify-content-center">
                        <a href="#"><img width="30" height="30" src="/img/delete.png"></a>
                        <a href="#"><img width="30" height="30" src="/img/edit.png"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
