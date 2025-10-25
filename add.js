
function addStudent(){
    
    let firstname = $("#txt_firstname").val();
    let middlename = $("#txt_middlename").val();
    let lastname = $("#txt_lastname").val();
    let gender = $("#txt_gender").val();
    let email = $("#txt_email").val();
    let phone_number = $("#txt_phone_number").val();
    let statuss = $("#txt_statuss").val();
    let birthday = $("#txt_birthday").val();


    $.post("addstudent.php",{
        firstname:firstname,
        middlename:middlename,
        lastname:lastname,
        gender:gender,
        email:email,
        phone_number:phone_number,
        statuss:statuss,
        birthday:birthday,

    },function(data){
        let response=JSON.parse(data);
         alert ("adding");

        if(response.status=="ok"){
            window.location.href="table.php";
        }else{
            alert("Have an issues");
        
        }
    })

}
