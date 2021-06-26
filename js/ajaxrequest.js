$('#stuAdd').click(function (e) {
    e.preventDefault();
    console.log("Pressed");


    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();


    // checking form fields on form submission

    if (stuname.trim() == "") {
        //console.log("ds");
        $("#statusMsg1").html("<small style = 'color:red;'>Please enter name</small>");
        $('#stuname').focus();
        return false;
    }
    else if (stuemail.trim() == "") {
        $("#statusMsg2").html('<small style = "color:red;" >Please enter email</small>');
        $('#stuemail').focus();
        return false;
    }
    else if (stuemail.trim() != "" && !mailformat.test(stuemail)) {
        $("#statusMsg2").html('<small style = "color:red;" >Please enter valid email</small>');

    }
    else if (stupass.trim() == "") {
        $("#statusMsg3").html('<small style = "color:red;" >Please enter password</small>');
        $('#stupass').focus();
        return false;
    }
    else {

        $.ajax({
            url: 'Student/addstudent.php',
            method: 'POST',
            // dataType: "json",
            data: {
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass
            },
            success: function (data) {
                console.log(data);
                if (data == false) {
                    $('#successMsg').html("<span class= 'alert alert-success'>Registration Successful!</span>");

                    clearStuRegField();
                }
                else if (data == true) {
                    $('#successMsg').html("<span class = 'alert alert-success'>Email already exists</span>");
                }
                else {
                    $('#successMsg').html("<span class = 'alert alert-success'>All fields need to be filled</span>");
                }
            },
        });
    }


});


//*********Empty all  fields***********
function clearStuRegField() {

    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html("");
    $("#statusMsg2").html("");
    $("#statusMsg3").html("");

}

function clearStuLogField() {

    $("#stuLoginForm").trigger("reset");
    $("#stuLogemail").html("");
    $("#stuLogpass").html("");

}



// ajax call for student login varification
function checkStudentLogin() {
    var stuLogemail = $("#stuLogemail").val();
    var stuLogpass = $("#stuLogpass").val();
    // console.log(stuLogemail);
    $.ajax({
        url: 'Student/login.php',
        method: "POST",
        data: {
            stuLogemail: stuLogemail,
            stuLogpass: stuLogpass
        },

        success: function (data) {
            console.log(data);
            if (data == 1) {
                $("#statusLogMsg").html("<div class = 'spinner-border text-success' role = 'status'></div>");

                setTimeout(() => {
                    window.location.href = "index.php";
                }, 1000);
                clearStuLogField();
            }
            else {

                $("#statusLogMsg").html("<small class = 'alert alert-danger'>Invalid Email id or Password</small>");
                clearStuRegField();
            }
        },
    });
}

