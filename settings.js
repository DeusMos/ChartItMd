function applyChanges(){
    window.confirm("Text color: " + document.getElementById("TextColor").value);
    window.confirm("Background color: " + document.getElementById("BgColor").value);
}

function resetValues(){
    document.getElementById("TextColor").value = "#000000";
    document.getElementById("BgColor").value = "#FFFFFF";
    updatePreview();
}

function cancelChanges(){
    window.location.href = "index.html";
}

function updatePreview(){
    document.getElementById("preview").style.color =
        document.getElementById("TextColor").value;
    document.getElementById("preview").style.backgroundColor =
        document.getElementById("BgColor").value;
}

document.getElementById("ApplyChanges").addEventListener("click", applyChanges);
document.getElementById("RevertChanges").addEventListener("click", resetValues);
document.getElementById("cancel").addEventListener("click", cancelChanges);
document.getElementById("TextColor").addEventListener("change", updatePreview);
document.getElementById("BgColor").addEventListener("change", updatePreview);