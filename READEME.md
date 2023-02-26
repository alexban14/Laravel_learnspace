# How to setup a new laravel project locally

## Prerequsites

    - PHP installed
    - Vagrant installed
    - composer installed
    - oracle VM box

## Configuration

    1) Change the C:\Windows\System32\drivers\etc\hosts file in order to bind a certain ip to a url for serving your app locally
    2) You can find and change the ip in the Homstead.yaml file (ex: 192.168.56.56  homestead.test)

## Terminal commands to run (make sure to run them in powershell for proper outcome)

    1) composer create-project laravel/laravel <projectName>
    2) composer require laravel/homestead --dev
    3) vendor\\bin\\homstead make
    4) vagrant up

## Homestead VM databse settings

    - configure the db host in the database.php config file to the homestead ip and also the myslq port

    1) vagrant ssh (ssh into vagrant from the porjects folder)
    2) mysql
    3) create database `database_name`;
    4) show databases;
    5) show databases; – shows all the databases;
    6) use _database_name_; – selects the database with that name;
    7) show tables; – shows the selected database’s tables;
    8) describe _table_name_; – shows the table columns;
    9) select * from _table_name;
