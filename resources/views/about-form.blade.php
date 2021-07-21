@extends($name)

@section('content')
    <div class="mt-2 d-flex justify-content-center">
        <div class="mt-2 w-50">
            <h3>Информация об организации</h3>

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

            <form class="" action="{{route('about-update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="fullname" class="mb-2">Полное наименование</label>
                    <input type="text" name="fullname" class="form-control" id="fullname" value="{{$org->full_name}}">
                </div>

                <div class="form-group mt-3">
                    <label for="shortname" class="mb-2">Сокращенное наименование</label>
                    <input type="text" name="shortname" class="form-control" id="shortname" value="{{$org->short_name}}">
                </div>

                <div class="form-group mt-3">
                    <label for="district" class="mb-2">Район</label>
                    <select class="custom-select" name="district" id="district">
                        <option value="{{$my_dist->id}}" selected>{{$my_dist->name}}</option>
                        @foreach($dists as $elem)
                            <option value="{{$elem->id}}">{{$elem->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="address" class="mb-2">Адрес</label>
                    <input type="text" name="address" class="form-control" id="address" value="{{$org->address}}">
                </div>

                <div class="form-group mt-3 mb-2">
                    <label for="text" class="mb-2">Об организации</label>
                    <textarea class="form-control" name="text" rows="15" id="text">{{$org->about}}</textarea>
                </div>

                <div class="form-group mt-3">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{$org->email}}">
                </div>

                <div class="form-group mt-3">
                    <label for="phone" class="mb-2">Телефон</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{$org->phone}}">
                </div>

                <div class="form-group mt-3">
                    <label for="vkgroup" class="mb-2">Ссылка на группу вконтакте</label>
                    <input type="text" name="vkgroup" class="form-control" id="vkgroup" value="{{$org->vk_group}}">
                </div>

                <div class="custom-file mt-1 mb-2">
                    <label for="img" class="mb-3">Выберите изображения для страницы сайта</label>
                    <input type="file" name="img" class="form-control-file" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary mt-4 mb-3">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
