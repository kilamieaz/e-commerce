<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Please SignUp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="/css/auth.css">
</head>

<body>

  <!-- multistep form -->
<form id="msform">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset class="fieldset1">
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" name="email" placeholder="Email" required/>
    <input id="password" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>
    <input id="password_two" name="password_two" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Verify Password" required>
    <input type="submit" id="submitBtn" name="next" class="next action-button" value="Next" />
    <a id="forgot" href="signin" style="text-decoration:none;">
                <h3 class="fs-subtitle">Already Have an Account?</h3>
            </a>
    <script>


    </script>
  </fieldset>
  <fieldset class="fieldset3">
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input class="textInput" type="text" name="fname" placeholder="First Name" required/>
    <input class="textInput" type="text" name="lname" placeholder="Last Name" required/>
    <input class="textInput" type="text" name="phone" placeholder="Phone" required/>
    <textarea class="textInput" name="address" placeholder="Address"></textarea>
    <input type="submit"  name="previous" class="previous action-button" value="Previous" />
    <input type="submit" id="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>
</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>



    <script  src="js/auth.js"></script>




</body>

</html>
