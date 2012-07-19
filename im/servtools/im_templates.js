function jsTempo(id){
    this.dom = document.getElementById(id);
    this._parse = this._buildParseFunc( this.dom.innerHTML );
};

jsTempo.prototype._buildParseFunc = function(html){
    html = html
        .replace(/([\'|\\])/gm,"\\$1")   //转义掉 \ 和 '
        .replace(new RegExp('{([^{}]*)}','gim'), "'+(typeof data[\"$1\"]!='undefined' ? data[\"$1\"] : '')+'")  //转化为包括变量的字符串
        .replace(/[\n\r]/gm,' ');    //去除回车换行//
    html = ["return '", html ,"';"].join('');
    return new Function('data',html);
}

jsTempo.prototype.set = function(data){
    return this._parse(data);
};

jsTempo.prototype.setArray = function(arr){
    for(var i=0,len=arr.length; i<len; i++){
        arr[i] = this._parse(arr[i]);
    }
    return arr;
};

jsTempo.prototype.setMap = function(map){
    for(var i in map){
        map[i] = this._parse(map[i]);
    }
    return map;
};