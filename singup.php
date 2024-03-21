<?php
    session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    
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
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card">
                        <div class="card-header">
                            <h2 class="h2 text-center fw-bold">Signup form for user</h2>
                        </div>
                        <div class="card-body">
                            <div class="text-center text-danger py-2" id="successMessage">
                                <h3>
                                    <?php
                                        if(isset($_SESSION['reg_fail'])){
                                            echo $_SESSION['reg_fail'];
                                            unset($_SESSION['reg_fail']);
                                        }
                                    
                                    
                                    ?>
                                </h3>
                            </div>
                            <form id="signup" action="./signup_action.php" method="post" enctype="multipart/form-data">
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <label class="label fw-bold" for="username">User Name :</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            <input class=" form-control" type="text" name="username" autocomplete="username" id="username">
                                        </div>
                                        <div id="nameError" class="text text-danger fz-1"></div>
                                        
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <label class="label fw-bold" for="user_email">Email :</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                            <input class=" form-control" type="email" name="user_email" autocomplete="off" id="user_email">
                                        </div>
                                        <div id="emailError" class="text text-danger fz-1"></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <label class="label fw-bold" for="phone">Phone(BD) :</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                            <input class=" form-control" type="text" name="phone" autocomplete="phone" id="phone">
                                        </div>
                                        <div id="phoneError" class="text text-danger fz-1"></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <label class="label fw-bold" for="web_url">Website :</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <span class="input-group-text"> <i class="fa fa-globe"></i> </span>
                                            <input class=" form-control" type="text" name="web_url" id="web_url" autocomplete="web_url">
                                        </div>
                                        <div id="urlError" class="text text-danger fz-1"></div>
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
                                        <div id="passError" class="text text-danger fz-1"></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <label class="label fw-bold" for="confirm_pass">Confirm Password :</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group">
                                            <input class=" form-control" type="password" name="confirm_pass" id="confirm_pass">
                                            <span class="input-group-text"> <i id="confrm-eye-btn" class="fa fa-eye-slash"></i> </span>
                                        </div>
                                        <div id="confrmPassError" class="text text-danger fz-1"></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        <label class="label fw-bold" for="profile_img">Upload Photo :</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="image">
                                                <img class="img-thumbnail mb-2" id="photoPreview" src="./Img/user-preview.png" alt="Photo Preview" style="width: 30%;">
                                                <div>
                                                    <a id="cancelButton" class="btn btn-danger" href="" style="display: none; margin-top: -1.5rem !important;">Cancel</a>
                                                </div>
                                                <input class=" form-control" type="file" name="profile_img" id="profile_img" accept=".jpg, .jpeg .png, .webp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                        
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group my-3">
                                            <input class="form-check-input" type="checkbox" name="term" value="yes" id="agree">
                                            <label for="agree" class="form-check-label ms-2">I agree with terms & conditions</label>
                                        </div>
                                        <div id="termError" class="text text-danger fz-1 ms-1"></div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4">
                                    </div>
                                    <div class="col-8">
                                        <button class="btn btn-success text-uppercase" type="submit">Signup</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>



    <script src="./JS/formValid.js"></script>
</body>
</html>