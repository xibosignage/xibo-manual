<!--toc=getting_started-->
#Reset admin password
Connect to the Xibo database and run the following SQL:

```mysql
UPDATE `user` set `UserPassword` = MD5('password'), CSPRNG = 0 WHERE `UserName` = 'username' LIMIT 1;
```

Your user account password will then be "password".

Please ensure you then change it as soon as you can afterwards.