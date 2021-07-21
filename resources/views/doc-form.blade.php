@extends($name)

@section('content')
    <div class="mt-2 d-flex justify-content-center">
        <div class="mt-2 w-50">
            <h3>Документы</h3>

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

            <form class="" action="/doc-form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="sect_name" class="mb-2">Раздел</label>
                    <select class="custom-select" name="sect_name" id="sect_name">
                        <option value="0" selected>Новый раздел</option>
                        @foreach($doc_section as $elem)
                            <option value="{{$elem->id}}">{{$elem->name_section}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="name" class="mb-2">Название раздела</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <div class="custom-file mt-3 mb-2">
                    <input type="file" name="files[]" class="form-control-file" multiple="multiple" accept=".pdf, .jpg">
                </div>

                <button type="submit" class="btn btn-primary mt-3 mb-5">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
