@extends('layouts.admins')
@section('content')
<style>
  .card-body {
    flex: 1 1 auto;
    padding: 1.25rem;
  }
  .card-header, .card-title {
    text-transform: uppercase;
    color: rgba(13,27,62,0.7);
    font-weight: bold;
    font-size: .88rem;
  }
  .btn {
    position: relative;
    transition: color 0.15s,background-color 0.15s,border-color 0.15s,box-shadow 0.15s;
    font-size: .8rem;
  }
</style>

<div class="row">
  <div class="col-md-6 col-xl-4">
   <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">REGISTRATION</h5>
        New Member Registration <br>
      <a href="{{ route('admins.register-farmer') }}" class="btn btn-success">Register Farmer</a>
    </div>
      </div>
</div>   
<div class="col-md-6 col-xl-4">
 <div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">DELIVERY</h5>
      Member Service Delivery <br>
    <a href="{{ route('admins.farmers') }}" class="btn btn-success">Delivery</a>
  </div>
  </div>
</div>   
<div class="col-md-6 col-xl-4">
 <div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">SERVICES</h5>
    Services Reports <br>
    <a href="{{ route('admins.services') }}" class="btn btn-success">View Services</a>
  </div>
  </div>
</div>  
</div>

 @endsection
