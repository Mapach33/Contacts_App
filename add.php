<?php

  require "db.php";

  $error = null;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"]) || empty($_POST["phone_number"])){
      $error = "Please fill all the fields"; 
    }else if (strlen($_POST["phone_number"]) < 9) {
      $error = "Phone must be at least 9 characters";
    } else {
      $statement = $conn->prepare("INSERt into contacts(name , phone_number) VALUES (:name, :phone_number)");
      $statement->bindParam(":name",$_POST["name"]);
      $statement->bindParam(":phone_number",$_POST["phone_number"]);
      $statement->execute();  
      
      header("location: index.php");
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstraps -->
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/darkly/bootstrap.min.css" 
        integrity="sha512-HDszXqSUU0om4Yj5dZOUNmtwXGWDa5ppESlX98yzbBS+z+3HQ8a/7kcdI1dv+jKq+1V5b01eYurE7+yFjw6Rdg==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer" 
    />

    <script 
        defer
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>

    <!-- Static conten -->
    <link rel="stylesheet" href="./static/css/index.css" />

    <title>Contacts App</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php">
        <img class="mr-2" src="./static/img/logo.png"/>
        Contacts App
      </a>
      <button 
        class="navbar-toggler" 
        type="button" data-bs-toggle="collapse" 
        data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" 
        aria-expanded="false" 
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main>
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="cold-md-8">
          <div class="card">
            <div class="card-header">Add New Contact</div>
            <div class="card-body">

              <!-- MESSAGE ERROR  -->
              <?php if ($error != null) : ?>
                <p class="text-danger">
                  <?= $error ?>
                </p>
              <?php endif ?>

              <form method="POST" action="add.php">
                <div class="mb-3 row">
                  <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                  <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>

                  <div class="col-md-6">
                    <input id="phone_number" type="tel" class="form-control" name="phone_number" required autocomplete="phone_number" autofocus>
                  </div>
                </div>

                <div class="mb-3 row">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
