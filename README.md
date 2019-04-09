# LIVE CODING S6
- Clone this projet
- Create new database (Like `WCSLC`)
- Use `src/conf/database.sql` to create the tables with the command:
    - `mysql -u <USER> -p -D <DATABASE_NAME> < database.sql`
    - Replace `<USER>` and `<DATABASE_NAME>` with yours
- Copy `private.php.dist` and write your configuration to connect to the database
    - `cp src/conf/private.php.dist src/conf/private.php`
- Open this project with **PHPStorm**
- Add your information on private.php
- You can see composer.json ? Install composer than
    - `composer install`
    - If you updated this project and if you have error like: "Not found this class etc..." run again this command to update your local
- Start Php Server with the command:
    - `php -S localhost:8000 -t public/`
    
Thanks