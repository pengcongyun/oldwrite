/**
 * Created by Administrator on 2018/5/28 0028.
 */
var mysql=require('mysql');
var db=mysql.createConnection({
    host:'127.0.0.1',
    user:'root',
    password:'root',
    database:'test'
});
db.connect();
var fs = require('fs');
var http=require('https');
var cheerio=require('cheerio');
var iconv = require('iconv-lite');
var path=require('path');//处理文件路径的小工具
for(var i=1;i<50;i++){
//     // setTimeout(function() {
//     //     getdata_from(i);
//     // }, 10000);
    getdata_from(i);
}
// 直接读取
function  getdata_from(i) {
    http.get("https://www.doggod.cn/new/"+i+".html",function (res) {
        res.setEncoding('utf-8');//防止中文乱码
        var content='';
        res.on("data",function (str) {
            content+=str;
        });
        res.on('end',function () {
            if(content==''){
                return;
            }
            var contents=content.replace(/[\r\n]/ig,"");//去掉回车换行

            var $=cheerio.load(content);
            var titles=$('.cnl-title h1').text();
            db.query( 'SELECT * FROM news where title ='+db.escape(titles),function(err, results) {
            // db.query( 'SELECT * FROM news',function(err, results) {
                if (err) {
                    console.log(err);
                }else{
                    if(results!=''){
                        console.log('已经抓取');return;
                    }else{
                        var reg=/<div class="cnl-article" style="text-indent: 2em;">?.*<div class="cnl-bottom">/ig;
                        var res;
                        while(res=reg.exec(contents)){
                            var description=res[0].replace('<div class="cnl-article" style="text-indent: 2em;">','').replace('<div class="cnl-bottom">','').replace('</div>','').trim();
                            var reg_img=/src="(.*?\.(jpg|png|gif))"/img;
                            var filename;
                            while(filename=reg_img.exec(description)){
                                console.log(filename[1]);
                                getimg(filename[1]);
                            }
                            // description=description.replace('src="https://www.doggod.cn/','src="./');
                        }
                        var category=$('.cnl-describe-top span').text();
                        var created=$('.cnl-describe-top i').text();
                        var viewd=$('.cnl-describe-top tt').text();
                        db.query("insert into news set ?",{title:titles,description:description,category:category,created_time:created,viewed:viewd},function (err,result) {
                            // if (err) throw err;
                            if (err) {
                                db.query('SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name="news"',function (err,result) {
                                    if(err){
                                        console.log(err);
                                    }else{
                                        db.query('ALTER TABLE news auto_increment='+(result[0].AUTO_INCREMENT-1),function (err,result) {});
                                    }
                                });
                                console.log('已经抓取'); return;
                            };
                            if (!!result) {
                                console.log('插入成功');
                                console.log(result.insertId);
                            } else {
                                console.log('插入失败');
                            }
                        });
                    }
                }
            });
        });
    });
}




//读取存储图片
function  getimg(url) {
//获取图片文件名
    var obj=path.parse(url);
    var dir=obj.dir.replace('https://www.doggod.cn/','./');
    mkdirsSync(dir);
    var filename=obj.base;
//创建写入流
    var streamwrite=fs.createWriteStream(dir+'/'+filename);
//判断是否为根目录，视情况而定
    if(obj.root.length===0){

    }else{
        url='https://www.doggod.cn'+url;
    }
//向服务器发送请求，获取图片，通过管道写入地址
    http.get(url,function (re) {
        re.pipe(streamwrite);
    });
}
// 递归创建目录 同步方法
function mkdirsSync(dirname) {
    if (fs.existsSync(dirname)) {
        return true;
    } else {
        if (mkdirsSync(path.dirname(dirname))) {
            fs.mkdirSync(dirname);
            return true;
        }
    }
}



//写入本地文件再读取
// http.get("https://www.doggod.cn/new/860.html",function (res) {
//     var streamwrite=fs.createWriteStream('./860.html');
//     res.pipe(streamwrite);
// });
// var myHtml = fs.readFileSync("860.html");
// // 转码处理
// // var $=cheerio.load(iconv.decode(myHtml, 'gb2312').toString());
// var $=cheerio.load(myHtml);
// var title=$('.cnl-title h1').text();
// console.log(title);

// var streamwrite=fs.createWriteStream('./860.html');
// description.pipe(streamwrite);



