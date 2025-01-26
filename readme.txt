https://drive.google.com/file/d/1ieOEuQzU88jB9AzKsvRBRQENKYnYTYF2/view?usp=sharing

requrement PHP 7.0
download https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.0.0/
dan extract ke c:\xampp
Copy file ke dalam c:\xampp\htdocs\js
jalankan xampp_setup.bat

jalankan xampp_start.bat

buka http://localhost/phpmyadmin

klik User accounts -- add user Account
 user name : jadwalsolat
 hostname : local
 pass	 : jadwalsolat

centang pada:
 -Create database with same name and grant all privileges.
 -Grant all privileges on wildcard name (username\_%).
klik go

klik jadwalsolat sebelah kiri klik import klik browse ke c:\xampp\htdocs\js\DB\jadwalsholat.sql
klik go

tunggu sampai selesai

jalakan : http://localhost/js/front/
uktu akses admin http://localhost/js/ user 1801 pass 1801
