# How to setup a new laravel project locally

## Prerequsites

    - PHP installed
    - Vagrant installed
    - composer installed
    - oracle VM box

## Configuration

- change the C:\Windows\System32\drivers\etc\hosts file in order to bind a certain ip to a url for serving your app locally

-you can find and change the ip in the Homstead.yaml file
ex: 192.168.56.56  homestead.test

## Terminal commands to run (make sure to run them in powershell for proper outcome)

    1) composer create-project laravel/laravel <projectName>
    2) composer require laravel/homestead --dev
    3) vendor\\bin\\homstead make
    4) vagrant up
