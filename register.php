<?php include('server.php');

if (isset($_SESSION['username'])) {
  header('location: admin_article.php');
}
?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="loginstyle.css">
  <title>Document</title>

  <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</head>
<body>
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4">Register</h3>
                <form method="post" action="register.php">
				<?php include('errors.php'); ?>
                  <div class="form-label-group">
                    <input type="text" id="inputUsername" name="username" value="<?php echo $username; ?>"  class="form-control" placeholder="Username" required autofocus>
                    <label for="inputUsername">Username</label>
                  </div>

                  <div class="form-label-group">
                    <input type="email" id="inputEmail" name="email" value="<?php echo $email; ?>"  class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputEmail">Email address</label>
                  </div>
  
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" name="password_1" class="form-control" placeholder="Password" required>
                    <label for="inputPassword">Password</label>
                  </div>

                  <div class="form-label-group">
                    <input type="password" id="inputRePassword" name="password_2" class="form-control" placeholder="Password" required>
                    <label for="inputRePassword">Re-password</label>
                  </div>
  
                  <!-- <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember password</label>
                  </div> -->
                  <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" name="reg_user">Sign up</button>
                  <div class="text-center">
                    <p class="small">Already a member? <a href="login.php">Login</a></p></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>