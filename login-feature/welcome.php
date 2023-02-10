<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<header>
    <div class="px-3 py-2 text-bg-dark">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="#" class="nav-link text-secondary">
              <i class="bi bi-house-door d-block mx-auto mb-1" style="font-size:1.5rem;"></i>
                Home
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
              <i class="bi bi-speedometer2 d-block mx-auto mb-1" style="font-size:1.5rem;"></i>
                Dashboard
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
              <i class="bi bi-table d-block mx-auto mb-1" style="font-size:1.5rem;"></i>
                Orders
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
              <i class="bi bi-grid d-block mx-auto mb-1" style="font-size:1.5rem;"></i>
                Products
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <i class="bi bi-person-circle d-block mx-auto mb-1" style="font-size:1.5rem;"></i>
                Customers
              </a>
            </li>
            <div class="dropdown">
            <img src="../public/uploads/profile/AvatarMaker-03.png" class="rounded-circle dropdown-toggle ms-5 mt-1" data-bs-toggle="dropdown" aria-expanded="false" width="50" height="50" alt="avatar" style="cursor: pointer;">
  <ul class="dropdown-menu dropdown-center">
    <li><a class="dropdown-item" href="#">Mon profil</a></li>
    <li><a class="dropdown-item" href="#">Ajouter un article</a></li>
    <li><a class="dropdown-item" href="#">Voir mes articles</a></li>

    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Ajouter une émission</a></li>
    <li><a class="dropdown-item" href="#">Voir mes émissions</a></li>
  </ul>
</div>
            
          </ul>
        </div>
      </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
      <div class="container d-flex flex-wrap justify-content-center">


        <div class="text-end">

        </div>
      </div>
    </div>
  </header>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>