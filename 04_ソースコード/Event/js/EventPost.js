var category_select = document.getElementById("category_select");
var bnum_select = document.getElementById("bnum_select");
var held_datetime = document.getElementById('held_datetime');
var end_datetime = document.getElementById('end_datetime');
var event_image_area = document.getElementById('event_image_area');
var event_image_input = document.getElementsByClassName('event_image_input');
var event_image_delete = document.getElementsByClassName('event_image_delete');
var event_image_clone = document.getElementById('event_image_clone');
window.addEventListener("load", function() {
    category_select.addEventListener("change", ChangeCategorySelectColor);
    bnum_select.addEventListener("change", ChangeBnumSelectColor);
    held_datetime.addEventListener("change", EnabledEndTime);
    event_image_input[0].addEventListener("change", AddEventImage);
    event_image_delete[0].addEventListener("click", DeleteEventImage);
}) 

function ChangeCategorySelectColor(){
    category_select.style.color = "black";
}

function ChangeBnumSelectColor(){
    bnum_select.style.color = "black";
}

function EnabledEndTime(){
    var bi_calendar = document.getElementsByClassName('bi_calendar');
    var bi_calendar_check = document.getElementsByClassName('bi_calendar_check');
    if(held_datetime.value != ""){
        end_datetime.disabled = false;
        bi_calendar.hidden = true;
        bi_calendar_check.hidden = false;
    }else{
        end_datetime.value = "";
        end_datetime.disabled = true;
        bi_calendar_check.hidden = true;
        bi_calendar.hidden = false;
        console.log(bi_calendar_check.hidden);
    }
}

function AddEventImage(e){
    let image_file_element = event_image_clone.cloneNode(true);
    image_file_element.className = "event_image";
    image_file_element.children[0].setAttribute("name", "event_image[]");
    // console.log(e.currentTarget);
    var nowtarget = e.currentTarget;
    if(nowtarget.value != ""){
        let event_image = document.getElementsByClassName('event_image');
        if(event_image[event_image.length - 1].children[0].value != ""){
            if(event_image.length < 4) {
                image_file_element.hidden = false;
                event_image_area.appendChild(image_file_element);
                var event_image_input = document.getElementsByClassName('event_image_input');
                event_image_input[event_image_input.length - 1].addEventListener("change", AddEventImage);
                event_image_delete[event_image_input.length - 1].addEventListener("click", DeleteEventImage);
            }
            nowtarget.nextElementSibling.hidden = false; //event_image_delete
        }
    }else{
        DeleteEventImage(e);
    }
}

function DeleteEventImage(e){
    let event_image = document.getElementsByClassName('event_image');
    let event_image_slice = [].slice.call(event_image);
    let idx = event_image_slice.indexOf(e.currentTarget.parentNode);
    // console.log(idx);
    let len = event_image.length;
    let check = false;
    if(len == 4){
        check = event_image[3].children[0].value != "";
    }
    event_image[idx].remove();
    // console.log(len);
    // console.log(check);
    if(len == 4 && check == true){
        let image_file_element = event_image_clone.cloneNode(true);
        image_file_element.className = "event_image";
        image_file_element.children[0].setAttribute("name", "event_image[]");
        image_file_element.hidden = false;
        event_image_area.appendChild(image_file_element);
        var event_image_input = document.getElementsByClassName('event_image_input');
        event_image_input[event_image_input.length - 1].addEventListener("change", AddEventImage);
        event_image_delete[event_image_input.length - 1].addEventListener("click", DeleteEventImage);
        // console.log("うごいてる");
    }
}

