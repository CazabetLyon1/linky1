# Projet RC1 Linky

## Installation du projet

1. Installer `docker` et `docker-compose` (sur mac il est dans le paquet docker).
2. Cloner le dépot `git clone https://forge.univ-lyon1.fr/p1707902/RC1-Linky.git`.
3. Se placer dans le dossier `RC1-Linky` 
4. Donner les droits d'écriture dans les dossiers `rc1-linky/storage`, `mongo`, `nginx`, `api-files` et sur les fichiers `api-files/sem.txt` et `api-files/linky.log`
5. Executer `sudo ./launcher.sh` ou `sudo ./launcher-mac.sh` (ne pas oublier de donner les droits d'éxécution `chmod +x launcher.sh`)
6. Le projet fonctionne en local, rendez-vous sur [rc1-linky.fr](http://rc1-linky.fr) sur linux ou [localhost](http://localhost) sur mac
7. Se connecter au conteneur php_fpm : `docker exec -it php_fpm bash`
8. Exécuter `php artisan migrate`


## API 
Une api "maison" est disponible à l'adresse [api.rc1-linky.fr](http://api.rc1-linky.fr) sur linux ou [localhost:1234](http://localhost:1234) sur mac, elle prend en paramètres `POST` : `login`, `mdp` et `type` (hour, day, month, year). 

Si le type est `hour` on peut ajouter les paramètres `debut` et `fin` au format dd/mm/yyyy. Le début est au minimum un mois avant la date du jour.

Cette api utilise en partie le projet [Jeedom Linky](https://github.com/Asdepique777/jeedom_linky).




Utile :
https://github.com/jenssegers/laravel-mongodb
export COMPOSER_ALLOW_SUPERUSER=1

