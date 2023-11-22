var event_post = document.getElementById('event_post');
var show_event_post = document.getElementById('show_event_post');
window.addEventListener("load", function() {
    event_post.addEventListener("click" , ShowEventPost)
}) 

function ShowEventPost(){
    event_post.disabled = true;
    show_event_post.hidden = false;
    console.log("a");
}