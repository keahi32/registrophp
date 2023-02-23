<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
    <!-- Agregamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .centrar{
            text-align:center;
        }
    </style>
    <?php
    include("config.php");
    ?>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="text-center mb-4">Registro de usuarios</h1>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Pon tu email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Pon tu contraseña" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">Registrar</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $password=$password_hash;
    $sql = "INSERT INTO usuarios (email,password)
  VALUES ('$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo '<div class="centrar">Te has registrado correctamente</div>';
        $web=$_SERVER['SERVER_NAME'];
        header( "refresh:2; url=http://$web:8080" ); 
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    
    }

    ?>
<!-- Agregamos los scripts de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"></script>
</body>
</html>