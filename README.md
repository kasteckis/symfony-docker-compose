# Symfony Docker Compose
Docker compose environment for Symfony (also works for Laravel or plain PHP) projects

# Summary of what is included
* PHP 8.2 with XDEBUG 3
* Apache2
* MySQL 8.0
* PhpMyAdmin - manage MySQL
* Mailhog - local mailing server
* Installs `composer` command
* Virtualhost configuration dedicated for Symfony projects

# Requirements
* Docker and Docker Compose [(Install docker compose)](https://docs.docker.com/compose/install/)
* Makefile (Optional) (`sudo apt install make`)

# How to install this in my project?

* Download `.docker` folder and `docker-compose.yml` file and add them to your project (Skip `.github` and `public` folders)
* Run `make prepare` command from your terminal (or run `docker compose up --build`). 
* If you need to use xdebug, run `make xdebug` command from your terminal (or run `docker compose -f docker-compose.yml -f docker-compose.xdebug.yml up -d --build`).

# How to access everything?

By default you can access services via:
* Access your project website via - http://localhost/
* MySQL can be accessed via localhost:3306
* PhpMyAdmin can be accessed via http://localhost:81
* Mailhog can be accessed via http://localhost:8025/ (SMTP Port is 1025)
* Access docker apache-php terminal by writing - `docker exec -it project_web bash` (or `make ssh`)

# Modifying .env file (If you are using Symfony)

If you use default IP addresses, append your `.env` file with the following:

* For database connection -`DATABASE_URL=mysql://project:project@mysql:3306/project`
* For mailing server - `MAILER_DSN=smtp://user:pass@mailhog:1025` (You can you any user and password)

# MySQL

* You can connect to your MySQL via `localhost:3306`
* If you don't have any additional software, you can connect to database via phpmyadmin (http://localhost:81)
* Username: `project`
* Password: `project`
* Default table is called `project`

# Notes and common issues

* I use this configuration on `Windows 11` with `WSL 2`
* You cannot use same `container_name` for multiple projects. Make sure to change them, or you can just delete that optional argument from `docker-compose.yml` file
* You can't run multiple projects that allocate same ports on your localhost.
* If you can't compose a new project, you might need to delete your old docker networks. Type `docker network ls` and then remove your old project network by writing `docker network rm NETWORK_ID` (for example `docker network rm 528d8c753c17`)
* `cannot start service XXX: network YYY not found`. Open up container list with `docker container ls -a` and remove old containers with `docker container rm ID`.

# Something does not work?

[Please create an issue.](https://github.com/kasteckis/symfony-docker-compose/issues/new)
