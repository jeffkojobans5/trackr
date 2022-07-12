@extends('auth')

@section('content')

<div class="form-screen">
        <a href="{{ route('addActivity') }}" class="spur-logo"><i class="fas fa-bolt"></i> <span> Trackr </span></a>

        <div class="card account-dialog">
            <div class="card-header bg-primary text-white"> Create an account </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control @error('name') is-invalid @enderror" placeholder="Enter name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                                  
                    
                    <div class="form-group">
                        <input type="password" id="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                    
                    </div>


                    <div class="form-group">
                        <input type="password" class="form-control" id="password-confirm" placeholder="Re-enter Password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation"  required autocomplete="new-password">
                    </div>


                    <div class="account-dialog-actions">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>                        
                        <a class="account-dialog-link" href="{{ route('login') }}">Already have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
