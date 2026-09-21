# RPG Exam

Petite application web PHP permettant de gérer des personnages de RPG et leurs classes (créer, lister, éditer, supprimer), avec une partie publique et une partie administration.

## Fonctionnalités

- **Accueil** : page de bienvenue avec liens vers la liste des personnages et des classes.
- **Personnages** :
  - Liste des personnages avec tri (par nom, points de vie, attaque) en ordre croissant/décroissant.
  - Chaque personnage affiche : nom, points de vie (pv), attaque (atk), expérience (xp) et sa classe.
  - Administration : création, édition, suppression.
- **Classes** :
  - Liste des classes.
  - Administration : création, édition, suppression (avec avertissement si des personnages appartiennent encore à la classe supprimée, et suppression en cascade si confirmée).

## Stack technique

- PHP natif (pas de framework), routage par simple front controller (`index.php` + paramètre `?page=`).
- MySQL via PDO (`models/db_connect.php`).
- HTML / CSS / JS vanilla (`assets/`).

## Structure du projet

```
index.php                          # Point d'entrée / routeur (index.php?page=...)
models/
  db_connect.php                   # Connexion PDO à la base
  characters.php                   # Requêtes SQL liées aux personnages
  class.php                        # Requêtes SQL liées aux classes
views/
  partials/navbar.html             # Barre de navigation
  pages/
    home.php                       # Page d'accueil
    characters.php                 # Liste publique des personnages
    class.php                      # Liste publique des classes
    admin/
      characters/                  # Dashboard, ajout, édition des personnages
      class/                       # Dashboard, ajout, édition des classes
assets/
  CSS/main.css
  JS/script.js
```

## Prérequis

- Un environnement type WAMP / Laragon / XAMPP (Apache + PHP + MySQL).
- Le projet doit être placé dans le dossier servi par Apache sous le nom `rpg-exam` (ex. `www/rpg-exam` ou `htdocs/rpg-exam`), car les URLs sont construites avec `/rpg-exam/...`.

## Installation

1. Placer le projet dans `www/rpg-exam` (ou `htdocs/rpg-exam` selon votre environnement).
2. Créer une base de données MySQL nommée `rpg`.
3. Créer les tables suivantes (structure déduite du code, à adapter si besoin) :

```sql
CREATE TABLE class (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE characters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    pv INT NOT NULL,
    atk INT NOT NULL,
    xp INT NOT NULL DEFAULT 0,
    id_class INT NOT NULL,
    FOREIGN KEY (id_class) REFERENCES class(id)
);
```

4. Vérifier la configuration de connexion dans [models/db_connect.php](models/db_connect.php) :
   - Hôte : `localhost`
   - Port : `3307`
   - Utilisateur : `root`
   - Mot de passe : *(vide)*

   Adapter ces valeurs selon votre configuration MySQL locale.

5. Démarrer Apache et MySQL, puis accéder à :

```
http://localhost/rpg-exam/index.php
```

## Utilisation

- Page d'accueil : `index.php?page=home`
- Liste des personnages : `index.php?page=characters`
- Liste des classes : `index.php?page=class`
- Admin personnages : `index.php?page=admin/characters/dashboard`
- Admin classes : `index.php?page=admin/class/dashboard`
