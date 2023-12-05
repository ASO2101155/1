var e = document.getElementById('editbtn');
e.stopPropagation();

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

function prepareForumEdit(forumId) {
    document.getElementById('forum_id_to_edit').value = forumId;
    document.getElementById('forum_edit').submit();
}