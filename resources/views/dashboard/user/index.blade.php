@extends('layouts.app')

@section('content')
<div class="container">

    <h1>User <a href="{{ url('/admin/user/create') }}" class="btn btn-primary btn-xs" title="Add New user"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Emp Id </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->emp_id }}</td>
                    <td>
                        <a href="{{ url('/admin/user/' . $item->id) }}" class="btn btn-success btn-xs" title="View user"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/admin/user/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit user"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/user', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete user" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete user',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $user->render() !!} </div>
    </div>

</div>
@endsection