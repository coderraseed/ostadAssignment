
<?php require_once('process.php')?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

    <title>Subscription Form</title>
  </head>
  <body class="bg-success">

    <div class="container">
            <!-- Content here -->
        <form class="row g-3" style="width: 50%; margin: 0 auto;"  method="POST">

            <div class="col-12">
                <label for="name" class="form-label" style="color: #fff;">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Type your name please">
            </div>
            <div class="col-12">
                <label for="email" class="form-label" style="color: #fff;">Email Address:</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Add your email address">
            </div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>


        </form>

        <div class="col-12 " style="color:#fff; width: 50%; margin: 0 auto; border: 1px solid #fff; text-align: center; margin-top: 30px; padding: 9px;">
        <h1>Out Put here</h1>
          <?php 
          if (isset($_POST['submit'])) {
            // Retrieve form data
            $name = $_POST['name'];
            $email = $_POST['email'];
          
            // Create Person object and set properties
            $person = new Person();
            $person->setName($name);
            $person->setEmail($email);
          
            // Display properties
            echo 'Name: ' . $person->getName() . '<br>';
            echo 'Email: ' . $person->getEmail() . '<br>';
          }
          
          
          ?>

        </div>
        
    </div>
        


    






    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>


  </body>
</html>
