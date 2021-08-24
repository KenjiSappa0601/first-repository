@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Trip</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>新規作成</h1>
        <form action="/spots" method="POST">
            @csrf
            
            <div class="name">
                <h2>名称</h2>
                <input type="text" name="spot[name]" placeholder="名称" value="{{ old('spot.name') }}"/>
                <p class="name__error" style="color:red">{{ $errors->first('spot.name') }}</p>
            </div>
            
            <select type="text" class="form-control" style="width:200px" name="spot[prefecture]">
                 @foreach($pref as $key => $name)
                  <option value="{{ $name }}">{{ $name }}</option>
                 @endforeach
            </select>
            
            <div class="body" >
                <h2>説明文</h2>
                <textarea name="spot[body]" style="width:80%" placeholder="説明文">{{ old('spot.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('spot.body') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>

        <div class='back'>[ <a href='/'>back</a>]</div>
    </body>
</html>
@endsection