@extends($name)

@section('content')
    <div class="ml-4 mr-4">
        <h4 class="text-md-center">Список мероприятий</h4>
        <table class="table mt-4 size">
            <thead>
            <tr>
                <th>id</th>
                <th>Заголовок</th>
                <th>Текст</th>
                <th>Организация</th>
                <th>Кем добавлено</th>
                <th>Дата добавления</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <th scope="row">{{ $event->id }}</th>
                        <td>{{ $event->header }}</td>
                        <td>{{ substr($event->text, 0, 50) . '...' }}</td>
                        <td>
                            @foreach($orgs as $org)
                                @if($event->organization_id == $org->id)
                                    {{ $org->short_name }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $event->added_by }}</td>
                        <td>{{ $event->created_at }}</td>
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
