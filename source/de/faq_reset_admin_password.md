<!--toc=getting_started-->
#Das Adminkennwort zurücksetzen
Verbinden Sie sich mit der Xibo Datenbank. Führen Sie folgenden SQL Befehl aus:

```mysql
UPDATE `user` set `UserPassword` = MD5('password'), CSPRNG = 0 WHERE `UserName` = 'username' LIMIT 1;
```

Ihr gewünschtes Benutzerpasswort geben Sie bitte für den Parameter "password" ein.

Bitte ändern Sie Ihr Passwort bei der nächsten Gelegenheit.