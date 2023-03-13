<?php require_once "functions.php";?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Assignment </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body{
      background: #273c75;
    }
    .container-width{
      width: 50%;
      margin: 0 auto;
    }
  </style>

</head>

<body class="text-light">
    <div class="container container-width">
        <h2 class="text-center pt-5">Assignment of Module 6</h2>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"><samp><?php echo $name_err;?></samp>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"><samp><?php echo $email_err;?></samp>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"><samp><?php echo $password_err;?></samp>
            </div>
            <div class="form-group">
                <label for="profile-picture">Profile Picture:</label>
                <input type="file" class="form-control-file" id="profile-picture" name="profile_picture"><samp><?php echo $profile_picture_err;?></samp>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
