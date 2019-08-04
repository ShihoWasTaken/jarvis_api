# Test technique pour Jarvis

## Installation
### Sources de l'application

Lancez les commandes suivantes pour installer les sources ainsi que les bibliothèques tierces.

```sh
git clone https://github.com/ShihoWasTaken/jarvis_api.git
cd jarvis_api
composer install
```

### Base de données

Créez un fichier .env.local à partir du .env
```sh
cp .env .env.local
```

Mettez à jour la ligne DATABASE_URL du fichier .env.local avec les crédentials de base de votre base de données.

Ensuite lancez les commandes suivantes pour créer la base de données.

```sh
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --dump-sql
php bin/console doctrine:schema:update --force
```

### Lancement du serveur web

```sh
php bin/console server:start
```

Une fois le serveur web lancé, l'API et sa documentation sont disponibles à l'adresse suivante:
[http://127.0.0.1:8000/api](http://127.0.0.1:8000/api)

L'interface Swagger disponible a cette adresse permet également de tester les différents endpoints de l'API directement sur la page.

## Tests
### Lancement des tests fonctionnels
```sh
php bin/phpunit
```

### Création de fixtures
```sh
php bin/console hautelook:fixtures:load
```
Attention: cela purgera la base de données pour la remplir avec des donnéees factices