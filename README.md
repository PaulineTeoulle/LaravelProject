## Binome

Corentin ROY et Pauline TEOULLE

## Avant propos

Nous avons découpé le projet en deux branches différentes : la branche `main` qui est le projet laravel basique et la branche `vue` qui utilise VueJS pour l'affichage.
La différence est donc l'affichage et l'absence de Socialite dans la branche `vue`.


## Sommaire

 - [Guide d'installation pour la branche `main`](#main)
 - [Guide d'installation pour la branche `vue`](#vue)
 - [Les fonctionnalités réalisées](#fonctionnalite)

------

## Guide d'installation pour la branche `main` <a name="main"></a>

Source: https://prograide.com/pregunta/5868/-comment-creer-un-lien-vers-une-ancre-nommee-dans-multimarkdown--

### Cloner le repository
`git clone https://github.com/PaulineTeoulle/LaravelProject.git`

### Accéder au répertoire du projet
`cd LaravelProject`

### Installer les dépendances de l'application
`composer install`

### Créer une copie du fichier .env
`cp .env.example .env`

### Générer une clé d’encryption
`php artisan key:generate` 

### Configurer le fichier .env

Dans le fichier .env, remplissez les options 
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME 
- DB_PASSWORD 

Attention : vous devez changer  `DB_CONNECTION=mysql` en  `DB_CONNECTION=sqlite`.
Vous avez également une base de données implémentée directement dans le projet (pour tester les rôles notemment) donc n'oubliez pas de mettre le chemin vers cette base dans l'option DB_DATABASE. Cela devrait ressembler à ça `LaravelProject\database\database.db` à la fin.

Toujours dans le fichier .env, ajoutez les lignes suivantes à la fin pour pouvoir tester la fonctionnalité Socialite (clefs d'API).
- GOOGLE_CLIENT_ID=799144116734-l4rvjusohorct50i1pjchhtt1q3lhjna.apps.googleusercontent.com
- GOOGLE_CLIENT_SECRET=OpQALXDQ0ovhk_vfvVhZW6lE
- GOOGLE_CLIENT_CALLBACK=http://127.0.0.1:8000/callback/google
- GITHUB_CLIENT_ID=cbf5265bbcf78c632d28
- GITHUB_CLIENT_SECRET=f54d6dc5d804367b362a4295e91728c384401d51
- GITHUB_CLIENT_CALLBACK=http://127.0.0.1:8000/callback/github


### Modification du php.ini pour utiliser Socialite
Pour utiliser Socialite, il vous faudra télécharger un certificat "cacert.pem" en cliquant sur le lien suivant [https://curl.se/docs/caextract.html](https://curl.se/docs/caextract.html). Vous devez ensuite vérifier que dans votre fichier php.ini, la variable curl.cainfo ait un chemin absolu vers le fichier cacert.pem que vous venez de télécharger. Cela devrait ressembler à ça :`curl.cainfo = C:\wamp64\cacert.pem`.

### Lancer le serveur
`php artisan serve` 

## Guide d'installation pour la branche `vue` <a name="vue"></a>

### Cloner le repository à partir de la branche
`git clone -b vue https://github.com/PaulineTeoulle/LaravelProject.git`

### Accéder au répertoire du projet
`cd LaravelProject`

### Installer les dépendances de l'application 
`composer install`

### Si besoin, installer les dépendances VueJS
`npm install`

### Créer une copie du fichier .env
`cp .env.example .env`

### Générer la clé d’encryption
`php artisan key:generate` 

### Configurer du fichier .env 

Dans le fichier .env, remplissez les options 
- DB_HOST, 
- DB_PORT, 
- DB_DATABASE, 
- DB_USERNAME 
- DB_PASSWORD 

Attention : vous devez changer  `DB_CONNECTION=mysql` en  `DB_CONNECTION=sqlite`.
Vous avez également une base de données implémentée directement dans le projet (pour tester les rôles notemment) donc n'oubliez pas de mettre le chemin vers cette base dans l'option DB_DATABASE. Cela devrait ressembler à ça `LaravelProject\database\database.db`à la fin.

Toujours dans le fichier .env, ajoutez les lignes suivantes à la fin pour pouvoir tester la fonctionnalité Socialite (clefs d'API).
- GOOGLE_CLIENT_ID=799144116734-l4rvjusohorct50i1pjchhtt1q3lhjna.apps.googleusercontent.com
- GOOGLE_CLIENT_SECRET=OpQALXDQ0ovhk_vfvVhZW6lE
- GOOGLE_CLIENT_CALLBACK=http://127.0.0.1:8000/callback/google
- GITHUB_CLIENT_ID=cbf5265bbcf78c632d28
- GITHUB_CLIENT_SECRET=f54d6dc5d804367b362a4295e91728c384401d51
- GITHUB_CLIENT_CALLBACK=http://127.0.0.1:8000/callback/github

### Modification du php.ini pour utiliser Socialite
Pour utiliser Socialite, il vous faudra télécharger un certificat "cacert.pem" en cliquant sur le lien suivant [https://curl.se/docs/caextract.html](https://curl.se/docs/caextract.html). Vous devez ensuite vérifier que dans votre fichier php.ini, la variable curl.cainfo ait un chemin absolu vers le fichier cacert.pem que vous venez de télécharger. Cela devrait ressembler à ça :`curl.cainfo = C:\wamp64\cacert.pem`.

### Lancer le serveur
`php artisan serve` 

### Avoir les modifications en temps réel
`npm run watch`


------

## Les fonctionnalités réalisées <a name="fonctionnalité"></a>

### Le TP2 complet -> Branche `main` et `vue`
- Création des routes, contrôleurs, modèles et vues. 
- Création de la base de données. 
- Création des modèles et utilisation d'Eloquent. 
- Affichage d'une recette. Formulaire de contact. 
- CRUD d'une recette.

### La suite du projet

#### Gestion des commentaires (+) -> Branche `main` et `vue`
- Ajout d'un formulaire pour ajouter un commentaire
- Affichage de tous les commentaires sous la recette.
- Un administrateur peut supprimer tous les commentaires. 
- Un utilisateur peut supprimer ses propres commentaires.

#### Gestion des ingrédients (+) -> Branche `main` et `vue`
- Ajout d'une table Ingredients reliée à la table Recipes dans la base de données. 
- Lors de l'ajout d'une recette, on peut choisir les ingrédients et leur quantité. 
- On peut également les modifier une fois la recette publiée. 
- Seul l'auteur de la recette peut modifier ses recettes et leur ingrédients. 
- Ajout d'une barre de recherche par ingrédient.

#### CRUD des recettes améliorés (++) -> Branche `vue`
- CRUD réalisé avec VueJS.

#### Identification / Authentification qui protège l'accès à l’administration (+) -> Branche `main` et `vue`
- Système de rôles (admin/user). 
- Rôle "user" par défault lors de l'inscription.
- Gestion des rôles par "admin" + barre de recherche par nom.
- Rôle "user" peut uniquement gérer ses recettes et ses commentaires.
- Rôle "admin" peut supprimer toutes les recettes et tous les commentaires.

#### Ajout de fichiers média pour les recettes (+) -> Branche `main` et `vue`
- Ajout d'un média unique à la création d'une recette.
- Affichage sur la page de la recette

#### Identification en utilisant Socialite (+) -> Branche `main`
- Connexion via Google
- Connexion via GitHub

#### Utilisation du framework Javascript VueJS (+++) -> Banche `vue`
- Application réalisée avec VueJS
