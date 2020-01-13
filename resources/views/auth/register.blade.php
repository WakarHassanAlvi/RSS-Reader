@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="loginform" action="{{ route('register')}}" onsubmit="return formSubmit(this)" method="post">
                            <div class="alert alert-success" role="alert" id="msg" style="display:none;">
                                </div>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>

                                <div class="invalid-feedback help-block" role="alert">
                                        <strong></strong>
                                    </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" onkeyup="checkEmail($(this))" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                <available></available>
                                <div class="invalid-feedback help-block" role="alert">
                                        <strong></strong>
                                        
                                    </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                <div class="invalid-feedback help-block" role="alert">
                                        <strong></strong>
                                    </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>

                            <div class="invalid-feedback help-block" role="alert">
                                    <strong></strong>
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary saveBtn">
                                    {{ __('Register') }}
                                </button>

                                <button class="btn btn-primary" id="ajaxloader"
                                style="display:none;" type="button">
                                <i class="fa fa-spinner fa-spin"></i> Registering...
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
