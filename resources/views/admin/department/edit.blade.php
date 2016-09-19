@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        Eidt Department
        <a class="btn btn-primary pull-right btn-sm" href="{{ URL::previous() }}">back</a>
    </h1>
    <hr/>

    {!! Form::model($department, [
        'method' => 'PATCH',
        'url' => ['/admin/departments', $department->department_id],
        'class' => 'form-horizontal'
    ]) !!}
    <div class="form-group {{ $errors->has('department_name') ? 'has-error' : ''}}">
        {!! Form::label('department_name', 'Department Name: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('department_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('department_name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('is_billable') ? 'has-error' : ''}}">
        <div class="col-sm-6">
        {!! Form::label('is_billable', 'Billable: ', ['class' => 'col-sm-3 control-label']) !!} 
            <div class="col-sm-3">                    
                {{ Form::radio('is_billable', '1') }}
            </div>
            {!! Form::label('is_billable', 'Not billable: ', ['class' => 'col-sm-3 control-label']) !!} 
            <div class="col-sm-3">
                               
                {{ Form::radio('is_billable', '0') }}
            </div>
            {!! $errors->first('is_billable', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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