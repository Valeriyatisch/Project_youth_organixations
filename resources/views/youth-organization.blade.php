@extends('layouts.main')

@section('content')
    <div class="my-container">
        <h4 class="text-center mt-4">Молодежные организации</h4>
        <div class="row">
            <aside class="col-sm-3 mt-4">
                <div class="card">
                    <form action="/sort-organization" method="post">
                        @csrf
                    <article class="card-group-item">
                        <header class="card-header">
                            <h6 class="title">Район</h6>
                        </header>
                        <div class="filter-content">
                            <div class="card-body">
                                @foreach($dists as $dist)
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="district" value="{{$dist->id}}">
                                    <span class="form-check-label">{{$dist->name}}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </article>

{{--                    <article class="card-group-item">--}}
{{--                        <header class="card-header">--}}
{{--                            <h6 class="title">Тип организации</h6>--}}
{{--                        </header>--}}
{{--                        <div class="filter-content">--}}
{{--                            <div class="card-body">--}}
{{--                                    @foreach($type_orgs as $type)--}}
{{--                                    <label class="form-check">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="type" value="{{$type->id}}">--}}
{{--                                        <span class="form-check-label">{{$type->type}}</span>--}}
{{--                                    </label>--}}
{{--                                    @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}

                        <a href="/youth-organization" id="filter" class="btn btn-primary mb-2">Сбросить</a>
                    </form>
                </div>
            </aside>


                <div class="col-sm-9 mt-4">
                    <div id="output">
                    <div class="row wrapper mb-5 ml-0">
                        @foreach($orgs as $org)
                            <div class="card ml-2 mr-2 mb-4 club" style="width: 30%;">
                                <a href="{{route('one-org', $org->id)}}">
                                    @if(!empty($org->logo))
                                        <img src="{{ asset("storage/") . $org->logo}}" class="card-img-top" height="150px">
                                    @else
                                        <img src="/img/group.png" class="card-img-top" height="150px">
                                    @endif
                                </a>
                                <div class="card-body">
                                    <h6 class="card-title">{{$org->short_name}}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $orgs->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let radio = document.getElementsByName('district');
        let check = document.getElementsByName('type');

        radio.forEach(element => element.addEventListener('click', filter));

        function filter(event) {
            var request = new XMLHttpRequest();
            function reqReadyStateChange() {
                if (request.readyState == 4) {
                    var status = request.status;
                    if (status == 200) {
                        document.getElementById("output").innerHTML=request.responseText;
                    }
                }
            }
            // строка с параметрами для отправки
            var body = "dist=" + event.target.value;
            request.open("GET", "/youth-organization?"+body);
            request.onreadystatechange = reqReadyStateChange;
            request.send();
        }
    </script>
@endsection
