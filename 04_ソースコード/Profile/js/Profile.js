var e = document.getElementById('editbtn');
e.stopPropagation();

function eventToggleVisibility(id) {
    var element = document.getElementById(id);
    var forum = document.getElementById('forum');
    var eventbtn = document.getElementById('eventToggle');
    var forumbtn = document.getElementById('forumToggle');
    if (element.style.display === "none") {
        element.style.display = "block";
        forum.style.display = "none";
        eventbtn .style.backgroundColor = "#0b2957";
        forumbtn.style.backgroundColor = "#0E397B";
    }else{
	    element.style.display = "block";
        forum.style.display = "none";
        eventbtn .style.backgroundColor = "#0b2957";
        forumbtn.style.backgroundColor = "#0E397B";
    }
}

function forumToggleVisibility(id) {
    var element = document.getElementById(id);
    var event = document.getElementById('event');
    var forumbtn = document.getElementById('forumToggle');
    var eventbtn = document.getElementById('eventToggle');
    if (element.style.display === "none") {
        element.style.display = "block";
        event.style.display = "none";
        forumbtn.style.backgroundColor = "#0b2957"; 
        eventbtn .style.backgroundColor = "#0E397B";
    }else{
        element.style.display = "block";
        event.style.display = "none";
        forumbtn.style.backgroundColor = "#0b2957";
        eventbtn .style.backgroundColor = "#0E397B";
    }
}
