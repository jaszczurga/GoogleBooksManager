{{--<div class="row wide-xl " >--}}
{{--    @foreach($breeds as $breed)--}}
{{--        <div class="col-lg-2 ">--}}
{{--            <div class="feature-with-icon" data-aos="flip-up" >--}}
{{--                <h5><strong>{{ucfirst($breed)}}</strong></h5>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}

    <!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>tabelka</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="col" style="text-align: left;">
        <h1 style="text-align: center;">Pieski</h1>
        <div class="table-responsive" style="width: 30%;margin-right: auto;margin-left: auto;border-width: 3px;border-color: black">
            <table class="table">
                <thead style="border-width: 2px;border-color: var(--bs-table-color);">
                <tr>
                    <th style="background: rgb(227,93,93);">Column 1</th>
                </tr>
                </thead>
                <tbody style="border-width: 2px;border-color: var(--bs-table-color);">
                @foreach($breeds as $breed)
                <tr>
                    <td style="background: rgb(194,158,158);">{{ucfirst($breed)}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

</html>
