var category_select = document.getElementById("category_select");
var bnum_select = document.getElementById("bnum_select");
window.addEventListener("load", function() {
    category_select.addEventListener("change", ChangeCategorySelectColor);
    bnum_select.addEventListener("change", ChangeBnumSelectColor);
}) 

function ChangeCategorySelectColor(){
    category_select.style.color = "black";
}

function ChangeBnumSelectColor(){
    bnum_select.style.color = "black";
}

$('#datepicker').datepicker();