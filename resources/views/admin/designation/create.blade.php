@extends('layouts.app')

@section('content')
<div class="container">
    <h4>
        Create New Designation
        <a class="btn btn-primary pull-right btn-sm" href="{{ URL::previous() }}">back</a>
    </h4>
    <hr/>

    {!! Form::open(['url' => '/admin/designations', 'class' => 'form-horizontal']) !!}

    <div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">

        {!! Form::label('department_id', 'Department Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Select']); !!}
            {!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('designation_name') ? 'has-error' : ''}}">

        {!! Form::label('designation_name', 'Designation Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('designation_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('designation_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection