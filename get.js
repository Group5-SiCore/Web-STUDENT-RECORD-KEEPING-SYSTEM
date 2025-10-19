$(document).ready(function (){
    record();
});

function record(){
    $.get("get.php", function displayStudents(data) {

   
        let students = JSON.parse(data);   
        alert(data);     
        let displayData = document.querySelector("#tblDisplayProduct");
        let tableContent = "";

        for (let i = 0; i < students.length; i++) {
            tableContent +=  `<tr>
                <td>${students[i]['student_id']}</td>
                <td>${students[i]['firstname']}</td>
                <td>${students[i]['middlename']}</td>
                <td>${students[i]['lastname']}</td>
                <td>${students[i]['gender']}</td>
                <td>${students[i]['email']}</td>
                <td>${students[i]['phone_number']}</td>
                <td>${students[i]['statuss']}</td>
                <td>${students[i]['birthday']}</td>
            </tr>`;
        }
        displayData.innerHTML = tableContent;
    });
}






