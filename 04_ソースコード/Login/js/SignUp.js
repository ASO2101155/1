function validateForm() {
    var mail = document.forms["myForm"]["mail"].value;
    var password = document.forms["myForm"]["password"].value;
    var pattern = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/;
    var errorMessage = document.getElementById("errMsg");

    errorMessage.innerHTML = ""; // エラーメッセージをクリア

    if (mail === "" || password === "") {
        errorMessage.innerHTML += "メールとパスワードは必須項目です<br>";
    } else {
        if(!mail.match(pattern)){
        errorMessage.innerHTML += "メールアドレスの形式で入力してください<br>";
        }
        if(password.length<8 || 16<password.length){
            errorMessage.innerHTML += "パスワードは８文字以上１６文字以下で入力してください<br>";
        }
    }
    
    
    if(errorMessage.innerHTML === ""){
        return true;
    }else{
        return false;
    }
}

function validateForm2() {
    var user_name = document.forms["myForm"]["user_name"].value;
    var major = document.forms["myForm"]["major"].value;
    var school_code = document.forms["myForm"]["school_code"].value;
    var gender = document.forms["myForm"]["gender"].value;
    var school_year = document.forms["myForm"]["school_year"].value;
    var errorMessage = document.getElementById("errMsg");

    errorMessage.innerHTML = ""; // エラーメッセージをクリア

    if (user_name === "") {
        errorMessage.innerHTML += "ユーザー名が未入力です<br>";
    }else if(user_name.length>32 ){
        errorMessage.innerHTML += "ユーザー名は32文字以内で入力してください<br>";
    }
    if(major.length>16){
        errorMessage.innerHTML += "専攻は16文字以内で入力してください<br>";
    }
    if(school_code === "null"){
        errorMessage.innerHTML += "学校を選択してください<br>";
    }
    if(gender === "null"){
        errorMessage.innerHTML += "性別を選択してください<br>";
    }
    if(school_year === "null"){
        errorMessage.innerHTML += "学年を選択してください<br>";
    }
    if(errorMessage.innerHTML === ""){
        return true;
    }else{
        return false;
    }
}