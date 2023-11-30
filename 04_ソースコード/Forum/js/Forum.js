function selectCategory(categoryName) {
    // ユーザーが選択したカテゴリー
    const selectedCategory = categoryName;

    // 各投稿をループして表示・非表示を切り替える
    document.querySelectorAll('.forumbox').forEach(box => {
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
