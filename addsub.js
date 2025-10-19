
function subtable(){
    // alert ("adding");

    let course_id = $("#txt_course_id").val();
    let subjectname = $("#txt_subjectname").val();
    let unit = $("#txt_unit").val();
   


    $.post("subtable2.php",{
        course_id:course_id,
        subjectname:subjectname,
        unit:unit,
       

    },function(data){
        let response=JSON.parse(data);

        if(response.status=="ok"){
            window.location.href="subtable.php";
        }else{
            alert("issues");
        
        }
    })
}