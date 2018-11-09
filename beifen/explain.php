<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/11/9
 * Time: 15:03
 */
/*备份 导出数据库*/
//手动点击  上面的文件
//或者设置window下的   计算机管理  任务计划程序  基本程序设置时间周期

//命令行里：进入mysql/bin/  执行
//mysqldump.exe -uroot -proot tshop > d:/dd.sql

/*备份 导入数据库*/
//命令行里：进入mysql/bin/ mysql -uroot -proot
// mysql> use database;
// mysql> source D:\yii_niuniu.sql

//在本地用备份远程数据库 生成sql文件
//D:\phpStudy\MySQL\bin>mysqldump.exe -h 47.92.90.93 -uroot -pquanshen120 yii_quanshen > d:/exported_db.sql

//将远程数据库拷贝到本地数据库  直接导入本地数据库
//D:\phpStudy\MySQL\bin>mysqldump.exe --host=47.92.90.93 -uroot -pquanshen120 --opt yii_quanshen | mysql --host=localhost -uroot -proot -C test1

//数据库直接导 Excel
//mysql导exel表：命名行
//select p.*,pd.* from product p inner join product_drink pd on p.product_id=pd.product_id INTO OUTFILE 'D:\xx.xls';