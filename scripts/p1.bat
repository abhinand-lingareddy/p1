@echo on
CD ..
SET ROOT_FOLDER_PATH=%CD%
SET SERVERS_FOLDER_NAME=%ROOT_FOLDER_PATH%\Public
SET MYSQL_HOME=%ROOT_FOLDER_PATH%\Public\mysql\
SET MYSQL_ZIP_NAME=mysql.zip.001

REM -----commenting extraction
IF NOT EXIST "%MYSQL_HOME%" (
	echo %MYSQL_HOME% NOT FOUND so extracting it
	call "%ProgramFiles%\7-Zip\7z" x "%SERVERS_FOLDER_NAME%\%MYSQL_ZIP_NAME%" -o"%SERVERS_FOLDER_NAME%\"
) 



start call "%MYSQL_HOME%\bin\mysqld" --console