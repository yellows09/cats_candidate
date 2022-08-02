@extends('welcome')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('checkAdmin')}}" class="formCandidate" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Логин</label>
            <input type="text" class="form-control" id="exampleInputLogin1" aria-describedby="emailHelp" name="login" placeholder="Введите логин">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Как зовут кота?">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
@endsection
