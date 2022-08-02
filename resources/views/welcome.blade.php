<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>@yield('title')</title>
    <style>
        .formCandidate{
            margin-left: 20%;
            margin-right: 20%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Cats</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="{{route('main')}}">Главная  <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="{{route('createCandidateForm')}}">Добавить кандидата</a>
            @if(!\Illuminate\Support\Facades\Auth::check())
                <a class="nav-item nav-link" href="{{route('loginAdmin')}}">Админка</a>
            @endif
            @if(\Illuminate\Support\Facades\Auth::check())
                <a class="nav-item nav-link" href="{{route('allCandidate')}}">Все кандидаты</a>
                <form action="{{route('leaveAccount')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Выйти</button>
                </form>
            @endif
        </div>
    </div>
</nav>
@yield('content')
</body>
</html>
