function futureToggleVisibility(id) {
    var element = document.getElementById(id);
    var past = document.getElementById('past');
    var futurebtn = document.getElementById('futureToggle');
    var pastbtn = document.getElementById('pastToggle');
    if (element.style.display === "none") {
        element.style.display = "block";
        past.style.display = "none";
        futurebtn .style.backgroundColor = "#0b2957";
        pastbtn.style.backgroundColor = "#0E397B";
    }else{
	    element.style.display = "block";
        past.style.display = "none";
        futurebtn .style.backgroundColor = "#0b2957";
        pastbtn.style.backgroundColor = "#0E397B";
    }
}

function pastToggleVisibility(id) {
    var element = document.getElementById(id);
    var future = document.getElementById('calendar_main');
    var pastbtn = document.getElementById('pastToggle');
    var futurebtn = document.getElementById('futureToggle');
    if (element.style.display === "none") {
        element.style.display = "block";
        future.style.display = "none";
        pastbtn.style.backgroundColor = "#0b2957"; 
        futurebtn .style.backgroundColor = "#0E397B";
    }else{
        element.style.display = "block";
        future.style.display = "none";
        pastbtn.style.backgroundColor = "#0b2957";
        futurebtn .style.backgroundColor = "#0E397B";
    }
}