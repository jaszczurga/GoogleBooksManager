

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body style="border-color: rgb(0,0,0);">
<div class="container">
    <div class="col-xxl-12 offset-xxl-0">
        <h1 style="text-align: center;">wybierz ksiazke</h1>
        <form method="GET" action="/search">
        <div class="row">
            <div class="col-xxl-2 offset-xxl-5"><input name="query" type="search" style="padding-bottom: 0px;margin-bottom: 45px;padding-top: 0px;margin-top: 24px;"></div>
        </div>
            <button class="btn btn-primary" type="submit">szukaj</button>
        </form>
    </div>
</div>
<div class="col-xxl-6 offset-xxl-3">
    <div class="table-responsive">
        <table class="table">
            <thead style="border-width: 3px;border-color: rgb(0,0,0);">
            <tr>
                <th style="border-right-width: 3px;">ksiazki</th>
                <th>akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($titles as $title)
            <tr>
                <td style="width: 30%;border-width: 3px;border-color: var(--bs-table-color);">  <a href="/books/{id}/edit">{{ucfirst($title)}}</a></td>
                <td style="width: 30%;border-width: 3px;border-color: var(--bs-table-color);">
                    <form method="GET" action="/book/{title}">
                        <button class="btn btn-primary" type="submit">dodaj</button>
                    </form>

                </td>
            </tr>
            @endforeach
            <tr></tr>
            </tbody>
        </table>
    </div>
</div>

</body>

</html>































{{--<div class="row wide-xl " >--}}
{{--    @foreach($breeds as $breed)--}}
{{--        <div class="col-lg-2 ">--}}
{{--            <div class="feature-with-icon" data-aos="flip-up" >--}}
{{--                <h5><strong>{{ucfirst($breed)}}</strong></h5>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}
{{--<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}

{{--    <!DOCTYPE html>--}}
{{--<html data-bs-theme="light" lang="en">--}}

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">--}}
{{--    <title>tabelka</title>--}}
{{--    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
{{--</head>--}}

{{--<body>--}}
{{--<div class="container">--}}
{{--    <div class="col" style="text-align: left;">--}}
{{--        <h1 style="text-align: center;">Pieski</h1>--}}
{{--        <div class="table-responsive" style="width: 30%;margin-right: auto;margin-left: auto;border-width: 3px;border-color: black">--}}
{{--            <table class="table">--}}
{{--                <thead style="border-width: 2px;border-color: var(--bs-table-color);">--}}
{{--                <tr>--}}
{{--                    <th style="background: rgb(227,93,93);">Column 1</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody style="border-width: 2px;border-color: var(--bs-table-color);">--}}
{{--                @foreach($titles as $title)--}}
{{--                <tr>--}}
{{--                    <td style="background: rgb(194,158,158);">{{ucfirst($title)}}</td>--}}
{{--                </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--</body>--}}

{{--</html>--}}
