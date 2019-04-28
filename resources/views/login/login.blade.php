<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Please SignIn</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>

<body>
    <form id="msform" method="POST" action="{{ route('login') }}">
        @csrf
        <fieldset>
            <h2 class="fs-title">Sign In</h2>
            <h3 class="fs-subtitle">             @if ($errors->has('email') || $errors->has('password'))
             <p class="invalid-feedback" role="alert">
                {{-- $errors->first('email') --}} Wrong Email or Password
                </script>
            </p>
            @endif</h3>
            <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="text" name="email" required placeholder="Email" />
            <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" type="password" name="password" required placeholder="Password" />
            @if ($errors->has('password'))
            {{-- <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span> --}}
            @endif
            <span><input class="checkbox" type="checkbox" name="remember" id="checkbox" value=""/><label for="checkbox">Remember Me</label></span>
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


</body>

</html>
