var show_event_more_reply = document.querySelectorAll('.show_event_more_reply');
var event_more_reply_button = document.querySelectorAll('.event_more_reply_button');
var event_more_reply_input_area = document.querySelectorAll('.event_more_reply_input_area');
var bookmark = document.getElementById('bookmark');
window.addEventListener("load", function() {
    show_event_more_reply.forEach(function(target){
        target.addEventListener('click', toggle_event_more_reply);
    });
	event_more_reply_button.forEach(function(target){
        target.addEventListener('click', event_more_reply);
    });
	bookmark.addEventListener('click', BookMarkUpdate);
}) 

// スライドコンテンツを後ほど操作するための配列 (グローバル変数)
var flickitySyncer = [];

// ページ内の[.flickity-syncer]のエレメントを取得する
var elms = document.getElementsByClassName( "flickity-syncer" ) ;

// [elms]全てに、ループ処理でFlickityを適用する
for( var i=0,l=elms.length; l>i; i++ )
{
	flickitySyncer[i] = new Flickity( elms[i] , {contain: true} ) ;
}

function toggle_event_more_reply(e){
	cTarget = e.currentTarget;
	if(cTarget.innerHTML == "返信を閉じる"){
		cTarget.parentNode.parentNode.children[3].hidden = true;
		cTarget.innerHTML = cTarget.parentNode.children[2].value+"件の返信を表示する";
	}else{
		cTarget.parentNode.parentNode.children[3].hidden = false;
		cTarget.innerHTML = "返信を閉じる";
	}
}

function event_more_reply(e){
	cTarget = e.currentTarget;
	parentTarget = cTarget;
    var i = 0;
	while(parentTarget.className != "event_reply_right parent_event_reply_right") {
		parentTarget = parentTarget.parentNode;
        i++;
	}
    // 枠内の返信に対する返信だったら
    if(i == 5){
        console.log(cTarget.parentNode.parentNode.children[0].innerHTML);
        console.log();
        parentTarget.children[4].children[0].children[0].value = '@'+cTarget.parentNode.parentNode.children[0].innerHTML+' ';
    }
	parentTarget.children[4].hidden = false;
	parentTarget.children[4].scrollIntoView({
		behavior: 'smooth',
		block: "end",
		inline: "nearest"
	});
}

// 返信入力閉じる
document.addEventListener('click', (e) => {
	if(!e.target.closest('.event_more_reply_input_text') 
		&& !e.target.closest('.event_more_reply_send_button') 
		&& !e.target.closest('.event_more_reply_button')){
		event_more_reply_input_area.forEach(function(target){
			if(target.hidden == false){
				target.hidden = true;
			}
		});
	}
})

function BookMarkUpdate(e) {
    cTarget = e.currentTarget;
    cTarget.disabled = true;
    e.preventDefault()
    console.log(cTarget.children[0].classList.contains('bi-star'));
    event_id = cTarget.parentNode.children[2].value;
    calendar_id = cTarget.parentNode.children[3].value;
    // console.log(calendar_id);
    // console.log(!calendar_id);
    // 追加か削除か
    if(cTarget.children[0].classList.contains('bi-star')){
        // InsertかUpdateか
        // calendar_idがnullかどうか
        if(!calendar_id){
            data = {
                user_id: user_id,
                event_id: event_id
            }
            fetch('../Calendar/php/CalendarInsert.php', {
                method: "POST",
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
            .then((response) => {
                if(!response.ok) {
                    throw new Error(`HTTP error: ${response.status}`);
                }   
                return response.json()
            })
            .then(res => {
                // console.log(res);
                cTarget.children[0].className = 'bi bi-star-fill';
                cTarget.parentNode.children[2].innerHTML = res;
                cTarget.disabled = false;
            })
            .catch(error => {
                console.log(error); // エラー表示
            });
        }else{
            data = {
                calendar_id: calendar_id,
                flg: 1
            }
            fetch('../Calendar/php/CalendarUpdate.php', {
                method: "POST",
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
            .then((response) => {
                if(!response.ok) {
                    throw new Error(`HTTP error: ${response.status}`);
                }   
                return response.json()
            })
            .then(res => {
                // console.log(res);
                cTarget.children[0].className = 'bi bi-star-fill';
                cTarget.disabled = false;
            })
            .catch(error => {
                console.log(error); // エラー表示
            });
        }
    }else {
        data = {
            calendar_id: calendar_id,
            flg: 0
        }
        fetch('../Calendar/php/CalendarUpdate.php', {
            method: "POST",
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then((response) => {
            if(!response.ok) {
                throw new Error(`HTTP error: ${response.status}`);
            }   
            return response.json()
        })
        .then(res => {
            // console.log(res);
            cTarget.children[0].className = 'bi bi-star';
            cTarget.disabled = false;
        })
        .catch(error => {
            console.log(error); // エラー表示
        });
    }
}