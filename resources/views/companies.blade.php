@extends('master')
@section('content')

<div class="container">
    <div style="float: left; padding-bottom: 20px;">
        <h1 class="headers">Companies Information</h1>
    </div>
    <!-- <div style="padding-top: 40px; text-align: center; float: left;float: right;">
        <a href="/create_comp" class="add-one">Add New Company</a>
    </div> -->
</div>

<div class="container" style="overflow-x: auto; white-space: nowrap;">
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td>{{$company->name}}</td>
            <td>{{$company->email}}</td>
            <td>{{$company->website}}</td>
            <td>
                <a class="btn btn-secondary" href="/show_comp/{{$company->id}}">Show</a>
            </td>
            <td>
                <a class="btn btn-primary" href="/edit_comp/{{$company->id}}">Edit</a>
            </td>
            <td>
                <a class="btn btn-dark" href="/delete_comp/{{$company->id}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
    <div style="padding-top: 20px; padding-bottom: 20px; text-align: center;">
        {!! $companies->links() !!}
    </div>
    <div style="padding-top: 40px; text-align: center;">
        <a href="/create_comp" class="add-one">Add New Company</a>
    </div>
</div>

@endsection