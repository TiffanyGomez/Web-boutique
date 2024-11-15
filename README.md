Boutique WEB - Boutique Dynamique en PHP

L'Oso est une application web dynamique développée en PHP, utilisant une architecture MVC (Modèle-Vue-Contrôleur). Ce projet propose une interface permettant de naviguer parmi différentes catégories de produits (ordinateurs, accessoires, etc.), d’ajouter des articles à un panier et de gérer les commandes. Le projet inclut plusieurs versions évolutives, illustrant une progression dans le développement des fonctionnalités et la structure du code.
Fonctionnalités

    Navigation par catégories : Découvrez les produits organisés par genres (ordinateur, telephone, ecouteur, etc.).
    Gestion du panier : Ajoutez ou retirez des articles du panier et consultez un récapitulatif avant de passer commande.
    Interface utilisateur dynamique : Une interface moderne, évolutive à travers les différentes versions.
    Partie administrateur (v5) : Ajout d'une gestion sécurisée pour les administrateurs, permettant la gestion des produits et catégories.
    Base de données MySQL : Stockage des données des produits et des commandes.

Structure du Projet

Le projet est organisé en plusieurs versions :

    Version 1 : Structure initiale du projet.
    Version 2 : Première implémentation du modèle MVC.
    Version 3 : Mise en place de la couche modèle avec gestion des données.
    Version 4 : Mise en forme avancée des données, avec gestion des catégories et produits.
    Version 5 : Partie administrateur ajoutée pour la gestion complète de la boutique.

Dossiers principaux

    application/controleurs : Contient les classes pour gérer la logique métier et les actions utilisateur.
    application/modeles : Gère les interactions avec la base de données (CRUD).
    application/vues : Contient les fichiers d’affichage.
    configs : Fichiers de configuration pour les chemins et la base de données.
    public : Fichiers accessibles au public (CSS, images, etc.).

Prérequis

    Serveur web local (Apache, XAMPP, WAMP, ou MAMP).
    PHP version 7.4 ou supérieure.
    Base de données MySQL.

Installation

    Clonez le projet :

    git clone https://github.com/votre-utilisateur/zikboutik.git
    cd zikboutik

    Configurez la base de données :
        Importez le fichier tiffany_zikboutik.sql ou gomez_boutique.sql dans votre base MySQL.

    Mettez à jour les chemins de configuration :
        Modifiez mysql_config.class.php pour inclure vos informations de connexion MySQL.

    Lancez l’application :
        Hébergez les fichiers sur un serveur local et ouvrez index.php dans votre navigateur.

Contributions

    Clonez le dépôt.
    Créez une nouvelle branche pour vos modifications :

    git checkout -b 'la-branche'

    Faites vos modifications et soumettez une pull request.

Améliorations futures

    Ajouter un système d’authentification pour les utilisateurs.
    Intégrer un moteur de recherche pour les produits.
    Améliorer le design pour une meilleure expérience utilisateur.
    Ajouter des graphiques pour la gestion des ventes (côté admin).

Auteur

    Tiffany Gomez
