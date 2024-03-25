<?php
    session_start();
    require_once("config.php");
    if(isset($_POST['username'])) {

        $username       = $_POST['username'];
        $user_email     = $_POST['user_email'];
        $phone          = $_POST['phone'];
        $web_url        = $_POST['web_url'];
        $confirm_pass   = md5($_POST['confirm_pass']);
        $profile_img    = $_FILES['profile_img'];
        $term           = $_POST['term'];

        //username and email exist check
        $select_username_and_email = "SELECT * FROM registration
        WHERE username = '$username' OR email = '$user_email'";

        $select_query_run = $conn->query($select_username_and_email);
        if($select_query_run->num_rows > 0){
            header("location: signup");
            $_SESSION['user_and_email_exit'] = "Username Or Email already use";
            exit;
        }
        else{
              //image
            $image_name = basename($profile_img['name']);
            $tmp_name   = $profile_img['tmp_name'];
            $file_dir   = "profile_photos/";
            $file_dest  = $file_dir . $image_name;

            $insert_query = "INSERT INTO  registration(username, password, email, phone, website, profile_image, term) VALUES(?,?,?,?,?,?,?)";


            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("sssssss", $username,$confirm_pass,$user_email,$phone,$web_url,$file_dest, $term);
            if($stmt->execute()){
                
                move_uploaded_file($tmp_name,$file_dest);
                $_SESSION['registration'] = "Registration successfull";
                header("location: login");
                exit;
            }
            else {
                echo "Error: " . $conn->error;
            }

            
            $stmt->close();
        }
      
        
    }
    else {
        $_SESSION['reg_fail'] = "Please Registration first";
        header("location: singup");
        exit;
    }

    $conn->close();
?>