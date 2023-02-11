@extends('master')
@section('content')

<div class="container">
    <div style="float: left; padding-bottom: 20px;">
        <h1 class="headers">Employees Information</h1>
    </div>
    <!-- <div style="padding-top: 40px; text-align: center; float: left;float: right;">
        <a href="/create_emp" class="add-one">Add New Employee</a>
    </div> -->
</div>
<div class="container">
    <div style="overflow-x: auto; white-space: nowrap;">
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{$employee->first_name}}</td>
                <td>{{$employee->last_name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>
                    <a class="btn btn-secondary" href="/show_emp/{{$employee->id}}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary" href="/edit_emp/{{$employee->id}}">Edit</a>
                </td>
                <td>
                    <a class="btn btn-dark" href="/delete_emp/{{$employee->id}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div style="padding-top: 20px; text-align: center;">
        {!! $employees->links() !!}
    </div>
    <div style="padding-top: 40px; text-align: center;">
        <a href="/create_emp" class="add-one">Add New Employee</a>
    </div>
</div>
    
</div>

@endsection