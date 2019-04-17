<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Please SignIn</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>

<body>
    <form id="msform" method="POST" action="{{ route('login') }}">
        @csrf
        <fieldset>
            <h2 class="fs-title">Sign In</h2>
            <h3 class="fs-subtitle"> </h3>
            <input type="text" name="email" placeholder="Email" />
            @if ($errors->has('email'))
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span> --}}
            @endif
            <input type="password" name="password" placeholder="Password" />
            @if ($errors->has('password'))
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span> --}}
            @endif
            <input type="submit" name="next" class="next action-button" value="Sign In"/>
            <a href="forgot-pass" style="text-decoration:none;">
                <h3 class="fs-subtitle">Forgot your password?</h3>
            </a>
            <a href="signup" style="text-decoration:none;">
                <h3 class="fs-subtitle">Didn't Have Account?</h3>
            </a>
        </fieldset>
    </form>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script src="js/auth.js"></script>
</body>

</html>
