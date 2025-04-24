Space Tourism API - README


Table of Contents :

- Prérequis
- Installation
 - 1. Cloner le projet
 - 2. Installer les dépendances PHP
 - 3. Configurer l'environnement
 - 4. Créer la base de données
 - 5. Lancer les migrations
 - 6. Lancer le serveur de développement



Prérequis :

Avant de commencer, assurez-vous que vous disposez des outils suivants :
- PHP >= 8.0
- Composer (gestionnaire de dépendances PHP)
- Node.js et npm (pour la compilation des assets front-end avec Laravel Mix)
- SQLite ou MySQL pour la gestion de la base de données



Installation :

### 1. Cloner le projet

Commencez par cloner le dépôt GitHub du projet sur votre machine locale :
```
git clone https://github.com/LcsBrjw/SpaceTourism.git
cd space-tourism
```


### 2. Installer les dépendances PHP

Ensuite, installez toutes les dépendances PHP avec Composer :
```
composer install
```


### 3. Configurer l'environnement

Copiez le fichier `.env.example` en un fichier `.env` :
```
cp .env.example .env
```
Ensuite, ouvrez le fichier `.env` et configurez les informations de la base de données selon votre
environnement. Voici deux exemples pour la configuration de la base de données.
**Si vous utilisez SQLite :**
```
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```


### 4. Créer la base de données

**Si vous utilisez SQLite**, assurez-vous que le fichier `database.sqlite` existe dans le dossier
`database/` de votre projet. Si ce fichier n'existe pas, créez-le manuellement.


### 5. Lancer les migrations

Appliquez les migrations pour créer les tables nécessaires dans la base de données en exécutant la
commande suivante :
```
php artisan migrate
```
Si vous souhaitez également ajouter des données de test, vous pouvez utiliser la commande
suivante :
```
php artisan db:seed
```


### 6. Lancer le serveur de développement

Enfin, lancez le serveur de développement Laravel en exécutant la commande suivante :
```
php artisan serve
```
Le serveur sera accessible à l'adresse suivante : [http://localhost:8000].
Génération de la documentation API
Le projet utilise Scribe pour générer la documentation de l'API. Pour générer ou mettre à jour la
documentation, exécutez simplement la commande suivante :
```
php artisan scribe:generate
```
Cela générera un fichier `public/docs/index.html` contenant la documentation interactive de l'API.
Vous pouvez ensuite accéder à la documentation via votre navigateur à l'adresse suivante :
[http://localhost:8000/docs].

