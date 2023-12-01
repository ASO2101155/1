var show_event_more_reply = document.querySelectorAll('.show_event_more_reply');
var event_more_reply_button = document.querySelectorAll('.event_more_reply_button');
var event_more_reply_input_area = document.querySelectorAll('.event_more_reply_input_area');
window.addEventListener("load", function() {
    show_event_more_reply.forEach(function(target){
        target.addEventListener('click', toggle_event_more_reply);
    });
	event_more_reply_button.forEach(function(target){
        target.addEventListener('click', event_more_reply);
    });
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
	while(parentTarget.className != "event_reply_right parent_event_reply_right") {
		parentTarget = parentTarget.parentNode;
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