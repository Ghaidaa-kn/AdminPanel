@extends('master')
@section('content')

    <h1 class="headers">Update Company Info</h1>
    <form action="/update_comp/{{$company->id}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <h4 class="headers">Company Name :</h4>
      <div class="mb-3">
          <input type="text" name="name" class="form-control" value=
          "{{$company->name}}">
      </div>
      <h4 class="headers">Email :</h4>
      <div class="mb-3">
          <input type="email" name="email" class="form-control" value=
          "{{$company->email}}">
      </div>
      <h4 class="headers">Website :</h4>
      <div class="mb-3">
          <input type="text" name="website" class="form-control" value=
          "{{$company->website}}">
      </div>
      <h4 class="headers">Upload or Change Company's LOGO :</h4>
      <div class="mb-3">
        <input type="file" name="logo" class="form-control" accept="image/*">
      </div>
      <br>
      <div class="mb-3" style="text-align: center;">
        <button type="submit" class="add-one" style="width: 200px;">Update Company</button>
      </div>
    </form>

@endsection