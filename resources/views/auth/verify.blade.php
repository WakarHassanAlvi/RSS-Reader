@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" id="loginform" action="{{ route('verification.resend')}}" onsubmit="return formSubmit(this)" method="post">
                            <div class="alert alert-success" role="alert" id="msg" style="display:none;">
                                </div>
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        <button class="btn btn-link p-0 m-0 align-baseline" id="ajaxloader"
                        style="display:none;" type="button"><i class="fa fa-spinner fa-spin"></i> Link Sending...</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
