# Codeline Laravel

On this test wan needed to implement simple application on Laravel,
with basic JS (optional), but as backend'er I've implement everything
only on PHP, without JS. By the way, this project is also packed to
Docker container, so you just need run it and all will work.

## How to use

### 1. Preparation

Clone the repo and change your work directory to root of sources

    git clone https://github.com/EvilFreelancer/codeline-laravel.git
    cd codeline-laravel

Now you need prepare docker compose config file:

    cp docker-compose.yml.dist docker-compose.yml

Inside `docker-compose.yml` you need change the values to the ones you
need, for example you do not want to tun this project on `80` port, to
fix that you need just change this line `80:80` to what you need (`7777:80`).

Run first iteration of Docker environment

    docker-compose up -d

### 2. Install all required components

I assume that there are no development tools on your computer, so you
need to login to Laravel container:

    docker-compose exec laravel bash

Now need to install a lot of requirement dependencies

    composer update

Fix write permition to some importnant folders

    chown apache:apache bootstrap/ -R
    chown apache:apache storage/ -R

End exit from container

    exit

### 3. Import database dump

Now you need import database dump into the MySQL inside container:

    mysql -uroot -proot_pass -h 127.0.0.1 homestead < laravel/homestead.dump

## The End

Now you just need open following page http://localhost in your browser
and you will get the result of my work.

Thanks for reading!
