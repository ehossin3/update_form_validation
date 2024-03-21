$(document).ready(function(){

    //Check password and confirm password======================================================>


    //Check password field Start=================>
    let pass            = $("#password");
    let confirmPass     = $("#confirm_pass");
    let BtnEyePass      = $("#eye-btn");
        BtnEyePass.css('cursor', 'pointer');
    let BtnEyeConfirmPass = $("#confrm-eye-btn");
        BtnEyeConfirmPass.css('cursor', 'pointer');

    BtnEyePass.on('click', function(){

    if(pass.attr('type') === 'password'){
            $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            pass.attr('type', 'text');
        }
        else {
            $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            pass.attr('type', 'password');
        }
    });
    //Check password field End=================> 


    //Check confirm password field start=================>
    BtnEyeConfirmPass.on('click', function(){    
        if(confirmPass.attr('type') === 'password'){
             $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            confirmPass.attr('type', 'text');
        }
        else {
            $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            confirmPass.attr('type', 'password');
        }
    })

    //Check confirm password field End=================>


    //Form validation start=============================================================================>

    $(document).on('submit', '#signup', function(){
        let IsFormValid = true;
        //username validation start==========================>
        let UserName    = $("#username").val().trim();
        let nameErrDiv  = $("#nameError");

        if(UserName === ""){
            nameErrDiv.html('Username field is required');
            IsFormValid = false;
        }
        else {
            nameErrDiv.text('');
        }
        //username validation End==========================>


        //Email validation start==========================>
        let userEmail   = $("#user_email").val().trim();
        let emailErrDiv = $("#emailError");
        if( userEmail === ""){
            emailErrDiv.text("Email field is required");
            IsFormValid = false;
        }
        else {
            emailErrDiv.text("");
        }
        //Email validation End==========================>


        //Phone no validation start==========================>
        let userPhone   = $("#phone").val().trim();
        let BDregExp    = /^(?:\+?88)?01[3-9]\d{8}$/;
        let phoneErrDiv = $("#phoneError");

        if(userPhone === ""){
            phoneErrDiv.text('Phone no field is required');
            IsFormValid = false;
        }
        else if(!BDregExp.test(userPhone)){
            phoneErrDiv.text('Invalid phone no(Please use only Bangladeshi valid phone no)');
            IsFormValid = false;
        }
        else {
            phoneErrDiv.text("");
        }
        //Phone no validation End==========================>


        //check weburl input start=====================>
        let webUrl = $("#web_url").val().trim();
        let urlRegex = /^(ftp|http|https):\/\/[^ "]+$/;
        let urlError    = $("#urlError");
        if(webUrl === ""){
            urlError.text("Url field is require");
            isValid = false;
        }
        else if(!urlRegex.test(webUrl)){
            urlError.html("Invalid Url(Make sure include( <b>https://</b> ))");
            IsFormValid = false;
        }
        else{
            urlError.text("");
        }
        //check weburl input End=====================>


        //Password and confirm password validation Start==========================>
        //Password field validation start==============>
        let psw             = $("#password").val().trim();
        let passRegEx       = /^(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?])(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
        let confirmPass     = $("#confirm_pass").val().trim();
        let passError       = $("#passError");
        let confrmPassError = $("#confrmPassError");

        if(psw === ""){
            passError.text("Password field is required");
            IsFormValid = false;
        }
        else if(!passRegEx.test(psw)){
            passError.text("Password must include at least one symbol, one lowercase letter, one uppercase letter, and be at least 6 characters long");
            IsFormValid = false;
        }
        else {
            passError.text("");
        }
        //Password field validation End==============>


        //Confirm Password field validation start==============>
        if(confirmPass === ""){
            confrmPassError.text("This field is required");
            IsFormValid = false;
        }
        else if(confirmPass !== psw){
            confrmPassError.text("password don't match");
            IsFormValid = false;
        }
        else {
            confrmPassError.text("");
        }
        //Confirm Password field validation End==============>
        //Password and confirm password validation End==========================>



        //checkbox fields validation start============
        let Agree    = $("#agree");
        let ErrTrm   = $("#termError");

        if(!(Agree).is(":checked")){

            ErrTrm.text("Please agree to the terms and conditions");
            IsFormValid = false;
        }
        else {
            ErrTrm.text("");
        }
        //checkbox fields validation End============

        

        if(!IsFormValid){
            event.preventDefault();
        }


    });
    //Form validation End=============================================================================>



    //photo upload preview Start=========================>

    // File input change event handler
    // Maximum allowed image size in bytes (1 MB = 1048576 bytes)
    // Set up initial image preview
    $("#photoPreview").attr("src", "./Img/user-preview.png");

    let maxSize = 1048576;

    // Add change event listener to file input
    $("#profile_img").change(function() {
        // Your existing code for handling file selection
        let file = this.files[0];
        if (file) {
            if(file.size > maxSize){
                alert("Please select an image file smaller than 1 MB.");
                $(this).val("");
                $("#cancelButton").hide();
                return;
            }
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#photoPreview").attr("src", e.target.result);
                $("#cancelButton").show();
            };
            reader.readAsDataURL(file);
        } else {
            $("#cancelButton").hide();
        }
    });

    // Cancel button click event handler
    $("#cancelButton").click(function(event) {
        event.preventDefault();
        $("#profile_img").val("");
        $("#cancelButton").hide();
        // Restore default image
        $("#photoPreview").attr("src", "./Img/user-preview.png");
    });
    //photo upload preview End=========================>






});