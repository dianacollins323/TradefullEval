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
            <div class="col-sm-12">
                <h1>Birth Date Recorder</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ isset($date) ? '/update/'.$date->id : '/create' }}" method="post">
                @csrf <!-- {{ csrf_field() }} -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Name</h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="inputName4" placeholder="Name" name="name" value="{{ $date->name ?? '' }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5>Birth Date</h5>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <select id="inputMonth" class="form-control" name="month">
                                <option value="">Month</option>
                                <option value="1" {{ isset($date) && $date->getMonth()==1 ? 'selected' : '' }}>January</option>
                                <option value="2" {{ isset($date) && $date->getMonth()==2 ? 'selected' : '' }}>February</option>
                                <option value="3" {{ isset($date) && $date->getMonth()==3 ? 'selected' : '' }}>March</option>
                                <option value="4" {{ isset($date) && $date->getMonth()==4 ? 'selected' : '' }}>April</option>
                                <option value="5" {{ isset($date) && $date->getMonth()==5 ? 'selected' : '' }}>May</option>
                                <option value="6" {{ isset($date) && $date->getMonth()==6 ? 'selected' : '' }}>June</option>
                                <option value="7" {{ isset($date) && $date->getMonth()==7 ? 'selected' : '' }}>July</option>
                                <option value="8" {{ isset($date) && $date->getMonth()==8 ? 'selected' : '' }}>August</option>
                                <option value="9" {{ isset($date) && $date->getMonth()==9 ? 'selected' : '' }}>September</option>
                                <option value="10" {{ isset($date) && $date->getMonth()==10 ? 'selected' : '' }}>October</option>
                                <option value="11" {{ isset($date) && $date->getMonth()==11 ? 'selected' : '' }}>November</option>
                                <option value="12" {{ isset($date) && $date->getMonth()==12 ? 'selected' : '' }}>December</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select id="inputDay" class="form-control" name="day">
                                <option value="">Day</option>
                                @for ($i = 1; $i < 32; $i++)
                                    <option value="{{ $i }}" {{ isset($date) && $date->getDay()==$i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select id="inputYear" class="form-control" name="year">
                                <option value="">Year</option>
                                @for ($i = 2021; $i > 1920; $i--)
                                    <option value="{{ $i }}" {{ isset($date) && $date->getYear()==$i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="row mt-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
