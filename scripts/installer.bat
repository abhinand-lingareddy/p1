@echo on
CD ..
SET ROOT_FOLDER_PATH=%CD%
SET SERVERS_FOLDER_NAME=%ROOT_FOLDER_PATH%\Public
SET MYSQL_HOME=%ROOT_FOLDER_PATH%\Public\mysql\
SET MYSQL_ZIP_NAME=mysql.zip.001
SET FLYWAY_FOLDER_PATH=%ROOT_FOLDER_PATH%\Public\flyway-2.3
SET FLYWAY_ZIP_PATH=flyway.zip

REM -----commenting extraction
IF NOT EXIST "%MYSQL_HOME%" (
	echo %MYSQL_HOME% NOT FOUND so extracting it
	call "%ProgramFiles%\7-Zip\7z" x "%SERVERS_FOLDER_NAME%\%MYSQL_ZIP_NAME%" -o"%SERVERS_FOLDER_NAME%\"
) 

REM -----commenting extraction
IF NOT EXIST "%FLYWAY_FOLDER_PATH%" (
	echo %FLYWAY_FOLDER_PATH% NOT FOUND so extracting it
	call "%ProgramFiles%\7-Zip\7z" x "%SERVERS_FOLDER_NAME%\%FLYWAY_ZIP_PATH%" -o"%SERVERS_FOLDER_NAME%\"
) 


start call "%MYSQL_HOME%\bin\mysqld" --console

call "%MYSQL_HOME%/bin/mysql" -h localhost -P 3307 -u root < sqlscripts/INITDB.sql

REM initiating flyway
call "%FLYWAY_FOLDER_PATH%\flyway" -url=jdbc:mysql://localhost:3307/connections -user=root clean

call "%FLYWAY_FOLDER_PATH%\flyway" -url=jdbc:mysql://localhost:3307/connections -user=root init
REM migrating SQL scripts
call "%FLYWAY_FOLDER_PATH%\flyway" -url=jdbc:mysql://localhost:3307/connections -user=root -locations=filesystem:%ROOT_FOLDER_PATH%/sqlscripts/flyway migrate
REM checking status
call "%FLYWAY_FOLDER_PATH%\flyway" -url=jdbc:mysql://localhost:3307/connections -user=root info
