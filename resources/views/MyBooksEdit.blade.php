<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="col"></div>
</div>
<div class="container py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>Edycja ksiazki</h2>
            <p class="w-lg-50">edytuj ksiazke zaznacz jako przeczytana lub dodaj notatke</p><span>{{$book["created_at"]}}</span>
        </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col" style="margin-left: 192px;">
            <div class="card">
                <div class="card-body p-4"><img width="100" height="80" src="{{$book["img"]}}">
                    <p>{{$book["tytul"]}}</p>
                    <p>{{$book["autor"]}}</p>
                    <div class="btn-group" role="group"><button class="btn btn-primary" type="button">przeczytane</button><button class="btn btn-primary" type="button" style="margin-left: 21px;">usun ksiazke</button></div>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"></div>
{{--            <h1>notatka</h1><textarea style="width: 95%;height: 50%;--bs-body-bg: #6f6b6b;">{{$book["opis"]}}}</textarea>--}}
            <form
                method="POST"
                action="/mybooks/update/{{$book["id"]}}">
{{--                onsubmit="return confirm('Do you really want to delete?');">--}}
                {!! csrf_field() !!}
                <input
                    type="hidden"
                    name="_method"
                    value="PUT">
                <h1>notatka</h1><textarea name="opis"  style="width: 95%;height: 50%;--bs-body-bg: #6f6b6b;">{{$book["opis"]}}}</textarea>
                <button
                    type="submit"
                    class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>

</body>

</html>
