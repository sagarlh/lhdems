@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Department 
    <a class="btn btn-primary pull-right btn-sm" href="{{ URL::previous() }}">back</a>
</h3>
    <div class="table-responsive">

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Department Name</th><th>Billable </th><th>Created on</th> <th>Last modified</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $department->department_name }} </td><td> @if($department->is_billable == 0) No @else Yes @endif </td> <td> {{ $department->created_at->subDay()->format('F d, Y') }} </td> <td> {{ $department->updated_at->subDay()->format('F d, Y') }} </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection