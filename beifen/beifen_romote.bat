@echo off
set "Ymd=%date:~,4%%date:~5,2%%date:~8,2%" 
md "D:\%ymd%" 
"D:\phpStudy\MySQL\bin\mysqldump.exe" --host=47.92.90.93 -uroot -pquanshen120 --opt yii_quanshen > D:\%ymd%\yii_quanshen.sql
"D:\phpStudy\MySQL\bin\mysqldump.exe" --host=47.92.90.93 -uroot -pquanshen120 --opt newdog > D:\%ymd%\newdog.sql
@echo on
