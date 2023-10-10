# Installation du projet Laravel 

Ce fichier README vous guidera à travers les étapes nécessaires pour installer et exécuter ce projet Laravel sur votre système. Assurez-vous de suivre ces étapes attentivement pour garantir une installation réussie.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre système :

* PHP (version recommandée : [8.2])
* Composer (pour la gestion des dépendances PHP)
* Wamp (pour la gestion mysql)
* Node.js et npm (pour la gestion des dépendances JavaScript)


## Installation

Suivez ces étapes pour installer et exécuter le projet :

1. Clonez ce référentiel depuis GitHub vers votre dossier www ( si vous utilisez wamp) en utilisant la commande suivante :

```bash
git clone https://github.com/Boolsy/Laravel.git
```
2. Accédez au répertoire du projet : 
```bash
cd votre-projet-laravel
```
3. Installez les dépendances PHP en exécutant la commande suivante :
```bash
composer install
```
4. Copiez le fichier .env.example en un nouveau fichier .env :
```bash
cp .env.example .env
```
5. Générez une clé d'application Laravel en exécutant la commande suivante :
```bash
php artisan key:generate

```
6. Configurez les informations de la base de données dans le fichier .env 

Assurez vous de définir les paramètres tels que 
* DB_HOST 
* DB_PORT 
* DB_DATABASE
* DB_USERNAME 
* DB_PASSWORD

7. Exécutez les migrations de base de données pour créer les tables de base :
```bash
php artisan migrate
```
8. Générer des utlisateurs factices et un compte admin (optionnel) :

```bash
php artisan create:admin-users
```
* Vous devez entrez votre nom d'utilisateur pour le compte admin
* Vous devez ensuite choisir l'adresse mail associé au compte 
* Définissez votre mot de passe (Les caractères restent invisible dans le CLI)  

9. Installer les dépendances JavaScript et compiler les actifs :
```bash
npm install
npm run build
```
10. Enfin, démarrer le serveur de développement :

```bash
php artisan serve
```
Le projet Laravel devrait maintenant être accessible à l'adresse http://localhost:8000 dans votre navigateur.







