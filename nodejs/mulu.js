/**
 * Created by Administrator on 2018/5/29 0029.
 */
// var fs=require('fs');
// var path=require('path');
// // 递归创建目录 同步方法
// function mkdirsSync(dirname) {
//     if (fs.existsSync(dirname)) {
//         return true;
//     } else {
//         if (mkdirsSync(path.dirname(dirname))) {
//             fs.mkdirSync(dirname);
//             return true;
//         }
//     }
// }
// mkdirsSync('./hello/a/b/c');
var request = require('request');
var imgUrl = "http://www.duzixi.com/img/logo_zixi.png";
var imgPath = file.imgPath(imgUrl);
request(imgUrl).pipe(fs.createWriteStream(imgPath));
