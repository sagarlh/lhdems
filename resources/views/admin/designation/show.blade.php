@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Department 
    <a class="btn btn-primary pull-right btn-sm" href="{{ URL::previous() }}">back</a>
</h1>
    <div class="table-responsive">

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Designation Name</th><th>Department </th><th>Created on</th> <th>Last modified</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $designation->Designation_name }} </td><td>  </td> <td> {{ $designation->created_at-> }} </td> <td> {{ $designation->updated_at }} </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection