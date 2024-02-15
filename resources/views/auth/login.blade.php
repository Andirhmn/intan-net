

@extends('layouts.mainlayout')

@section('title', 'Login')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card text-bg-dark mt-5">
      	<div class="card-header"><b>Login</b></div>

          <div class="card-body">
            <form method="POST" action="">
	    @csrf

	      <div class="mb-2 form-group row">
              	<label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
		  <div class="col-md-6">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                      	<strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
              </div>

	      <div class="mb-3 form-group row">
              	<label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" req>
                    @error('password')
                      <span class="invalid-feedback" role="alert">
	              	<strong>{{ $message }}</strong>
                      </span>
		    @enderror
		    @if(session('status'))
		      <span class="text-danger">{{session('message')}}</span>
		    @endif
                  </div>
              </div>

	      <div class="form-group row mb-0">
              	<div class="col-md-6 offset-md-2">
		  <label>Don't you have an account ? </label>
		  <a class="" href="register">Sign up here</a>

                 <!-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
		  @endif --!>
		</div>
		<div class="col-md-4">
                  <button type="submit" class="btn btn-primary">
                    Login
                  </button>
                </div>
	      </div>

            </form>
	  </div>

      </div>
    </div>
  </div>
</div>

@endsection


