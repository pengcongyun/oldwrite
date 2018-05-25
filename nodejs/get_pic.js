// 创建目录
var fs=require('fs');
// fs.mkdir('pic',function () {
//     console.log('目录文件创建成功')
// });
//连接数据库
var mysql=require('mysql');
var db=mysql.createConnection({
    host:'127.0.0.1',
    user:'root',
    password:'root',
    database:'test'
});
db.connect();

//发送http请求
var http=require('https');
// var http=require('http');
http.get('https://www.doggod.cn/',function (res) {
    var content='';
    //通过响应对象的data事件，得到HTML数据
    res.on('data',function (str) {
        content+=str;
    });
    res.on('end',function () {
        var reg=/src="(.*?\.jpg)"/ig;
        var filename;
        while(filename=reg.exec(content)){
            getimg(filename[1]);
        }
    })
});
//读取存储图片
function  getimg(url) {
    //处理文件路径的小工具
    var path=require('path');
//获取图片文件名
    var obj=path.parse(url);
    var filename=obj.base;
//创建写入流
    var streamwrite=fs.createWriteStream('./pic/'+filename);
//判断是否为根目录，视情况而定
    if(obj.root.length===0){

    }else{
        url='https://www.doggod.cn'+url;
    }
//向服务器发送请求，获取图片，通过管道写入地址
    http.get(url,function (res) {
        res.pipe(streamwrite);
        db.query("insert into node_img set ?",{img:url},function (err,result) {
            if (err) throw err;
            if (!!result) {
                console.log('插入成功');
                console.log(result.insertId);
            } else {
                console.log('插入失败');
            }
        });
        console.log(filename+'写入完毕');
    });
}


