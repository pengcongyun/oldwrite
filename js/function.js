//数组去重
function unique_arr(a) {
    var temp={},
        arr=[],
        len=a.length;
    for (var i=0;i<len;i++){
        if(!temp[a[i]]){
            temp[a[i]]='abc';
            arr.push(a[i])
        }
    }
    return arr;
}
