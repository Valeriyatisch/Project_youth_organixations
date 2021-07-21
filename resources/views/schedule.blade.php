@extends('one-organization')

@section('content')
    <div class="ml-4 mr-4">
        <h4 class="text-md-center mt-4">Расписание</h4>
        <div class="my-container">
            <table class="table mt-4 size text-center">
                <thead>
                <tr>
                    <th width="150px">Название секции</th>
                    <th width="120px">Преподаватель</th>
                    <th>Группа</th>
                    <th>Пн</th>
                    <th>Вт</th>
                    <th>Ср</th>
                    <th>Чт</th>
                    <th>Пт</th>
                    <th>Сб</th>
                </tr>
                </thead>
                <tbody>
                @foreach($schedule as $elem)
                    <tr>
                        <th>{{ $elem->name }}</th>
                        <td>{{ $elem->worker }}</td>
                        <td><?php $text = preg_replace("#\r?\n#", "<br/>", $elem->group); echo $text;?></td>
                        <td><?php $text = preg_replace("#\r?\n#", "<br/>", $elem->mondey); echo $text;?></td>
                        <td><?php $text = preg_replace("#\r?\n#", "<br/>", $elem->tuesday); echo $text;?></td>
                        <td><?php $text = preg_replace("#\r?\n#", "<br/>", $elem->wednesday); echo $text;?></td>
                        <td><?php $text = preg_replace("#\r?\n#", "<br/>", $elem->thursday); echo $text;?></td>
                        <td><?php $text = preg_replace("#\r?\n#", "<br/>", $elem->friday); echo $text;?></td>
                        <td><?php $text = preg_replace("#\r?\n#", "<br/>", $elem->saturday); echo $text;?></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
