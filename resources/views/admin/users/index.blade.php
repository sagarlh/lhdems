@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users <a href="{{ url('/admin/users/create') }}" class="btn btn-primary pull-right btn-sm">Add New User</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Name</th><th>Email</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($users as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/admin/users', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('/admin/users/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/users', $item->id],
                            'style' => 'display:inline',
                            'class' => 'delete'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script>
            jQuery(document).ready(function($){
     $('.delete').on('submit',function(e){
        if(!confirm('Do you want to delete this item?')){
              e.preventDefault();
        }
      });
});
        </script>
        <div class="pagination"> {!! $users->render() !!} </div>
    </div>
@endsection
