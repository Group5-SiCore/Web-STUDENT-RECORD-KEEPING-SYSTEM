function updateStudent() {
    let student_id = $("#student_id").val();
    let firstname = $("txtfirstname").val();
    let middlename = $("txtmiddlename").val();
    let lastname = $("txtlastname").val();
    let gender = $("txtgender").val();
    let email = $("txtemail").val();
    let phone_number = $("txtphone_number").val();
    let statuss = $("txtstatuss").val();
    let birthday = $("txtbirthdayr").val();
    

    // AJAX post request to update student data
    $.post("editstudent.php", {
        student_id: student_id,
        firstname: firstname,
        middlename: middlename,
        lastname: lastname,
        gender: gender,
        email: email,
        phone_number: phone_number,
        statuss: statuss,
        birthday: birthday,
      
    }, function(data) {
        let response = JSON.parse(data);
        if (response.status == "ok") {
            window.location.href = "table.php";
        } else {
            alert("Issues updating data");
        }
    });
}
