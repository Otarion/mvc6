# L'ORM Eloquent

Niveau de difficulté : 3/5

On a maintenant des contrôleurs opérationnels et des vues générées à partir du moteur de template Twig !

Par contre, côté BDD, c'est pour l'instant bien vide 😬

On va donc utiliser l'ORM Eloquent de Laravel sur notre projet. Pour rappel, un ORM (object-relational mapping) permet de manipuler nos tables commes des classes PHP et nos entrées comme des objets 🤩

## Et un service de plus

Qui dit nouvelle fonctionnalité dit nouveau service !

Vous allez donc créer une classe `Eloquent` dans le dossier `/src` que vous allez ajouter en tant que service `eloquent` à notre service container.

Ce service aura un constructeur responsable de l'[initialisation de notre ORM](https://github.com/illuminate/database?tab=readme-ov-file#usage-instructions).

Pensez à bien modifier les paramètres pour se connecter à votre SGBD MySQL ! (créer une BDD de test `mvc` via PHPMyAdmin pour l'occasion)

Et... c'est tout bon logiquement.

Vous avez maintenant un ORM fonctionnel et configuré pour fonctionner avec votre framework.

## On créé une table pour tester ça

Pour tester notre ORM, il nous faut naturellement au moins une table.

Je vous invite donc à créer une table `users` dans la BDD `mvc` créée juste avant et mettez-lui de quoi tester notre ORM (une clé primaire `id`, un champ `name` et nos champs `created_at` et `updated_at` par exemple).

Ajoutez ensuite au moins une entrée pour nos tests.

## Une classe pour représenter la table `users`

A chaque fois que vous allez créer une table, il va falloir créer une classe correspondante pour pouvoir faire des opérations dessus.

Ces classes seront les points d'entrée vers notre ORM !

Si vous voulez que tout fonctionne parfaitement par défaut, vous allez simplement avoir à créer une classe qui aura le même nom que la table au singulier (ex: User pour users, Post pour posts etc...).

Cette classe se trouvera dans le dossier `app/Models` et aura simplement à étendre la classe `Illuminate\Database\Eloquent\Model` et ... c'est tout ! 🤯

## On teste ça !

Une fois la classe de Model `User` créée, vous allez pouvoir l'utiliser sur la route `hello/{name}` que vous allez modifier en `hello/{id}` dans `routes.php`.

L'objectif va donc être d'afficher le nom de chaque utilisateur sur la vue mais en le récupérant grâce à la classe Model `User` et à l'id entré dans la barre d'adresse ! Si j'ai [http://mvc.test/hello/2](http://mvc.test/hello/2), je veux dire hello à l'utilisateur qui à un `id` égal à 2. Je pense qu'il est temps de regarder du côté de la [documentation d'Eloquent](https://laravel.com/docs/10.x/eloquent) pour comprendre comment utiliser Eloquent afin de faire un `SELECT` et récupérer une entrée grâce à son `id`. Bonne recherche ! 🥳

Si jamais l'utilisateur indique un `id` introuvable dans ma table `users`, pensez à lancer une `HttpException` !

Une fois que vous avez réussi, c'est une fin d'atelier ! 😴
