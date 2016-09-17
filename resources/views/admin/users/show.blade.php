@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User</h1>    
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                     <th>Name</th><th>Email</th><th>Status</th><th>Created on</th><th>Last modified</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $user->name }} </td><td> {{ $user->email }} </td><td> {{ $user->status }} </td><td> {{ $user->created_at->subDay()->format('F d, Y') }} </td>
                    <td> {{ $user->updated_at->subDay()->format('F d, Y') }} </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection