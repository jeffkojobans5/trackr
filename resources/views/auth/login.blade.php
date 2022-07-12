@extends('auth')

@section('content')
    <div class="form-screen">
                        <a href="{{ route('addActivity') }}" class="spur-logo"><i class="fas fa-bolt"></i> <span> Trackr </span></a>

        <div class="card account-dialog">
            <div class="card-header bg-primary text-white"> Create an account </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                                  
                    
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                    
                    </div>

                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>


                    <div class="form-group">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>




                    <div class="account-dialog-actions">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>                        
                        <a class="account-dialog-link" href="{{ route('register') }}">  Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop    


