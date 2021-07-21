<div class="bg-light container-fluid">
    <div class="row g-0">
        <div class="bg-dark shadow-sm p-md-3 p-sm-2 col-md-2">
            <div class="mt-2">
                @if(!empty(Auth::user()->image))
                    <img src="{{ asset("storage/") . Auth::user()->image }}" class="bg-light rounded-circle mx-auto d-block" width="100" height="100">
                @else
                    <img src="/img/admin.png" class="bg-light rounded-circle mx-auto d-block" width="100" height="100">
                @endif
                <p class="text-light text-center mt-2">{{Auth::user()->name}}</p>
            </div>

            <div>
                <a class="text-decoration-none" data-toggle="collapse" href="#collapseContent" aria-expanded="false" aria-controls="collapseContent">
                    <h6 class="text-light">Формы</h6>
                </a>
                <hr class="text-light mb-1">
            </div>

            @yield('forms')

            <div class="mt-3">
                <a class="text-decoration-none" data-toggle="collapse" href="#collapseTables" aria-expanded="false" aria-controls="collapseTables">
                    <h6 class="text-light">Таблицы</h6>
                </a>
                <hr class="text-light mb-1">
            </div>

            @yield('tables')

            <div class="mt-3">
                <a class="text-decoration-none" data-toggle="collapse" href="#collapseAccount" aria-expanded="false" aria-controls="collapseAccount">
                    <h6 class="text-light">Личный кабинет</h6>
                </a>
                <hr class="text-light mb-1">
            </div>

            @yield('data')

        </div>

        <div class="col-md-10 flex-column p-0">
            <div class="ml-4 mr-4">
                <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

                    <div class="col-12 col-md-auto mb-2 justify-content-center mb-md-0 text-dark">
                        <h5>Administrator</h5>
                    </div>

                    <div class="col-md-3 text-end">
                        <a class="col-1 text-dark align-self-center text-decoration-none" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                            @csrf
                        </form>
                    </div>
                </header>
            </div>

            @yield('content')
        </div>
    </div>
</div>
