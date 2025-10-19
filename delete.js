document.querySelector("#student_id").addEventListener("click", (e)=>{
target = e.target;
if(target.classList.contains("delete")){
    target.parentElement.parentElement.remove();
    showAlert("Student data delete","danger");
}
});