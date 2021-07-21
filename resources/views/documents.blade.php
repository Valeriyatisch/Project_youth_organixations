@extends('one-organization')

@section('content')
    <div class="my-container">
        <h4 class="text-center mt-4">Документы</h4>
        <div class="t-a">
            @foreach($docs as $doc)
                <h5 class="mt-4 h-s">{{$doc->name_section}}</h5>
                @foreach($sect_files as $s_file)
                    @if($s_file->id_document == $doc->id)
                        @foreach($files as $file)
                            @if($s_file->id_file == $file->id)
                                <div class="mt-2">
                                    <img src="/img/writing.png">
                                    <a href="{{asset("storage/") . $file->file}}" target="_blank">
                                        {{$file->name}}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
