# Projet RC1 Linky

## Installation du projet

1. Installer `docker` et `docker-compose`.
2. Cloner le dépot `git clone https://forge.univ-lyon1.fr/p1707902/RC1-Linky.git`.
3. Se placer dans le dossier `RC1-Linky` 
4. Donner les droits d'écriture dans le dossier `rc1-linky/storage`, `mongo` et `nginx`
5. Executer `docker-compose up`
6. Le projet fonctionne en local, rendez-vous sur [localhost](http://127.0.0.1)
7. Se connecter au conteneur php_fpm : `docker exec -it php_fpm bash`
8. Exécuter `php artisan migrate`


Utile :
https://github.com/jenssegers/laravel-mongodb
export COMPOSER_ALLOW_SUPERUSER=1