function eventToggleVisibility(id) {
    var element = document.getElementById(id);
    var forum = document.getElementById('forum');
    if (element.style.display === "none") {
        element.style.display = "block";
        forum.style.display = "none";
    }else{
	    element.style.display = "block";
        forum.style.display = "none";
    }
}

function forumToggleVisibility(id) {
    var element = document.getElementById(id);
    var event = document.getElementById('event');
    if (element.style.display === "none") {
        element.style.display = "block";
        event.style.display = "none";
    }else{
        element.style.display = "block";
        event.style.display = "none";
    }
}