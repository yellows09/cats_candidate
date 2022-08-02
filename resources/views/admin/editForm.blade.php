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
    <form action="{{ route('edit') }}" class="formCandidate" enctype="multipart/form-data" method="post">
        @csrf
        <input value="<?=$cat[0]['id']?>" type="hidden" name="id">
        <div class="form-group">
            <label for="exampleInputEmail1">Изменить почту</label>
            <input value="<?=$cat[0]['email']?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Введите email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Изменить имя кота</label>
            <input value="<?=$cat[0]['name']?>" type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Изменить имя">
        </div>
        <div class="form-group">
            <label for="exampleInputFile1">Изменить фото</label>
            <input type="file" class="form-control" id="exampleInputFile1" name="photo" placeholder="Фото кота">
        </div>
        <div class="form-group">
            <label for="exampleInputFile1">Рейтинг)</label>
            <input value="<?=$cat[0]['rate']?>" type="text" class="form-control" id="exampleInputFile1" name="rate" placeholder="Введите рейтинг кота">
        </div>
        <div class="form-check">
            <input value="<?=$cat[0]['show']?>" class="form-check-input" type="checkbox" name="show" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Показать?
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form><br>
    <div class="formCandidate">
        <form action="{{route('delete')}}" method="post">
            @csrf
            <input value="<?=$cat[0]['id']?>" type="hidden" name="id">
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
@endsection
