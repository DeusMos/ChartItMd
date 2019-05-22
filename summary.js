function saveData(){
    let allergies = document.getElementById("allergy").value;
    let problems = document.getElementById("problem").value;
    let medication = document.getElementById("medication").value;
    let surgery = document.getElementById("surgical").value;
    let activity = document.getElementById("activity").value;
    let orders = document.getElementById("orders").value;
    alert("Data saved\n" + allergies);
}

function loadLatest(){
    alert("data successfully loaded");
    //Get the latest entry of each field
}

document.getElementById("save").addEventListener("click", saveData);