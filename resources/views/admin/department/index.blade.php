@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Department's <a href="{{ url('/admin/departments/create') }}" class="btn btn-primary pull-right btn-sm">Add New Department</a></h4>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Name</th><th>Is billable</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($departments as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/admin/departments', $item->department_id) }}">{{ $item->department_name }}</a></td><td>@if($item->is_billable == 0) No @else Yes @endif</td>
                    <td>
                        <a href="{{ url('/admin/departments/' . $item->department_id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/departments', $item->department_id],
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
        <div>Total {{ $count }} department's found! </div>
        <div class="pagination"> {!! $departments->render() !!} </div>
    </div>
@endsection
