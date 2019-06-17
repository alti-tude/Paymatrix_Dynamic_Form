#!/bin/bash

laravel(){
	sudo apt-get install php
	cd src/Dynamic_form
	php artisan serve
}

vue(){
	sudo apt install nodejs npm
	cd src/vue/current\ work/
	npm install
	npm run serve
}

init(){
	HOME=$(pwd)
	echo "Create a new database in MYSQL(with normal authorisation), for a new user(recommended), and provide the following details"
	echo "DATABASE NAME: "
	read db
	echo "USERNAME:"
	read user
	echo "PASWORD:"
	read pass

	cd src/Dynamic_form
	cat .env | grep -v DB_ > .tmp

	db="DB_DATABASE=$db"
	user="DB_USERNAME=$user"
	pass="DB_PASSWORD=$pass"
	
	echo "" >> .tmp
	echo "DB_CONNECTION=mysql" >> .tmp
	echo "DB_HOST=127.0.0.1" >> .tmp
	echo "DB_PORT=3306" >> .tmp

	echo $db >> .tmp
	echo $user >> .tmp
	echo $pass >> .tmp
	
	mv .tmp .env
	cd $HOME
}
init

##### main
laravel & vue 

