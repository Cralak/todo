document.getElementById("datepicker").setAttribute('min', new Date().toISOString().split("T")[0]);

function showNewTask(){
    document.getElementById("temp-task").style.display = "block";
    document.getElementById("newtask-add").style.opacity = "0%";
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
    document.getElementById("newtask-add").style.opacity = "100%";
}

function getTimeZone(){
    return(Intl.DateTimeFormat().resolvedOptions().timeZone);
}

function deleteTask(id) {
    window.location.href = "deletetask.php?id=" + id;
}

function dropdown() {
    document.getElementById("sort-dropdown").classList.toggle("show");
}


var text = document.getElementById("searchbar");

var alltasks = $('#alltasks > div');

function search() {
    alltasks.each(function(){
        this.classList.add("hide");
        if(this.children[0].innerText.toUpperCase().indexOf(text.value.toUpperCase()) > -1){
            this.classList.remove("hide");
        }
    });
    return false;
}