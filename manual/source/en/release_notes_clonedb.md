<!--toc=getting_started-->
#Clone Database
[[PRODUCTNAME]] uses database constraints to enforce it's database schema. You can think of it as a second level of checking after the web interface to ensure that the database remains corruption-free.

What this means for you, the [[PRODUCTNAME]] admin, is that when you try and restore a mysqldump'ed database the restore will fail.

I'll use the following names for things throughout the examples. Substitute these values for your real database details:

*   MySQL Administrative User = madmin

*   MySQL [[PRODUCTNAME]] User = [[PRODUCTNAME]]dbuser

*   MySQL Database = [[PRODUCTNAME]]db

##  <span class="mw-headline" id="Method_1"> Method 1 </span>

The easier of the two methods.

*   Dump the 1.0.x database to a file:
```
 mysqldump -u madmin -p [[PRODUCTNAME]]db &gt; [[PRODUCTNAME]].sql

```

*   If you now want to clone that database (for testing or similar) then first you need to create a new database to restore the dump in to:
```
mysql -u madmin -p mysql

```

*   You'll be prompted to enter your madmin password. At the mysql prompt, enter:
```
create database [[PRODUCTNAME]]db2;
grant all privileges on [[PRODUCTNAME]]db2.* to '[[PRODUCTNAME]]dbuser'@'localhost';
use [[PRODUCTNAME]]db2;
source [[PRODUCTNAME]].sql
quit;

```

Substitute [[PRODUCTNAME]]db2 for any database name of your choosing (although clearly it can't exist already!).

*   Finally alter your settings.php file in your 1.1 install to use the new database name ([[PRODUCTNAME]]db2 in this example).

##  <span class="mw-headline" id="Method_2"> Method 2 </span>

Before you backup your database, create a file "[[PRODUCTNAME]].sql" with the following contents:

```
SET FOREIGN_KEY_CHECKS=0;
SET UNIQUE_CHECKS=0;


```

It's really important that there is at least one blank line on the end of the file.

Next you dump your [[PRODUCTNAME]] database and add the output to the end of [[PRODUCTNAME]].sql

```
mysqldump -u [[PRODUCTNAME]]dbuser -p [[PRODUCTNAME]]db &gt;&gt; [[PRODUCTNAME]].sql

```

You will be prompted to enter the password for your [[PRODUCTNAME]]dbuser account. You could replace [[PRODUCTNAME]]dbuser with your madmin credentials instead. [[PRODUCTNAME]].sql should now contain a dump of your working [[PRODUCTNAME]] database.

If you now want to clone that database (for testing or similar) then first you need to create a new database to restore the dump in to:

```
mysql -u madmin -p mysql

```

You'll be prompted to enter your madmin password. At the mysql prompt, enter:

```
create database [[PRODUCTNAME]]db2;
grant all privileges on [[PRODUCTNAME]]db2.* to '[[PRODUCTNAME]]dbuser'@'localhost';
quit;

```

Substitute [[PRODUCTNAME]]db2 for any database name of your choosing (although clearly it can't exist already!).

Now we can restore our database dump in to the new database:

```
mysql -u madmin -p [[PRODUCTNAME]]db2 &lt; [[PRODUCTNAME]].sql

```

That should give you a clone of your [[PRODUCTNAME]] database. You can now modify your settings.php file to use the new database name.