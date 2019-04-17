<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Please SignUp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>

<body>

    <!-- multistep form -->
    <form id="msform" method="POST" action="{{ route('register') }}">
        @csrf
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Account Setup</li>
            <li>Personal Details</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <h2 class="fs-title">Create your account</h2>
            <h3 class="fs-subtitle">This is step 1</h3>
            <input type="text" name="email" placeholder="Email" />
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
            <input type="password" name="password" placeholder="Password" />
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <input type="password" name="password_confirmation" placeholder="Confirm Password" />
            {{-- @if ($errors->has('password_confirmation'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif --}}
            <input type="button" name="next" class="next action-button" value="Next" />
            <a id="forgot" href="signin" style="text-decoration:none;">
                <h3 class="fs-subtitle">Already Have an Account?</h3>
            </a>
        </fieldset>
        <fieldset>
            <h2 class="fs-title">Personal Details</h2>
            <h3 class="fs-subtitle">We will never sell it</h3>
            <input type="text" name="first_name" placeholder="First Name" />
            @if ($errors->has('first_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
            @endif
            <input type="text" name="last_name" placeholder="Last Name" />
            @if ($errors->has('last_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
            @endif
            <input type="text" name="phone_number" placeholder="Phone" />
            @if ($errors->has('phone_number'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone_number') }}</strong>
            </span>
            @endif
            <textarea name="address" placeholder="Address"></textarea>
            @if ($errors->has('address'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
            @endif
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="next" class="next action-button" value="Register"/>
        </fieldset>
    </form>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
    <script src="js/auth.js"></script>

</body>

</html>
