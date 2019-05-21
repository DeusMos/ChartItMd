function attemptLogin(){
    let input = {
        username: document.getElementById("userLog").value,
        password: document.getElementById("passLog").value
    };

    sessionStorage.setItem("UserName", document.getElementById("userLog").value);
    sessionStorage.setItem("PassWord", document.getElementById("passLog").value);
    window.location.href = "confirm.html";
}
document.getElementById("tryLogin").addEventListener("click", attemptLogin);

//source cited
//https://developer.mozilla.org/en-US/docs/Web/API/KeyboardEvent

//The document adds an event listener that is key down and uses an event that gets the event key, checks what key has been pressed,
//then either tries to login or returns to the index page.
document.addEventListener('keydown', (event) => {
    const inputKey = event.key;

    if(inputKey === 'Enter'){
        attemptLogin();
    }
    else if(inputKey === 'Escape'){
        window.location.href = "index.html";
    }
})