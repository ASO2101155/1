var a = location.pathname;
console.log(a);
var len = a.lastIndexOf("/");
var alen = a.substr(13).length;
console.log(a.substr(13, alen - len + 1));
console.log(alen - len + 1);

// スライドコンテンツを後ほど操作するための配列 (グローバル変数)
var flickitySyncer = [];

// ページ内の[.flickity-syncer]のエレメントを取得する
var elms = document.getElementsByClassName( "flickity-syncer" ) ;

// [elms]全てに、ループ処理でFlickityを適用する
for( var i=0,l=elms.length; l>i; i++ )
{
	flickitySyncer[i] = new Flickity( elms[i] , {contain: true} ) ;
}