
function resub(){
    // alert ("adding");

    let registration_id = $("#txt_registration_id").val();
    let subject_id = $("#txt_subject_id").val();
    let teacher_id = $("#txt_teacher_id").val();
    let day = $("#txt_day").val();
    let time_start = $("#txt_time_start").val();
    let time_end = $("#txt_time_end").val();
   


    $.post("subtable2.php",{
        registration_id:registration_id,
        subject_id:subject_id,
        teacher_id:teacher_id,
        day:day,
        time_start:time_start,
        time_end:time_end,
       

    },function(data){
        let response=JSON.parse(data);

        if(response.status=="ok"){
            window.location.href="resub.php";
        }else{
            alert("issues");
        
        }
    })
}