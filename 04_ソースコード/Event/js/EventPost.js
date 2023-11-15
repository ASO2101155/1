var category_select = document.getElementById("category_select");
var bnum_select = document.getElementById("bnum_select");
var held_datetime = document.getElementById('held_datetime');
var end_datetime = document.getElementById('end_datetime');
window.addEventListener("load", function() {
    category_select.addEventListener("change", ChangeCategorySelectColor);
    bnum_select.addEventListener("change", ChangeBnumSelectColor);
    held_datetime.addEventListener("change", EnabledEndTime);
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