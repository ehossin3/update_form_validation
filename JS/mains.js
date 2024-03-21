$(document).ready(function(){
    //password field show and hide Start===========================>
    let psw     = $("#password");
    let pswEye  = $("#eye-btn");
    pswEye.css('cursor','pointer');
    pswEye.click(function(){
        if(psw.attr('type') === 'password'){
            $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            psw.attr('type', 'text');
        }
        else {
            $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            psw.attr('type', 'password');
        }
    });
    //password field show and hide End===========================>


    //form validation Start===========================>
    $(document).on('submit', '#login', function(){
        let IsFormValid = true;

        //username validation start==========
        let UserName = $("#username").val().trim();
        let ErrUser = $("#nameError");
        let required = 'This field is required';
        if(UserName === ""){
            ErrUser.text(required);
            IsFormValid = false;
        }
        else{
            ErrUser.text('');
        }
        //username validation End==========

        //password validation start==========
        let pass     = $("#password").val().trim();
        let ErrPass     = $("#passError");
        if(pass === ""){
            ErrPass.text(required);
            IsFormValid = false;
        } 
        else{
            ErrPass.text('');
        }
        //password validation End==========


        let Agree    = $("#agree");
        let ErrTrm   = $("#termError");

        if(!(Agree).is(":checked")){

            ErrTrm.text("Please agree to the terms and conditions");
            IsFormValid = false;
        }
        else {
            ErrTrm.text("");
        }





        if(!IsFormValid){
            event.preventDefault();
        }

    });
    //form validation End===========================>
});