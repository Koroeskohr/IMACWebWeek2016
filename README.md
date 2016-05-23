#Projet Web IMAC 2016 - Vagrant Box

###How to use
```
vagrant up
vagrant ssh
./post-install/bootstrap.sh
```

This will initialize the virtual box.
Then, initialize the projet:

```
cd public/
npm install
```

###Box informations
IP
  - 192.168.33.10 (API)
  - 192.168.33.10:8080 (Front-end)

SQL
  - Hostname: localhost or 127.0.0.1
  - Username: root
  - Password: root
  - Database: redbook

Features
  - PHP 5.6
  - Composer
  - Node
  - NPM
  - MySQL / PostgreSQL / SQLite / MongoDB
  - Grunt / Bower / Gulp

For complete list: https://github.com/scotch-io/scotch-box
