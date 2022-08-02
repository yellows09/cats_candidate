@extends('welcome')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('createCandidateProcess')}}" class="formCandidate" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Почта</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Введите email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Имя кота</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Как зовут кота?">
        </div>
        <div class="form-group">
            <label for="exampleInputFile1">Фото</label>
            <input type="file" class="form-control" id="exampleInputFile1" name="photo" placeholder="Фото кота">
        </div>
        <button type="submit" class="btn btn-primary">Подать заявку</button>
    </form>
@endsection
