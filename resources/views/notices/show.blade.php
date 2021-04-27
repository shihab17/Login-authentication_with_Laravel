@extends('layouts.app')
@section('content')
<h1>Show Notices</h1>
<h3>Role ID: {{ $role_id }}</h3>
<h1>{{ $notice->title }}</h1>
<small>{{ $notice->created_at }}</small>
<p>{{ $notice->desc }}</p>
@if ($role_id == 'admin')
    <a href="/notice/{{ $notice-> id }}/edit" class="btn btn-primary">Edit</a>
    {!! Form::open(['url' => ['notice', $notice->id], 'method' => 'POST'])  !!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
    {!! Form::close() !!}
    
@endif

@endsection