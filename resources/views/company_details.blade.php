@extends('master')
@section('content')
    <div class="container" style="padding-bottom: 70px; padding-right: 100px;">
        <div style="float: left;">
            <h3 class="headers">{{$company->name}} Company</h3>
            <h3 class="headers">Email : {{$company->name}}</h3>
            <h3 class="headers">Website : {{$company->website}}</h3>
        </div>
        @if($company->logo != null)
        <div>
          <img style="border-radius: 8px; display: block; float: left; float: right;
            width: 250px; height: 250px; object-fit: scale-down;" 
            src="{{ asset('storage/'.$company->logo) }}">
        </div>
        @endif
    </div>

    <div class="container">
        @if(count($employees) > 0)
        <h1 class="headers">{{$company->name}} Employees</h1>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        {!! $employees->links() !!}
        @else
        <h1 class="headers">No Employees Until Now !!</h1>
        @endif
    </div>

@endsection
 <!-- margin-left: auto; margin-right: auto; -->