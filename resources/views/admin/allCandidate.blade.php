@extends('welcome')
@section('content')
    <div class="container bootstrap snipets">
        <h1 class="text-center text-muted">Премия - "Котик Года"</h1>
        <div class="row flow-offset-1">
            @foreach($candidates as $candidate)
                <div class="col-xs-6 col-md-4">
                    <div class="product tumbnail thumbnail-3"><a href="#"><img
                                src="{{asset('/storage/'.$candidate['photo'])}}" alt="" width="350" height="280"></a>
                        <div class="caption">
                            <h6><?=$candidate['name']?>(<?=$candidate['rate']?>)</h6>
                            @if($candidate['show']==0)
                                (скрыт)
                            @endif
                        </div>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <button><a class="nav-item nav-link" href="{{route('editForm',$candidate['id'])}}">Редактировать</a></button>
                    @endif
                    <br> <br>
                </div>
            @endforeach
        </div>
    </div>
@endsection
