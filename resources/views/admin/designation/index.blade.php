@extends('layouts.app')

@section('content')
<?php //print_r($designations); ?>
<div class="container">
    <h4>Designation's <a href="{{ url('/admin/designations/create') }}" class="btn btn-primary pull-right btn-sm">Add New Designation</a></h4>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Name</th><th>Department</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($designations as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/admin/designations', $item->department_id) }}">{{ $item->designation_name }}</a></td><td>{{ App\Department::find($item->department_id)->department_name }}</td>
                    <td>
                        <a href="{{ url('/admin/designations/' . $item->department_id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/admin/designations', $item->department_id],
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
        <div>Total {{ $count }} designations's found! </div>
        <div class="pagination"> {!! $designations->render() !!} </div>
    </div>
@endsection
