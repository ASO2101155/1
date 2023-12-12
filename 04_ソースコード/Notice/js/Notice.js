function selectType(TypeName) {
    // ユーザーが選択したカテゴリー
    const selectedType = TypeName;

    // 各投稿をループして表示・非表示を切り替える
    document.querySelectorAll('.notice_area').forEach(box => {
    const type = box.getAttribute('data-type');
    if (selectedType === 'all' || type === selectedType) {
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
