<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sign in page for admin dashboard">
    <meta name="author" content="Mihail Tudos">
    <title>Asmin dashboard sign in</title>
    <!-- Bootstrap core CSS -->
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
	<!-- jQuery latest version CDN connection -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- popper js latest version CDN connection -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<!-- bootstrap minified latest version CDN connection -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- fontawesome (icons) latest version CDN connection -->
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<!-- local CSS file -->
  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/signIn.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="../includes/sign_in.php" method="POST">
  <img class="mb-4 img-thumbnail" src="../img/admin.png" alt="admin image" >
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" name="_user_email_" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" name="_user_password_" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">
    <a class="btn btn-lg btn-primary btn-block" href="../index.php"><i class="fas fa-arrow-alt-circle-left"></i> Back to LondonTours</a>
  </p>
</form>
</body>
</html>
