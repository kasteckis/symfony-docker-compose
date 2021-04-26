# Symfony Docker Compose
Docker compose environment for Symfony (also works for Laravel or plain PHP) projects

# Summary of what is included
* PHP 7.4.16 with XDEBUG 2.9.8
* Apache2
* MySQL 8.0
* PhpMyAdmin - manage MySQL
* Mailhog - local mailing server to test emails
* Installs `composer` and `symfony` commands
* Virtualhost configuration dedicated for Symfony projects
* Latest stable NPM
* Latest stable Node.js

# How to install this in my project?

* Download `.docker` folder and `docker-compose.yml` file and add them to your project (Don't download `.github` folder)
* Run `docker-compose up` command from your terminal. [(Install docker compose)](https://docs.docker.com/compose/install/)

# How to access everything?

By default you can access services via:
* Access your project website via - http://192.168.2.2/
* MySQL can be accessed via 192.168.2.3:3306
* PhpMyAdmin can be accessed via http://192.168.2.4/
* Mailhog can be accessed via http://192.168.2.5:8025/
* Access docker apache-php terminal by writing - `docker exec -it project_web bash`

# Modifying .env file (If you are using Symfony)

If you use default IP addresses, append your `.env` file with the following:

* For database connection -`DATABASE_URL=mysql://project:project@192.168.2.3:3306/project`
* For mailing server - `MAILER_URL=mailhog:1025//randomemail@gmail.com:randompassword` (You don't need to change email or password)

# MySQL

* If you haven't modified IP addresses, you can connect to your MySQL via 192.168.2.3:3306
* If you don't have any additional software, you can connect to database via phpmyadmin (http://192.168.2.4/)
* Nickname: `project`
* Password: `project`
* Default table is called `project`

# Notes and common issues

* You cannot use same configuration for multiple projects. Docker won't allow you to allocate same IP addresses for multiple containers.
* You would need to modify `docker-compose.yml` IP addresses. For example from `192.168.2.0/24` to `192.168.3.0/24`
* If you can't compose a new project, you might need to delete your old docker networks. Type `docker network ls` and then remove your old project network by writing `docker network rm NETWORK_ID` (for example `docker network rm 528d8c753c17`)
* `cannot start service XXX: network YYY not found`. Open up container list with `docker container ls -a` and remove old containers with `docker container rm ID`.

# Something does not work?

[Please create an issue.](https://github.com/kasteckis/symfony-docker-compose/issues/new)
