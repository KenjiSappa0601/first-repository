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
        
        <h1>名称</h1>
        
        @if( $id == $spot->id )
        <p class='edit'>[<a href="/spots/{{ $spot->id }}/edit">edit</a>]</p>
        <form action="/spots/{{ $spot->id }}" id="form_delete" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" style="display:none">
            <p class='delete'>[<a onclick="return deleteSpot(this);">delete</a>]</p>
        </form>
        @endif
        
        <div class='spot'>
            <h2 class='name'>{{ $spot->name }}</h2>
            <h3 class='prefecture'>{{ $spot->prefecture }}</h3>
            <p class='body'>{{ $spot->body }}</p>
            <p class='updated_at'>{{ $spot->updated_at }}</p>
        </div>
        <div class='back'>[ <a href='/'>back</a>]</div>
        <script>
            function deleteSpot(e) {
                'use strict';
                if (confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById('form_delete').submit();
                }
            }
        </script>

    </body>
</html>
@endsection