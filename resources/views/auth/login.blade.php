<!DOCTYPE HTML>
<html>

<head>
  <title>Say Halal | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- Bootstrap Core CSS -->
  <link href="/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
  <!-- Custom CSS -->
  <link href="/css/style.css" rel='stylesheet' type='text/css' />
  <link href="/css/font-awesome.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.login-form {
  		width: 340px;
      	margin: 30px auto;
  	}
      .login-form form {
      	margin-bottom: 15px;
          background: #f7f7f7;
          box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
          padding: 30px;
      }
      .login-form h2 {
          margin: 0 0 15px;
      }
      .login-form .hint-text {
  		color: #777;
  		padding-bottom: 15px;
  		text-align: center;
      }
      .form-control, .btn {
          min-height: 38px;
          border-radius: 2px;
      }
      .login-btn {
          font-size: 15px;
          font-weight: bold;
      }
      .or-seperator {
          margin: 20px 0 10px;
          text-align: center;
          border-top: 1px solid #ccc;
      }
      .or-seperator i {
          padding: 0 10px;
          background: #f7f7f7;
          position: relative;
          top: -11px;
          z-index: 1;
      }
      .social-btn .btn {
          margin: 10px 0;
          font-size: 15px;
          text-align: left;
          line-height: 24px;
      }
  	.social-btn .btn i {
  		float: left;
  		margin: 4px 15px  0 5px;
          min-width: 15px;
  	}
  	.input-group-addon .fa{
  		font-size: 18px;
  	}
  </style>
  <!-- jQuery -->
  <script src="/js/jquery.min.js"></script>
  <!----webfonts--->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
  <!---//webfonts--->
  <!-- Bootstrap Core JavaScript -->
  <script src="/js/bootstrap.min.js"></script>
</head>

<body id="login">
  <div class="login-logo">
    <a href="/"><h1 class="form-heading">Say Halal</h1></a>
  </div>
  <h2 class="form-heading">Login</h2>
  <div class="app-cam">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <!-- <input id="email" type="text" class="text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" required autocomplete="email" autofocus>
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <input id="password" type="password" class="@error('password') is-invalid @enderror" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required autocomplete="current-password">
      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      <label class="form-check-label" for="remember">
          {{ __('Remember Me') }}
      </label>
      <div class="submit"><input type="submit" onclick="myFunction()" value="Login"></div> -->
      <div class="text-center social-btn">
            <a href="/auth/facebook" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
            <!-- <a href="#" class="btn btn-info btn-block"><i class="fa fa-twitter"></i> Sign in with <b>Twitter</b></a> -->
			      <a href="/auth/google" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>
      </div>
      <!-- <ul class="new">
        <li class="new_left">
          <p><a href="{{ route('password.request') }}">Forgot Password ?</a></p>
        </li>
        <li class="new_right">
          <p class="sign">New here ?<a href="/register"> Sign Up</a></p>
        </li>
        <div class="clearfix"></div>
      </ul> -->
    </form>
  </div>
  <div class="copy_layout login">
    <p>Copyright &copy; 2019 Say Halal. All Rights Reserved | Design by <a href="http://karyastudio.com/" target="_blank">Karya Studio</a> </p>
  </div>
</body>

</html>
