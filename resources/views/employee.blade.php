@extends('master')
@section('content')

    <h1 class="headers">Update Employee Info</h1>
    <form action="/update_emp/{{$employee->id}}" method="POST">
      {{ csrf_field() }}
      <h4 class="headers">First Name :</h4>
      <div class="mb-3">
          <input type="text" name="first_name" class="form-control" value="{{$employee->first_name}}">
      </div>
      <h4 class="headers">Last Name :</h4>
      <div class="mb-3">
          <input type="text" name="last_name" class="form-control" value="{{$employee->last_name}}">
      </div>
      <h4 class="headers">Email :</h4>
      <div class="mb-3">
          <input type="text" name="email" class="form-control" value="{{$employee->email}}">
      </div>
      <h4 class="headers">Phone :</h4>
      <div class="mb-3">
          <input type="text" name="phone" class="form-control" value="{{$employee->phone}}">
      </div>
      <h4 class="headers">Company :</h4>
      <div class="mb-3">
        <select name="company" class="form-control" style="height: 35px;">
          @foreach($companies as $company)
            <option value="{{$company->id}}" {{$company->id == $employee->company_id? 'selected' : ''}} >{{$company->name}}</option>
          @endforeach
        </select>
      </div>
      <br>
      <div class="mb-3" style="text-align: center;">
        <button type="submit" class="add-one" style="width: 200px;">Update Employee</button>
      </div>
    </form>

@endsection