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
            <h2>Heading</h2>
            <p class="w-lg-50">Curae hendrerit donec commodo hendrerit egestas tempus, turpis facilisis nostra nunc. Vestibulum dui eget ultrices.</p>
        </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col">
            <div class="card"></div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body p-4">
                    <h4 class="card-title">ksiazka</h4>
                    <img src="{{$book["volumeInfo"]["imageLinks"]["thumbnail"]}}">
                    <p>autor: {{$book["volumeInfo"]["authors"][0]}}</p>
                    <p>{{$book["volumeInfo"]["title"]}}</p>
                    <a href="/books/{{$book["id"]}}"><button class="btn btn-primary" type="submit">dodaj</button></a>
                    <br>
                    <br>
                    <form
                        method="POST"
                        action="/books/{{$book['id']}}"
                        onsubmit="return confirm('Do you really want to delete?');">
                        {!! csrf_field() !!}
                        <input
                            type="hidden"
                            name="_method"
                            value="DELETE">
                        <button
                            type="submit"
                            class="btn btn-danger">Delete</button>
                    </form>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"></div>
        </div>
    </div>
</div>

</body>

</html>
