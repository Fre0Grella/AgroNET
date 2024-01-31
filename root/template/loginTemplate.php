<!DOCTYPE html>
<html lang="it">
<head>
    <title><?php echo $templateParams["title"]; ?></title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="container-fluid text-center fixed-center">
        <div class="row justify-content-center">
            <div class="col-8">
                <img src="img/AgroNET_logo.png" class="img-fluid" alt="AgroNET Logo"/>
            </div>
        </div>
    </div>
    <form action="php/login.php" method="post" id="loginForm" class="container justify-content-center col-10 offset-1">
        <div class="form-group bg-danger text-white text-center">
            <?php
                if(isset($_SESSION["message"])) {
                    echo $_SESSION["message"];
                    unset($_SESSION["message"]);
                }
            ?>
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required/>
            <i class="bi bi-eye-slash" id="togglePassword"></i>
        </div>
        <button class="btn btn-success btn-block" type="submit">Log in</button>
    </form>

    <div class="container-fluid text-center p-3">
        <label>Don't have an account?</label>
        <a href="register.html">Sign up</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" 
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="js/formPassword.js"></script>
</body>
</html>
