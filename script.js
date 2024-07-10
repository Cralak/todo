
function showNewTask(){
    document.getElementById("temp-task").style.display = "block";
    document.getElementById("newtask-add").style.display = "none";
}


function showDateTime(){
    var checkbox = document.getElementById("datetimecheckbox");
    if (checkbox.checked){    
        document.getElementById("newtask-datetime-container").style.pointerEvents = "all";
        document.getElementById("newtask-datetime-container").style.opacity = "100%";
    }
    else {
        document.getElementById("newtask-datetime-container").style.pointerEvents = "none";
        document.getElementById("newtask-datetime-container").style.opacity = "20%";
    }    
}

function hideNewTask(){
    document.getElementById("temp-task").style.display = "none";
    document.getElementById("newtask-add").style.display = "block";
}
