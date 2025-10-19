//Edit Data

document.querySelector("#student_id").addEventListener("click", (e) =>{
    target= e.target;
    if(target.classList.contains("editStudent")){
        selectedRow = target.parentElement.parentElement;
        document.querySelector("#firstname").value = selecTedRow.children[0].textContent;
        document.querySelector("#middlename").value = selecTedRow.children[1].textContent;
        document.querySelector("#lastname").value = selecTedRow.children[2].textContent;
        document.querySelector("#gender").value = selecTedRow.children[3].textContent;
        document.querySelector("#email").value = selecTedRow.children[4].textContent;
        document.querySelector("#phone_number").value = selecTedRow.children[5].textContent;
        document.querySelector("#statuss").value = selecTedRow.children[6].textContent;
        document.querySelector("#birthday").value = selecTedRow.children[7].textContent;
}
})
