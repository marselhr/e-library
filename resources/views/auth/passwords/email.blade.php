@extends('auth.app')

@section('content')
    <div class="min-vh-100">
        <div class="row align-items-center justify-content-center px-3 min-vh-100">
            <div class="col-12 col-md-5">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class=" mb-3">
                                <label for="email" class=" col-form-label">{{ __('Alamat Email') }}</label>

                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class=" offset-md-4">
                                <button type="submit" class="btn btn-primary float-end">
                                    {{ __('Minta Tautan Perbarui Kata Sandi') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
