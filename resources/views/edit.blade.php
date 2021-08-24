@extends('layouts.app')

@section('content')<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Trip</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>編集画面</h1>
        <form action='/spots/{{ $spot->id }}' method="POST">
            @csrf
            @method('PUT')
            <div class="name">
                <h2>名称</h2>
                
                <input type="text" name="spot[name]" value="{{ $spot->name }}">
                <p class="name__error" style="color:red">{{ $errors->first('spot.name') }}</p>
            </div>
            <select type="text" class="form-control" style="width:200px" name="spot[prefecture]">
                 @foreach($pref as $key => $name)
                 　　@if ($spot->prefecture == $name)
                      <option value="{{ $name }}" selected> {{ $name }} </option>
                     @else
                 　　<option value="{{ $name }}">{{ $name }}</option>
                     @endif
                 @endforeach
                
    
            </select>
            <div class="body">
                <h2>説明文</h2>
                <textarea type="text" name="spot[body]" >{{ $spot->body }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('spot.body') }}</p>
            </div>
            <input type="submit" value="update"/>
        </form>

        <div class='back'>[ <a href='/spots/{{ $spot->id }}'>back</a>]</div>
    </body>
</html>
@endsection