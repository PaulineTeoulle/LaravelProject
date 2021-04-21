## Binome

Corentin ROY et Pauline TEOULLE

## Avant propos

Nous avons découpé le projet en deux branches différentes : la branche `main` qui est le projet laravel basique et la branche `vue` qui utilise Vue.js pour l'affichage.
La différence est donc l'affichage. A savoir que Socialite (voir plus bas) n'a pas été implémenté dans la branche `vue`. 

------

## Guide d'installation pour la branche `main`

### Cloner le repository
`git clone https://github.com/PaulineTeoulle/LaravelProject.git`

### Accéder au répertoire du projet
`cd LaravelProject`

### Installer les dépendances de l'application web à partir de composer 
`composer install`

### Créer une copie de votre fichier .env
`cp .env.example .env`

### Générer votre clé d’encryption
`php artisan key:generate` 

### Configurer votre fichier .env pour permettre une connexion à la base de donnée.

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

Attention : pour utiliser Socialite, il vous faudra télécharger un certificat "cacert.pem" en cliquant sur le lien suivant [https://curl.se/docs/caextract.html](https://curl.se/docs/caextract.html). Vous devez ensuite vérifier que dans votre fichier php.ini, la variable curl.cainfo ait un chemin absolu vers le fichier cacert.pem que vous venez de télécharger. Cela devrait ressembler à ça :`curl.cainfo = C:\wamp64\cacert.pem`.

### Lancer le serveur
`php artisan serve` 

## Guide d'installation pour la branche `vue`

------

## Les fonctionnalités réalisées

### Le TP2 complet
- Création des routes, contrôleurs, modèles et vues. 
- Création de la base de données. 
- Création des modèles et utilisation d'Eloquent. 
- Affichage d'une recette. Formulaire de contact. 
- CRUD d'une recette.

### La suite du projet

#### Gestion des commentaires (+)
- Ajout d'un formulaire pour ajouter un commentaire
- Affichage de tous les commentaires sous la recette.
- Un administrateur peut supprimer tous les commentaires. 
- Un utilisateur peut supprimer ses propres commentaires.

#### Gestion des ingrédients (+)
- Ajout d'une table Ingredients reliée à la table Recipes dans la base de données. 
- Lors de l'ajout d'une recette, on peut choisir les ingrédients et leur quantité. 
- On peut également les modifiers une fois la recette publiée. 
- Seul l'auteur de la recette peut modifier ses recettes et leur ingrédients. 
- Ajout d'une barre de recherche par ingrédient.

#### CRUD des recettes améliorés (++)
- CRUD réalisé avec VueJS.

#### Identification / Authentification qui protège l'accès à l’administration (+)
- Système de rôles (admin/user). 
- Rôle "user" par défault lors de l'inscription.
- Gestion des rôles par "admin" + barre de recherche par nom.
- Rôle "user" peut uniquement gérer ses recettes et ses commentaires.
- Rôle "admin" peut supprimer toutes les recettes et tous les commentaires.

#### Ajout de fichiers média pour les recettes (+)
- Ajout d'un média unique à la création d'une recette.
- Affichage sur la page de la recette

#### Identification en utilisant Socialite (+)
- Connexion via Google
- Connexion via GitHub

#### Utilisation du framework Javascript VueJS (+++)
- Application réalisée avec VueJS
