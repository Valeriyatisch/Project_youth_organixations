@extends('layouts.main')

@section('content')
    <div class="my-container">
        <h4 class="mt-4">{{$event->header}}</h4>
        <img src="{{ asset("storage/") . $event->image}}" class="mt-4 w-75">
        <p class="mt-4 w-75"><?php $text = preg_replace("#\r?\n#", "<br/>", $event->text); echo $text;?></p>
    </div>
@endsection
