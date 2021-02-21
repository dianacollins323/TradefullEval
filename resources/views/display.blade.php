<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <h1>Birth Dates</h1>
        </div>
        @if(session()->has('message'))
            <div class="col-sm-3">
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            </div>
        @endif
        <div class="col-sm-3">
            <a href="/create">Add New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">Name</div>
                <div class="col-sm-4">Birthday</div>
                <div class="col-sm-4"></div>
            </div>
            @foreach ($dates as $d)
                <div class="row">
                    <div class="col-sm-4">{{ $d->name }}</div>
                    <div class="col-sm-4">{{ $d->getNiceDate() }}</div>
                    <div class="col-sm-4">
                        <a href="/update/{{ $d->id }}">update</a> | <a href="/delete/{{ $d->id }}">delete</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
