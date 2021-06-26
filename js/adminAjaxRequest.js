// ajax call for admin  login varification
function checkAdminLogin() {
    var adminLogemail = $("#adminLogemail").val();
    var adminLogpass = $("#adminLogpass").val();


    $.ajax({
        url: 'Admin/admin.php',
        method: "POST",
        data: {
            adminLogemail: adminLogemail,
            adminLogpass: adminLogpass
        },

        success: function (data) {
            console.log(data);
            if (data == 'success') {
                console.log('ok');
                $("#statusAdminLogMsg").html("<div class = 'spinner-border text-success' role = 'status'></div>");

                setTimeout(() => {
                    window.location.href = "/Elearning/Admin/adminDashboard.php";
                }, 1000);
            }
            else {
                console.log('something...')
            }

        },
    });
}





// **********insert Course***********

$('#courseSubmitBtn').click(function (e) {
    e.preventDefault();
    var course_name = $("#course_name").val();
    var course_desc = $("#course_desc").val();
    var course_author = $("#course_author").val();
    var course_duration = $("#course_duration").val();
    var course_price = $("#course_price").val();
    var course_org_price = $("#course_org_price").val();
    var enroll_duration = $("#enroll_duration").val();
    var total_seat = $("#total_seat").val();

    $.ajax({
        url: "insertCourse.php",
        method: "POST",
        data: {

            course_name: course_name,
            course_desc: course_desc,
            course_author: course_author,
            course_duration: course_duration,
            course_price: course_price,
            course_org_price: course_org_price,
            enroll_duration: enroll_duration,
            total_seat: total_seat
        },
        success: function (data) {
            console.log(data);
            $('#addCourseForm')[0].reset();

            if (data = 'Inserted') {
                $('#insertSuccess').html("<span class= 'alert alert-success'>Course Added</span>");
            }
            else {
                $('#insertSuccess').html("<span class= 'alert alert-success'>Unable to insert Data</span>");
            }
        }

    });

});



//*******************update course info**************** */
$('#reqUpdate').click(function (e) {
    e.preventDefault();


});