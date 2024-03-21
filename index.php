<?php 
  if (file_exists("contacts.json")) {
    $contacts = json_decode(file_get_contents("contacts.json"),true); 
  }else {
    $contacts = [];
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
      <a class="navbar-brand" href="#">
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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./add.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main>
    <div class="container pt-4 p-3">
      <div class="row">
      <?php if (count($contacts) == 0) : ?>
        <div class="col-md-4 mx-auto">
          <div class="card card-body text-center">
            <p>No contacts saved yet</p>
            <a href="/contacts-app/add.php">Add one</a>
          </div>
        </div>
      <?php endif?>

      <?php foreach ($contacts as $contact) : ?>
        <div class="col-md-4 mb-3">
          <div class="card text-center">
            <div class="card-body">
              <h3 class="card-tittle text-capitalize"><?= $contact["name"] ?></h3>
              <p class="m-2"><?= $contact["phone_number"] ?></p>
              <a href="#" class="btn btn-secondary mb-2">Edit Contact</a>
              <a href="#" class="btn btn-danger mb-2">Delete Contact</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>

      </div>
    </div>
  </main>

</body>
</html>
