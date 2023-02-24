Nmap shows two ports 21 and 80
No anonymous ftp login and port 80 has a directory listing which opens a web page
THis web page has a command injection at http://192.168.56.118/site/busque.php?buscar=
There is a wordpress folder which i can cat the config file...
we get a possible creds to a database...
I attempt to get a reverse shell through the cmd ijection but to no avail... The ftp instance did not also allow
But since we have tty on the machine lets try the user name we got from /etc/passwd and the password from config file.
And we are in... little enumaration shows a history of commands executed which shows a file was run and created a backup at possible /var/www/html.
the file might be made before the new config file we found earlier was made... lets try to login to mysql, didn't work... okay there was ftp... and it works.

The ftp is a connection to the sites webroot... 

