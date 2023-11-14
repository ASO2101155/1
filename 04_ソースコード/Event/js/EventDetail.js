var a = location.pathname;
console.log(a);
var len = a.lastIndexOf("/");
var alen = a.substr(13).length;
console.log(a.substr(13, alen - len + 1));
console.log(alen - len + 1);