echo off 

set ymd=%date:~0,4%%date:~5,2%%date:~8,2% 

set backup-dir=D:\%ymd% 

echo "savedir:"%backup-dir% 

if not exist %backup-dir% ( 

mkdir %backup-dir% 

) 

copy D:\HostsEditor.ini %backup-dir% 

echo "*********success!*********"
pause 