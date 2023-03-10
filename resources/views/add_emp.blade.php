@extends('master')
@section('content')

    <h1 class="headers">Add New Employee</h1>
    <form action="/add_emp" method="POST">
      {{ csrf_field() }}
      <h4 class="headers">First Name :</h4>
      <div class="mb-3">
          <input type="text" name="first_name" class="form-control">
      </div>
      <h4 class="headers">Last Name :</h4>
      <div class="mb-3">
          <input type="text" name="last_name" class="form-control">
      </div>
      <h4 class="headers">Email :</h4>
      <div class="mb-3">
          <input type="text" name="email" class="form-control">
      </div>
      <h4 class="headers">Phone :</h4>
      <div class="mb-3">
          <input type="text" name="phone" class="form-control">
      </div>
      <h4 class="headers">Company :</h4>
      <div class="mb-3">
        <select name="company" id="company" class="form-control" style="height: 35px;">
          @foreach($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
          @endforeach
        </select>
      </div>
      <br>
      <div class="mb-3" style="text-align: center;">
        <button type="submit" class="add-one" style="width: 200px;">Add Employee</button>
      </div>
    </form>

@endsection