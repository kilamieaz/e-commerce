<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
    <title>Please SignIn</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>
<body>
    <form id="msform">
       <fieldset>
            <h2 class="fs-title">Sign In</h2>
            <h3 class="fs-subtitle"> </h3>
            <input type="text" name="email" placeholder="Email" />
            <input type="password" name="pass" placeholder="Password" />
            <input type="button" name="next" class="next action-button" value="Sign In" />
            <a href="forgot-pass" style="text-decoration:none;">
                <h3 class="fs-subtitle">Frogot your password?</h3>
            </a>
            <a href="signup" style="text-decoration:none;">
                <h3 class="fs-subtitle">Didn't Have Account?</h3>
            </a>
        </fieldset>
    </form>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script  src="js/auth.js"></script>
</body>
</html>
