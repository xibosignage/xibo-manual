<!--toc=getting_started-->
#Cloning the Database
[[PRODUCTNAME]] uses database constraints to enforce it's database schema. You can think of it as a second level of checking after the web interface to ensure that the database remains corruption-free.

This means that when you try and restore a database "dump" the restore will fail. The restoration will fail due to the database constraints, unless the following steps are taken.

The following placeholders are used in the below instructions, substitute these values for the real database details:

*   MySQL Administrative User = madmin
*   MySQL [[PRODUCTNAME]] User = [[PRODUCTNAME]]dbuser
*   MySQL Database = [[PRODUCTNAME]]db


## Method 1 

The easier of the two methods.

1.   Dump the database to a file:

    ```
     mysqldump -u madmin -p [[PRODUCTNAME]]db > [[PRODUCTNAME]].sql

    ```

2.   If you now want to clone that database (for testing or similar) then first you need to create a new database to restore the dump in to:

    ```
    mysql -u madmin -p mysql

    ```

3. You'll be prompted to enter your madmin password. At the mysql prompt, enter:

    ```
    create database [[PRODUCTNAME]]db2;
    grant all privileges on [[PRODUCTNAME]]db2.* to '[[PRODUCTNAME]]dbuser'@'localhost';
    use [[PRODUCTNAME]]db2;
    source [[PRODUCTNAME]].sql
    quit;

    ```

    Substitute [[PRODUCTNAME]]db2 for any database name of your choosing (although clearly it can't exist already!).


4.   Finally alter your settings.php file in your 1.1 install to use the new database name ([[PRODUCTNAME]]db2 in this example).


## Method 2

Before you backup your database, create a file "[[PRODUCTNAME]].sql" with the following contents:

``` sql
SET FOREIGN_KEY_CHECKS=0;
SET UNIQUE_CHECKS=0;
```

It's really important that there is at least one blank line on the end of the file.

Next you dump your [[PRODUCTNAME]] database and add the output to the end of [[PRODUCTNAME]].sql

``` sql
mysqldump -u [[PRODUCTNAME]]dbuser -p [[PRODUCTNAME]]db >> [[PRODUCTNAME]].sql

```

You will be prompted to enter the password for your [[PRODUCTNAME]]dbuser account. You could replace [[PRODUCTNAME]]dbuser with your madmin credentials instead. [[PRODUCTNAME]].sql should now contain a dump of your working [[PRODUCTNAME]] database.

If you now want to clone that database (for testing or similar) then first you need to create a new database to restore the dump in to:

``` sql
mysql -u madmin -p mysql

```

You'll be prompted to enter your madmin password. At the mysql prompt, enter:

``` sql
create database [[PRODUCTNAME]]db2;
grant all privileges on [[PRODUCTNAME]]db2.* to '[[PRODUCTNAME]]dbuser'@'localhost';
quit;
```

Substitute [[PRODUCTNAME]]db2 for any database name of your choosing (although clearly it can't exist already!).

Now we can restore our database dump in to the new database:

``` sql
mysql -u madmin -p [[PRODUCTNAME]]db2 < [[PRODUCTNAME]].sql

```

That should give you a clone of your [[PRODUCTNAME]] database. You can now modify your settings.php file to use the new database name.