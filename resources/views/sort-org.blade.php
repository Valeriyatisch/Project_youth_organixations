
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
