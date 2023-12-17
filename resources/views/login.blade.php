{{--<!DOCTYPE html>--}}
{{--<html data-bs-theme="light" lang="en">--}}

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">--}}
{{--    <title>Untitled</title>--}}
{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}
{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>--}}
{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">--}}
{{--</head>--}}

{{--<body>--}}
{{--<section class="position-relative py-4 py-xl-5">--}}
{{--    <div class="container">--}}
{{--        <div class="row mb-5">--}}
{{--            <div class="col-md-8 col-xl-6 text-center mx-auto">--}}
{{--                <h2>Log in</h2>--}}
{{--                <p class="w-lg-50">Curae hendrerit donec commodo hendrerit egestas tempus, turpis facilisis nostra nunc. Vestibulum dui eget ultrices.</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row d-flex justify-content-center">--}}
{{--            <div class="col-md-6 col-xl-4">--}}
{{--                <div class="card mb-5">--}}
{{--                    <div class="card-body d-flex flex-column align-items-center">--}}
{{--                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">--}}
{{--                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"></path>--}}
{{--                            </svg></div>--}}
{{--                        <form class="text-center" method="post" action="auth/login">--}}
{{--                            @csrf--}}
{{--                            <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>--}}
{{--                            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>--}}
{{--                            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Login</button></div>--}}
{{--                            <p class="text-muted">Forgot your password?</p>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--</body>--}}

{{--</html>--}}

    <!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>register</title>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Projects-Grid-Horizontal-images.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Overlay-Login-Form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Footer-Basic-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Pretty-Search-Form.css') }}" rel="stylesheet">
</head>

<body>
<section class="position-relative py-4 py-xl-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Login</h2>
                <p class="w-lg-50">Witaj w naszej aplikacji do zarządzania biblioteką książek&nbsp;</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-5">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-book-fill">
                                <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
                            </svg></div>
                        <form class="text-center" method="post" action="auth/login">
                            @csrf
                            <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                            <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Login</button></div>
                            <a href="/register"><p class="text-muted">register</p></a>
                        </form>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as  $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<footer class="text-center">
    <div class="container text-muted py-4 py-lg-5">
        <ul class="list-inline"></ul>
        <ul class="list-inline">
            <li class="list-inline-item me-4"></li>
            <li class="list-inline-item me-4"></li>
            <li class="list-inline-item"></li>
        </ul>
        <p class="mb-0">Copyright © 2023 Oskar Mikołaj Ola</p>
    </div>
</footer>
</body>

</html>
