@extends('layouts.app')
@section('content')
    <h1>Create New Notice</h1>
    {{ Form::open(['url' => 'notice']) }}
    <div>
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>
    <div>
        {{ Form::label('desc', 'Description') }}
        {{ Form::textarea('desc', '', ['class' => 'form-control', 'placeholder' => 'Description']) }}
    </div>
    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection
