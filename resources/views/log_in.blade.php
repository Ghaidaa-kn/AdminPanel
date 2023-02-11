<!DOCTYPE html>
<html>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="/login" method="POST" style="padding-top: 100px;">
      {{ csrf_field() }}
      <h1 class="headers" style="text-align: center;">Login Page</h1>
      <h4 class="headers">Email :</h4>
      <div class="mb-3">
          <input type="text" name="email" class="form-control" >
      </div>
      <h4 class="headers">Password :</h4>
      <div class="mb-3">
          <input type="password" name="password" class="form-control" >
      </div>
      <br>
      <div class="mb-3" style="text-align: center;">
        <button type="submit" class="btn btn-primary" style="width: 200px;">Login</button>
      </div>
    </form>
</div>
</body>
</html>