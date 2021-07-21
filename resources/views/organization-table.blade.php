@extends('admin-site')

@section('content')
    <div class="ml-4 mr-4">
        <h4 class="text-md-center">Список организаций</h4>
        <table class="table mt-4 size">
            <thead>
            <tr>
                <th>id</th>
                <th>Полное наименование</th>
                <th>Сокращенное наименование</th>
                <th>Район</th>
                <th>Адрес</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Группа вконтакте</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $org)
                <tr>
                    <th scope="row">{{ $org->id }}</th>
                    <td>{{ $org->full_name }}</td>
                    <td>{{ $org->short_name }}</td>
                    <td>
                        @foreach($dist as $elem)
                            @if($elem->id == $org->dist_id)
                                {{ $elem->name }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $org->address }}</td>
                    <td>{{ $org->email }}</td>
                    <td>{{ $org->phone }}</td>
                    <td>{{ $org->vk_group }}</td>
                    <td class="row justify-content-center">
                        <a href="#"><img width="30" height="30" src="/img/delete.png"></a>
                        <a href="#"><img width="30" height="30" src="/img/edit.png"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $data->links() !!}
        </div>
    </div>
@endsection

