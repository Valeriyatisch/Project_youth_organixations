@extends($name)

@section('content')
    <div class="ml-4 mr-4">
        <h4 class="text-md-center">Список новостей</h4>
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
            @foreach($news as $new)
                <tr>
                    <th scope="row">{{ $new->id }}</th>
                    <td>{{ $new->header }}</td>
                    <td>{{ substr($new->text, 0, 40) . '...' }}</td>
                    <td>
                        @foreach($org as $elem)
                            @if($elem->id == $new->organization_id)
                                {{ $elem->short_name }}
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $new->added_by }}</td>
                    <td>{{ $new->created_at }}</td>
                    <td class="row justify-content-center">
                        <a href="#"><img width="30" height="30" src="/img/delete.png"></a>
                        <a href="{{route('changeNew', $new->id)}}"><img width="30" height="30" src="/img/edit.png"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
