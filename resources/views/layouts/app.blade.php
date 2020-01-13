<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script>
            window.Laravel = {!!json_encode(["siteUrl" => url("/"), 'csrfToken' => csrf_token()]) !!}
        </script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
        .invalid-feedback {
            display: block;
        }
        available {
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: green;
        }
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute(
            'content');
    </script>
    <script>
            var formSubmit = function(_form){
    
                var frm = jQuery(_form);
                var btn = frm.find(".saveBtn");
                var loader = frm.find("#ajaxloader");
                var msg = frm.find("#msg");
                
                axios({
                    method: 'post',
                    url: frm.attr('action'),
                    data:frm.serialize(),
                    onUploadProgress: function (progressEvent) {
                        msg.hide();
                        btn.hide();
                        loader.show(500);
                    }
                })
                    .then(function (response){
                        if(response.data){
                            $(window).scrollTop(0);
                            frm.find('.form-group').removeClass('error');
                            frm.find('.help-block').find('strong').html('');
                            if(response.data.success) {
                                    frm[0].reset();
                                    msg.removeClass('alert-danger');
                                    msg.addClass('alert-success');
                                    msg.show();
                                    msg.html(response.data.message);
                                    loader.hide();
                                    btn.show(500);
                                    setTimeout(function(){
                                        window.history.replaceState({
                                            isBackPage: false,
                                            "html": 'jscv',
                                            "pageTitle": 'bsckj'
                                        }, "", response.data.redirect);
                                        window.location.href=response.data.redirect;             
                                       },1000);
                                       setTimeout(function(){
                                        msg.hide(500);                   
                                       },3000);
                            }else{
                                msg.removeClass('alert-success');
                                msg.addClass('alert-danger');
                                msg.show();
                                msg.html(response.data.message);
                                loader.hide();
                                btn.show(500);
                                setTimeout(function(){
                                    msg.fadeOut(500);                   
                                   },3000);
                            }
            
                        }
                    })
                    .catch(function (error) {
                        loader.hide();
                        btn.show(500);
                        if (error.response) {
                            if(error.response.status == "419"){
                                toastr.error('Page session expired');
                                setTimeout(function(){
                                    location.reload();             
                                   },2000);
                            }
                            $(window).scrollTop(0);
                            var errors =  error.response.data.errors;
                            frm.find('.form-group').removeClass('error');
                            frm.find('.help-block').find('strong').html('');
                            var checkFirstEle = 0;
                            
                            jQuery.each(errors, function(i, _msg) {
                                var el = frm.find("[name="+i+"]");
                                if(checkFirstEle == 0){
                                    el.focus();
                                    checkFirstEle++;
                                    }
                                el.parents('.form-group').addClass('error');
                                el.parents('.form-group').find('.help-block').find('strong').html(_msg[0]);
                            });
                        }
                    });
                return false;
            };

            var checkEmail = function(ele){
    
                axios({
                    method: 'post',
                    url: "{{route('check-email')}}",
                    data:{email:ele.val()},
                    onUploadProgress: function (progressEvent) {
                        //
                    }
                })
                    .then(function (response){
                        ele.parents('.form-group').removeClass('error');
                        ele.parents('.form-group').find('.help-block').find('strong').html('');
                        ele.parents('.form-group').find('available').html('');
                        if(response.data){
                            ele.parents('.form-group').find('available').html(response.data.message);  
                        }
                    })
                    .catch(function (error) {
                        ele.parents('.form-group').find('available').html('');
                        ele.parents('.form-group').removeClass('error');
                        ele.parents('.form-group').find('.help-block').find('strong').html('');
                        if (error.response) {
                            ele.parents('.form-group').addClass('error');
                                ele.parents('.form-group').find('.help-block').find('strong').html(error.response.data.error.email[0]);
                            
                        }
                    });
                return false;
            };
    </script>
</body>
</html>
