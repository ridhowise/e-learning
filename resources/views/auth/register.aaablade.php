@extends('layouts.login')

@section('content')
<body class="align">

  <div class="grid">
        <div class="container">

          <body class="align">

            <div class="grid">
                <img src="adm/img/logo.png" alt="logo" style="width:50%;display: block;margin-left: auto;margin-right: auto;">
                <h3 class="text--center" style="color:#23395d"><strong>Register</strong> </h3>
                 <hr style="visibility: hidden">
                <form class="m-t form login" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf
                <input id="status_aktif" type="hidden" class="form-control" name="status_aktif" value="0" >
                <input id="level_id" type="hidden" class="form__input" name="level_id" value="1" >
                <div class="form__field">
                    <label for="login__username"><svg class="icon">
                        <use xlink:href="#icon-user"></use>
                      </svg><span class="hidden">Username</span></label>
                    <input autocomplete="username" id="login__username" type="text" name="name" class="form__input{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Nama"  required>
                  </div>
                  @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                <div class="form__field">
                  <label for="login__username"><svg class="icon">
                      <use xlink:href="#icon-envelope"></use>
                    </svg><span class="hidden">Email</span></label>
                  <input autocomplete="username" id="login__username" type="email" name="email" class="form__input{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email"  value="{{ old('email') }}" required> 
                </div>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                <div class="form__field">
                  <label for="login__password"><svg class="icon">
                      <use xlink:href="#icon-lock"></use>
                    </svg><span class="hidden">Password</span></label>
                  <input id="login__password" type="password" name="password" class="form__input{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
                </div>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
                <div class="form__field">
                    <label for="login__password"><svg class="icon">
                        <use xlink:href="#icon-lock"></use>
                      </svg><span class="hidden">Password</span></label>
                    <input id="login__password" type="password" name="password_confirmation" class="form__input" placeholder="Confirm Password" required>
                  </div>

                <div class="form__field">
                  <input type="submit" value="Sign Up">
                </div>
                <p class="text--center">Already have an account? <a href="/login">Sign in</a> <svg class="icon">
                    <use xlink:href="#icon-arrow-right"></use>
                  </svg></p>
              </form>
          
              
            </div>
          
            <svg xmlns="http://www.w3.org/2000/svg" class="icons">
              <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
                <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
              </symbol>
              <symbol id="icon-lock" viewBox="0 0 1792 1792">
                <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
              </symbol>
              <symbol id="icon-user" viewBox="0 0 1792 1792">
                <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
              </symbol>
              <symbol id="icon-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
              </symbol>
            </svg>


@endsection
