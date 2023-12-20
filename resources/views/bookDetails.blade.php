

    <!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BookDetails</title>


    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
<div class="container" style="width: 100%;margin: 0px;padding: 0px;">
    <div class="bg-body shadow d-flex flex-column flex-shrink-0 position-fixed top-0 bottom-0" style="width: 4.5rem;"><a class="text-center link-body-emphasis d-block p-3 text-decoration-none border-bottom" href="/" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bootstrap-fill" style="font-size: 25px;">
                <path d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"></path>
                <path d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396H5.062z"></path>
            </svg><span class="visually-hidden">Icon-only</span></a>
        <ul class="nav nav-pills flex-column text-center nav-flush mb-auto">
            <li class="nav-item"></li>
            <li class="nav-item"><a class="nav-link py-3 border-bottom rounded-0" href="/myBooks"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-book" style="font-size: 17px;">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
                    </svg></a></li>
            <li class="nav-item"><a class="nav-link py-3 border-bottom rounded-0" href="/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-search">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                    </svg></a></li>
        </ul>
        <div class="p-3 border-top">
            <form method="POST" action="/auth/logout">
                @csrf <!-- Include CSRF token for Laravel -->
                <button type="submit" class="btn btn-link text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
        </div>

    </div>
    </div>
<div class="container py-4 py-xl-5" style="margin-left: auto;margin-right: auto; padding-left: 88px; width: auto">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>{{$book["volumeInfo"]["title"]}}</h2>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col" style="display: flex; justify-content: center; align-items: center;">
            <img class="rounded w-50 h-70 fit-cover" src="{{$book["volumeInfo"]["imageLinks"]["thumbnail"]}}" style="max-width: 100%; height: auto;">
        </div>
        <div class="col d-flex flex-column justify-content-center p-4">
            <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon md"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-book">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
                    </svg></div>
                <div>
                    <h4>Autor : {{$book["volumeInfo"]["authors"][0]}}</h4>
                    <?php
                    $description = $book["volumeInfo"]["description"];
                    $wordLimit = 150; // Set the maximum number of words
                    $words = explode(' ', $description);
                    $limitedWords = implode(' ', array_slice($words, 0, $wordLimit));
                    echo "<p>$limitedWords...</p>";
                    ?>
                </div>
            </div>
            <div class="row">
                <a href="/books/{{$book["id"]}}"><div class="col"><button class="btn btn-primary" type="button" style="width: 30%;" >dodaj</button></div></a>
            </div>
        </div>
    </div>
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
</div>
</body>

</html>
