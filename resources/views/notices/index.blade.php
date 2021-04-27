@extends('layouts.app')
@section('content')
<h1>Notices</h1>
@if (count($notices)>0)
    <div class="card m-5 p-5">
        <ul class="list-group">
            @foreach ($notices as $notice)
    <li class="list-group-item">
        <h4><a href="/notice/{{ $notice-> id }}">{{ $notice -> title }}</a></h4>
        <small>Post Time: {{ $notice -> created_at  }}</small>
    </li>
@endforeach
        </ul>

    </div>
    
@endif

@endsection