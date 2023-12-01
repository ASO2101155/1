var moji = document.getElementById('moji');
var pname = location.pathname;
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

let switch1 = document.getElementById('switch1');
switch1.addEventListener('change', (e) => {
    console.log(e.target.checked);
    if(e.target.checked){
        OneSignal.User.PushSubscription.optIn();
    }else{
        OneSignal.User.PushSubscription.optOut();
    }
})