<?php
    session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    
    <!--Alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Alertify JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    


</head>
<body>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-5">
                <div class="card">
                        <div class="card-header">
                            <h2 class="h2 text-center fw-bold">Login form for user</h2>
                        </div>
                        <div class="card-body">
                            <div class="text-center text-success py-2" id="successMessage">
                                <?php
                                if(isset($_SESSION['registration'])){
                                    echo $_SESSION['registration'];
                                    unset($_SESSION['registration']);
                                }
                                
                                ?>
                            </div>
                            <form id="login" method="post">
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <label class="label fw-bold" for="username">User Name :</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            <input class=" form-control" type="text" name="username" autocomplete="username" id="username">
                                        </div>
                                        <div id="nameError" class="text text-danger fz-1 ms-1"></div>
                                        
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <label class="label fw-bold" for="password">Password :</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input class=" form-control" type="password" name="password" id="password">
                                            <span class="input-group-text"> <i id="eye-btn" class="fa fa-eye-slash"></i> </span>
                                        </div>
                                        <div id="passError" class="text text-danger fz-1 ms-1"></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                    </div>
                                    <div class="col-8">
                                        <button class="btn btn-success text-uppercase" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <script src="./JS/mains.js"></script>
</body>
</html>