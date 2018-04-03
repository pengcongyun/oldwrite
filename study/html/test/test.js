/**
 * Created by Administrator on 2018/3/14 0014.
 */
var bar=document.getElementById('bar').firstElementChild;
bar.onmouseover=function () {
     document.getElementsByClassName('first')[0].style.display = 'block';
};
bar.onmouseout=function () {
    document.getElementsByClassName('first')[0].style.display = 'none';
};
