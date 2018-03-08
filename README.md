# Projet RC1 Linky

## Installation du projet

1. Installer `docker` et `docker-compose`.
2. Cloner le dépot `git clone https://forge.univ-lyon1.fr/p1707902/RC1-Linky.git`.
3. Se placer dans le dossier `RC1-Linky` 
4. Donner les droits d'écriture dans les dossiers `rc1-linky/storage`, `mongo`, `nginx`, `api-files` et sur les fichiers `api-files/sem.txt` et `api-files/linky.log`
5. Executer `sudo ./launcher.sh` (ne pas oublier de donner les droits d'éxécution `chmod +x launcher.sh`)
6. Le projet fonctionne en local, rendez-vous sur [rc1-linky.fr](http://rc1-linky.fr)
7. Se connecter au conteneur php_fpm : `docker exec -it php_fpm bash`
8. Exécuter `php artisan migrate`

## API 
Une api "maison" est disponible à l'adresse [api.rc1-linky.fr](http://api.rc1-linky.fr), elle prend en paramètres `login`, `mdp` et `type` (heure, jour, mois, annee). 

Elle répond seulement aux requêtes en `POST`.

Cette api utilise le projet [Jeedom Linky](https://github.com/Asdepique777/jeedom_linky).

## Base de données

1. Depuis le dossier du projet : `sudo docker exec -it php_fpm bash`
2. Puis : `php artisan migrate`
3. Trouver le nom : `sudo docker ps` -> colonne names ligne contenant mysl (rc1linky_mysql_1)
3. Pour demarrer le bash : `sudo docker exec -it rc1linky_mysql_1 bash`
4. Se connecter en admin : `mysql -u root -p123456`
5. Choisir la Base de donnée : `use laravel;`
6. et c'est parti : `Select * from users;`



Utile :
https://github.com/jenssegers/laravel-mongodb
export COMPOSER_ALLOW_SUPERUSER=1

