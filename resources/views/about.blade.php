@extends('one-organization')

@section('content')
    <div class="my-container">
        <h4 class="mt-4 text-center">О нас</h4>

        <p class="mt-4 t-a"><?php $text = preg_replace("#\r?\n#", "<br/>", $org->about); echo $text;?></p>
    </div>
@endsection
