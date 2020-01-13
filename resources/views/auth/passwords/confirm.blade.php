@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form id="loginform" action="{{ route('password.confirm')}}" onsubmit="return formSubmit(this)" method="post">
                            <div class="alert alert-success" role="alert" id="msg" style="display:none;">
                                </div>
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                <div class="invalid-feedback help-block" role="alert">
                                        <strong></strong>
                                    </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary saveBtn">
                                    {{ __('Confirm Password') }}
                                </button>

                                <button class="btn btn-primary" id="ajaxloader"
                                style="display:none;" type="button">
                                <i class="fa fa-spinner fa-spin"></i> Confirming...
                            </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
