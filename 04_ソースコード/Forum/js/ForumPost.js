function validateForm() {
    var title = document.forms["myForm"]["title"].value;
    var post_content = document.forms["myForm"]["post_content"].value;
    var for_cate_code = document.forms["myForm"]["for_cate_code"].value;
    var building_num = document.forms["myForm"]["building_num"].value;
    var errorMessage = document.getElementById("errMsg");

    errorMessage.innerHTML = ""; // エラーメッセージをクリア

    if (title === "") {
        errorMessage.innerHTML += "タイトルが未入力です<br>";
    }else if(title.length>32 ){
        errorMessage.innerHTML += "タイトルは32文字以内で入力してください<br>";
    }
    if(post_content === ""){
        errorMessage.innerHTML += "投稿内容が未入力です<br>";
    }else if(post_content.length>128){
        errorMessage.innerHTML += "投稿内容は128文字以内で入力してください<br>";
    }
    if(for_cate_code === "null"){
        errorMessage.innerHTML += "カテゴリーを選択してください<br>";
    }
    if(errorMessage.innerHTML === ""){
        return true;
    }else{
        return false;
    }
}