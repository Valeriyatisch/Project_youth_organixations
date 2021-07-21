@extends('layouts.main')

@section('content')
    <div class="my-container">
        <h4 class="mt-4">{{$new->header}}</h4>
        <img src="{{ asset("storage/") . $new->image}}" class="mt-4 w-75">
        <p class="mt-4 w-75"><?php $text = preg_replace("#\r?\n#", "<br/>", $new->text); echo $text;?></p>
    </div>
@endsection
