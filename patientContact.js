'use strict';
//require('dotenv')
 //   .config();
//const axios = require('axios');
// Config Axios defaults.
//axios.defaults.baseURL = process.env.AXIOS_BASE_URL;
// Setup JQuery
//window.$ = window.jQuery = require('jquery');
//const Patient = require('./Model/Patient.js');
//getPatientAsJson();

document.getElementById("saveAll").style.display = "none";


document.getElementById("editAll").addEventListener("click", edit);
//document.getElementById("saveAll").addEventListener("click", saveAll);

let prevPhone = document.getElementById("phone").value;
let prevEmail = document.getElementById("email").value;
let prevAddress1 = document.getElementById("address1").value;
let prevAddress2 = document.getElementById("address2").value;

function edit(){
    let phone = document.getElementById("phone");
    let email = document.getElementById("email");
    let address1 = document.getElementById("address1");
    let address2 = document.getElementById("address2");
    let button = document.getElementById("editAll");

    if(phone.disabled){
        phone.removeAttribute("disabled");
        email.removeAttribute("disabled");
        address1.removeAttribute("disabled");
        address2.removeAttribute("disabled");
        button.innerHTML = "Cancel";
    }
    else{
        phone.value = prevPhone;
        email.value = prevEmail;
        address1.value = prevAddress1;
        address2.value = prevAddress2;
        phone.setAttribute("disabled", "disabled");
        email.setAttribute("disabled", "disabled");
        address1.setAttribute("disabled", "disabled");
        address2.setAttribute("disabled", "disabled");
        button.innerHTML = "Edit";
    }

    toggleSave();
}

function toggleSave(){
    let saveAll = document.getElementById("saveAll");

    if(saveAll.style.display === "none"){
        saveAll.style.display = "block";
    }
    else{
        saveAll.style.display = "none";
    }
}

function saveAll(){
    prevPhone = document.getElementById("phone").value;
    prevEmail = document.getElementById("email").value;
    prevAddress1 = document.getElementById("address1").value;
    prevAddress2 = document.getElementById("address2").value;
    edit();
}

function getPatientAsJson() {
    axios.get('/patient/2Y9ovLbO93RUekOOu75TV5')
        .then(response => {
            if (response['error']) {
                console.log(response['error']);
            } else {
                $(document)
                    .ready(() => {
                        (new Patient(response.data)).displayDetails();
                    });
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}