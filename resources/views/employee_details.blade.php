@extends('master')
@section('content')

<h1 class="headers" style="text-align: center;">{{$employee->first_name}} Details</h1>
<div class="container" style="text-align: center;">

    <div>
        <h3 class="headers">Name : {{$employee->first_name}} {{$employee->last_name}}</h3>
        <h3 class="headers">Email : {{$employee->email}}</h3>
        <h3 class="headers">Phone : {{$employee->phone}}</h3>
    </div>
  
    <div>
    	<h3 class="headers">Works at : 
    		<span style="color: #5584ff;;">{{$employee->name}}</span> Company
    	</h3>
    	<h3 class="headers">Company's Email : {{$employee->email}}</h3>
    </div>
    <br>
    @if($employee->logo != null)
    <div>
      <img style="border-radius: 8px; display: block; margin:auto;
        width: 200px; height: 200px; object-fit: scale-down;" 
        src="{{ asset('storage/'.$employee->logo) }}">
    </div>
    @endif
</div>



@endsection