@extends('auth')

@section('content')
    <div class="form-screen">
                        <a href="{{ route('addActivity') }}" class="spur-logo"><i class="fas fa-bolt"></i> <span> Trackr </span></a>

        <div class="card account-dialog">
            <div class="card-header bg-primary text-white"> Restore password</div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif                
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <input id="email" type="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                    


                    <div class="account-dialog-actions">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>                   
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop