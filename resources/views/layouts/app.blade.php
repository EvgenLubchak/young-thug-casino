<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>power-link-logger</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
            integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
            <div class="row text-center mt-4">
                <div class="col">
                    <a href="{{route('dashboard')}}"><img src=" {{URL::asset('/imgs/thud-img.jpg')}}" height="100px"
                                                          alt="Thug Life"></a>
                </div>
                <div class="col">
                    <form class="mb-5" method="POST" action="{{route('logout')}}">
                        @csrf
                        <a class="nav-link px-3" href="{{route('logout')}}"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <b>Get Out Of Here:</b> {{ Auth::user()->email }}
                        </a>
                    </form>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
