@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Trip</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>

    <body>
        @if( Auth::check() )
            <div class="user_id">こんにちは　{{ Auth::user()->name }}　さん</div>
        @endif
        
        <p class='create'>[<a href='/spots/create'>新規作成</a>]</p>
       
        <h3>検索</h3>
       
        <form action="{{ url('/spots/search') }}" method="GET">
            <select type="text" class="form-control" style="width:200px"  name="spot[prefecture]" >
                @foreach($pref as $key => $name)
                    <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
            <p><input type="submit" value="検索"></p>
        </form>
        
        
        <h2>　一覧</h2>
        
        <div class='spots'>
            @foreach ($spots as $spot)
            <div class="card" style="width:90%;margin: auto">
                <div class='spot'>
                    <a href='/spots/{{ $spot->id}}'><h2 class='name'>{{ $spot->name }}</h2></a>
                    <p class='prefecture'>{{ $spot->prefecture }}</p>
                    <p class='body'>{{ $spot->body }}</p>
                </div>
            </div>
            <p margin-bottom: 40px;></p>
            @endforeach
        </div>
        
         <div class='paginate'>
            {{ $spots->appends(Request::all())->links() }}
        </div>
        
    </body>
</html>
@endsection