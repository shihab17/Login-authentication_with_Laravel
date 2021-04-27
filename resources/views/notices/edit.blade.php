
@extends('layouts.app')

@section('content')
    <h1>Edit Notice</h1>
    {{ Form::open(['url' => ['notice', $notice->id], 'method' => 'POST']) }}
    <div>
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $notice->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
    </div>
    <div>
        {{ Form::label('desc', 'Description') }}
        {{ Form::textarea('desc', $notice->desc, ['class' => 'form-control', 'placeholder' => 'Description']) }}
    </div>
    {{ Form::hidden('_method', 'PUT') }}
    {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection
