// 入力できる行数の最大値
let MAX_LINE_NUM = 3;
 
// テキストエリアの取得
let textarea = document.getElementById("comment");

// 入力ごとに呼び出されるイベントを設定
textarea.addEventListener("input", function() {

  // 各行を配列の要素に分ける
  let lines = textarea.value.split("\n");

  // 入力行数が制限を超えた場合
  if (lines.length > MAX_LINE_NUM) {

    var result = "";

    for (var i = 0; i < MAX_LINE_NUM; i++) {
      result += lines[i] + "\n";
    }

    textarea.value = result;
  }
}, false);