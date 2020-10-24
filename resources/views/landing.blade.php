@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row d-flex align-items-center">
       <div class="col-md-6 p-5">
        <h1 class="display-4">Show Your Drinks<br/> with style!</h1>
        <h4 class="font-weight-normal"> Keep a list of your drinks all in one place and show your recipes easily!</h4>
        <a class="btn btn-primary btn-lg" href="/register" role="button">Sign Up</a>
       </div>
       <div class="col-md-6 d-flex align-items-center justify-content-center">
           <img src="https://drinkster-images.s3-us-west-1.amazonaws.com/appImages/cocktailLanding.png" style="max-width: 75%">
       </div>
   </div>
</div>
@endsection
