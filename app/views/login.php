<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/styleIndex.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <title>Dress</title>
</head>

<body>
  <div class="row" style="height:100vh;align-items:center;">
    <div class="col-md-6 mx-auto p-0">
      <div class="card">
        <div class="login-box">
          <div class="login-snip">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up" style="display: none;"><label for="tab-2" class="tab" style="display: none;">Sign Up</label>
            <div class="login-space">
                <form class="login" action="<?php echo URLROOT; ?>/users/login" method="POST">
                  <div class="group">
                    <label for="phoneNumber" class="label">Phone Number</label>
                    <input id="phoneNumber" type="text" class="input" name="phoneNumber" placeholder="Enter your Phone Number">
                    <span class="invalidFeedback">
                      <?php echo $data['phoneNumberError']; ?>
                    </span>
                  </div>
                  <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" name="password" data-type="password" placeholder="Enter your password">
                    <span class="invalidFeedback">
                      <?php echo $data['passwordError']; ?>
                    </span>
                  </div>
                  <div class="group">
                    <input type="submit" class="button" value="Sign In">
                  </div>
                  <div class="hr"></div>
                  <!-- <div class="foot"> <a href="#">Forgot Password?</a> </div> -->
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>