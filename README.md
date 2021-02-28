Laravel Framework 6.20.16

php artisan route:list
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear



Server Settings:
(possible problems: mac os update)
(if not asked for password = problem!)

Apache 80
Nginx 80 
MySQL 3306 

composer self-update --rollback to return to version 1.10.10

updated to composer2.0 


To get the current memory_limit value, run:

php -r "echo ini_get('memory_limit').PHP_EOL;"


edit#

update yes 

vendor replace complete no 

+ breadcrumbs Yes 


# Install for testing 

1. Add Webkul Core Folder to Main
2. Edit test.env 

CODECEPTION_

important .yml files !!

Run Test 


php vendor/bin/codecept run unit


> php vendor/bin/codecept run unit Checkout
> php vendor/bin/codecept run trigger
> php vendor/bin/codecept run functional Customer
> php vendor/bin/codecept run functional Shop
> php vendor/bin/codecept run functional CartRule
<> php vendor/bin/codecept run functional Admin
<> php vendor/bin/codecept run functional Checkout
<> php vendor/bin/codecept run acceptance
<> php vendor/bin/codecept run unit

Test related Packs 



--------------------------

    "require-dev": {
        "codeception/codeception": ">=2.3.0",
        "codeception/module-asserts": "^1.0.0",
        "codeception/module-filesystem": "^1.0",
        "codeception/module-laravel5": "^1.1",
        "codeception/module-phpbrowser": "^1.0.0",
        "codeception/module-webdriver": "^1.2",
        "phpunit/phpunit": ">=4.0.0"
    }


    




# 

masterSignUp 
- no succes add to cart 
+ indexSignUp = breadcrumps 
- index = Nav Menu 

masterBreadCrumps
+ succes add to cart 
+ indexSignUp = breadcrumps 
- index = Nav Menu 

master
+ succes add to cart 
+ index = Nav Menu 
- indexSignUp = breadcrumps 