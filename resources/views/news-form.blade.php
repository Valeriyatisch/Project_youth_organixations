@extends($name)

@section('content')
        <div class="mt-2 d-flex justify-content-center">
            <div class="mt-2 w-50">
                @if(!isset($new))
                <h3>Форма добавления новостей</h3>
                @else
                    <h3>Изменить новость</h3>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(isset($new))
                    <form class="" action="{{route('change', $new->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="label" class="mb-2">Заголовок</label>
                            <input type="text" name="header" class="form-control" id="label" value="{{$new->header}}">
                        </div>
                        <div class="form-group mt-3 mb-2">
                            <label for="text" class="mb-2">Текст</label>
                            <textarea class="form-control" name="text" rows="15" id="text">{{$new->text}}</textarea>
                        </div>

{{--                        <div class="custom-file mt-3 mb-2">--}}
{{--                            <input type="file" name="img" class="form-control-file" accept="image/*" value="{{$new->image}}">--}}
{{--                        </div>--}}

                        <button type="submit" class="btn btn-primary mt-3 mb-3">Изменить</button>
                    </form>
                    @else
                <form class="" action="/news-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="label" class="mb-2">Заголовок</label>
                        <input type="text" name="header" class="form-control" id="label" placeholder="Введите заголовок">
                    </div>
                    <div class="form-group mt-3 mb-2">
                        <label for="text" class="mb-2">Текст</label>
                        <textarea class="form-control" name="text" rows="15" id="text" placeholder="Введите текст"></textarea>
                    </div>

                    <div class="custom-file mt-3 mb-2">
                        <input type="file" name="img" class="form-control-file" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 mb-3">Добавить</button>
                </form>
                    @endif
            </div>
        </div>
@endsection
