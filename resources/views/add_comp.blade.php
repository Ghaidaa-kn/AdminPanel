@extends('master')
@section('content')

    <h1 class="headers">Add New Company</h1>
    <form action="/add_comp" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <h4 class="headers">Company Name :</h4>
      <div class="mb-3">
          <input type="text" name="name" class="form-control">
      </div>
      <h4 class="headers">Email :</h4>
      <div class="mb-3">
          <input type="email" name="email" class="form-control">
      </div>
      <h4 class="headers">Website :</h4>
      <div class="mb-3">
          <input type="text" name="website" class="form-control">
      </div>
      <h4 class="headers">LOGO :</h4>
      <div class="mb-3">
        <input type="file" name="logo" accept="image/*">
      </div>
      <br>
      <div class="mb-3" style="text-align: center;">
        <button type="submit" class="add-one">Add Company</button>
      </div>
    </form>

@endsection