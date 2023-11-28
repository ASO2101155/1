var moji = document.getElementById('moji');
var pname = location.pathname;
// console.log(pname);
// var len = a.lastIndexOf("/");
// var alen = a.substr(13).length;
pname = pname.substr(13);
pname = pname.substr(0,pname.indexOf('/'));
console.log(pname);
switch(pname){
    case "Notice":
        moji.innerHTML = "通知";
        break;
    case "Event":
        moji.innerHTML = "イベント";
        break;
    case "Forum":
        moji.innerHTML = "掲示板";
        break;
    case "Calendar":
        moji.innerHTML = "カレンダー";
        break;
    case "Profile":
        moji.innerHTML = "プロフィール";
        break;
}
// console.log(a.substr(13, alen - len + 1));
// console.log(alen - len + 1);