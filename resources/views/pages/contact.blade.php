@extends('app')

@section('content')
    <h1>Contact!</h1>
    <br>
    <h2>
        @if(count($people))
            <ul>
                @foreach($people as $person )
                    <li> {{ $person }}</li>
                @endforeach

            </ul>
        @endif

    </h2>
@stop