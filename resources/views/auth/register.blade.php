@extends('layouts.app')

@section('content')

 
<div class="b-t">

    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
        <div class="p-a-md">
			<form class="form-horizontal form" role="form" method="POST" action="{{ url('/register') }}">
				<div class="form-group row usertype-div">
					<div class="col-sm-12">
						  <select class="form-control c-select" id = "usertype"   name = "usertype">
							<option value = "" selected = "selected">-Choose the user type-</option>
							<option value = "0">Fan</option>
							<option value = "1">Artise</option>
						  </select>
							@if ($errors->has('usertype'))
								<span class="help-block">
									<strong>Please select the user type </strong>
								</span>
							@endif
					</div>
				</div>
			<div>
			  <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-block indigo text-white m-b-sm" id = "facebook-btn">
				<i class="fa fa-facebook pull-left"></i>
				Sign up with Facebook
			  </a>
			  <a href="{{ route('social.oauth', 'google') }}" id = "google-plus-btn" class="btn btn-block red text-white">
				<i class="fa fa-google-plus pull-left"></i>
				Sign up with Google+
			  </a>
			</div>
			<div class="m-y text-sm">
			  OR
			</div>
			{{ csrf_field() }}
			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				<input id="name" type="text" class="form-control" name="name"  placeholder="Full Name" value="{{ old('name') }}" required autofocus>
				@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
				@endif			
			</div>
			
			<div class="form-group">
				<input  id="email" type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"  required>
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif				
			</div>
			
			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<input id="password" type="password" class="form-control" placeholder="Password" name="password"  required>
					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
			</div>				
			<div class="form-group">
				<input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password"  name="password_confirmation" required>
			</div>
				
			<input id="bio" type="hidden" class="form-control"  value = "" name="bio">
			 
			<div class="m-b-md text-sm">
				<span class="text-muted">By clicking Sign Up, I agree to the</span> 
				<a href="#">Terms of service</a> 
				<span class="text-muted">and</span> 
				<a href="#">Policy Privacy.</a>
			</div>
			<button type="submit"   class="btn btn-lg black p-x-lg btn-primary signupbtn signupinbtn">Sign Up</button>
		</form>
	   
		<div class="p-y-lg text-center">
          <div>Already have an account? <a href="{{ url('/login') }}" class="text-primary _600">Sign in</a></div>
        </div>
        </div>
    </div>
</div>

@endsection
