$(document).ready(function(){
    $('#input_code').val("");
    $("#btn_submit").click(function(){
        inputed_val = $('#input_code').val();
        if(inputed_val == ""){
            swal("Please input code!!!");
            return;
        }
        $.post("db/check_code.php", {data: inputed_val}, function(result){
                var result = JSON.parse(result);
                console.log(result);
                if(result['identify_info'] == "doesn't exist code"){
                    //alert("Doesn't exist your code!!!\nPlease contact to support@coreology.com");
                    swal("Sorry,that code doesn't work\nPlease contact\nsupport@coreology.com\nto request a new one");                
                }
                else {
                    sessionStorage.setItem("identify_info", JSON.stringify(result['identify_info']));
                    location.href = "/step_1.php"
                }
          });
    });
    $('#btn_Index_LogIn').click(function(){
        location.href = "/LogIn.php"
    });
    $('#btn_LogIn').click(function(){
        inputed_user = $('#input_user').val();
        inputed_password = $('#input_password').val();
        console.log("inputed user::: " + inputed_user);
        if(inputed_user == ""){
            swal("Please input User Name!!!");
            return;
        }
        console.log("inputed password::: " + inputed_password);
        if(inputed_password == ""){
            swal("Please input Password!!!");
            return;
        }
        var data = {'user':inputed_user, 'password':inputed_password};
        $.post("db/check_user.php", data, function(result){
                var result = JSON.parse(result);
                console.log(result);
                if(result['status'] == 'Log In Success'){
                    location.href = "/admin.php"
                }
                else if(result['status'] == "User does not exist"){
                    swal("User Name does not exist!!!");
                }
                else if(result['status'] == "Wrong Password"){
                    swal("Password Failed");
                }
          });
    });
});

