
function registrationtable(){
    // alert ("adding");

    let student_id = $("#txt_student_id").val();
    let course = $("#txt_course").val();
    let school_year = $("#txt_school_year").val();
    let semester = $("#txt_semester").val();
    let year_level = $("#txt_year_level").val();
    let section = $("#txt_section").val();
   


    $.post("registration2.php",{
        student_id:student_id,
        course:course,
        school_year:school_year,
        semester:semester,
        year_level:year_level,
        section:section,
       

    },function(data){
        let response=JSON.parse(data);

        if(response.status=="ok"){
            window.location.href="registrationtable.php";
        }else{
            alert("issues");
        
        }
    })
}