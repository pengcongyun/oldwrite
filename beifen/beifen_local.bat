@echo off
set "Ymd=%date:~,4%%date:~5,2%%date:~8,2%" 
md "D:\%ymd%" 
"D:\phpStudy\MySQL\bin\mysqldump.exe" --opt -Q tshop -uroot -proot > D:\%ymd%\mysql.sql
@echo on
