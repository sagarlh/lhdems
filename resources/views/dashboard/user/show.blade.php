@extends('layouts.app')

@section('content')
<div class="container">

    <h1>user {{ $user->id }}
        <a href="{{ url('admin/user/' . $user->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit user"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['admin/user', $user->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete user',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $user->id }}</td>
                </tr>                
                <tr><th> Name</th><td> {{ $user->name }} </td></tr>
                <tr><th> Employment ID </th><td> {{ $user->emp_id }} </td></tr>
                <tr><th> E-mail</th><td> {{ $user->email }} </td></tr>
                <tr><th> Status</th><td> {{ $user->status }} </td></tr>
                <tr><th> Created at</th><td> {{ $user->created_at }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
