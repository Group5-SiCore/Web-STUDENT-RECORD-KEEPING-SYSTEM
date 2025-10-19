
function teachtable(){
    // alert ("adding");

    let firstname = $("#txt_firstname").val();
    let middlename = $("#txt_middlename").val();
    let lastname = $("#txt_lastname").val();
    let age = $("#txt_ager").val();
    let gender = $("#txt_gender").val();
    let birthday = $("#txt_birthday").val();


    $.post("teachtable2.php",{
        firstname:firstname,
        middlename:middlename,
        lastname:lastname,
        age:age,
        gender:gender,
        birthday:birthday,

    },function(data){
        let response=JSON.parse(data);

        if(response.status=="ok"){
            window.location.href="teachtable.php";
        }else{
            alert("issues");
        
        }
    })
}