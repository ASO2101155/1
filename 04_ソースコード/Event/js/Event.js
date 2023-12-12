var event_post = document.getElementById('event_post');
var show_event_post = document.getElementById('show_event_post');
var bookmark = document.querySelectorAll('.bookmark');
window.addEventListener("load", function() {
    event_post.addEventListener("click" , ShowEventPost);
    bookmark.forEach(function(target){
        target.addEventListener('click', BookMarkUpdate);
    });
}) 

function ShowEventPost(){
    event_post.disabled = true;
    show_event_post.hidden = false;
    console.log("a");
}

function BookMarkUpdate(e) {
    cTarget = e.currentTarget;
    cTarget.disabled = true;
    e.preventDefault();
    console.log(cTarget.children[0].classList.contains('bi-star'));
    event_id = cTarget.parentNode.parentNode.parentNode.children[1].value;
    calendar_id = cTarget.parentNode.children[2].innerHTML;
    console.log(calendar_id);
    console.log(!calendar_id);
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
                console.log(res);
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
                console.log(res);
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
            console.log(res);
            cTarget.children[0].className = 'bi bi-star';
            cTarget.disabled = false;
        })
        .catch(error => {
            console.log(error); // エラー表示
        });
    }
}

function selectCategory(categoryName) {
    // ユーザーが選択したカテゴリー
    const selectedCategory = categoryName;

    // 各投稿をループして表示・非表示を切り替える
    document.querySelectorAll('.event_area').forEach(box => {
    const category = box.getAttribute('data-category');
    if (selectedCategory === 'all' || category === selectedCategory) {
        box.style.display = 'block'; // 選択したカテゴリーに合致する投稿を表示
    } else {
        box.style.display = 'none'; // それ以外の投稿を非表示
    }
    });
}

function categoryToggle(id) {
    var element = document.getElementById(id);
    var computedStyle = window.getComputedStyle(element);
    if (computedStyle.display === "none") {
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
