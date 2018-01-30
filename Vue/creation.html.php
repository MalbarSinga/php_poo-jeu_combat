<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Jeu de combat</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <link rel="stylesheet" href="vue/css/style.css">


</head>
<body>

<header>



    <nav class="navbar navbar-expand-md navbar-dark fixed-top">

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto navbar-right">
                <li class="nav-item">
                    <a class="nav-link" style="color:black" href="?fermer=">Fermer</a>
                </li>
            </ul>
        </div>
    </nav>

</header>


<main role="main" class="container">



    <?php if (isset($erreur)): ?>
        <div class="alert alert-danger">
            <?php echo $erreur ?>
        </div>
    <?php endif; ?>


    <form method="post">
        <div class="form-group">
            <label for="nom">Créer un Nouveau Personnage</label>
            <input type="text" class="form-control" name="nom" placeholder="Entrez le nom du personnage">
        </div>
        <button type="submit" class="btn btn-primary" name="newperso">Créer</button>
    </form>
<br/>
    <br/>
    <?php if (isset($erreur2)): ?>
        <div class="alert alert-danger">
            <?php echo $erreur2 ?>
        </div>
    <?php endif; ?>
    <form method="post">
        <div class="form-group">
            <label for="nom">Choisir un personnage</label>
                <select class="form-control" name="select">
                  <option></option>
                    <?php foreach ($allpersos as $allperso) :?>
                  <option value="<?php echo $allperso->getId(); ?>"><?php echo $allperso->getNom() ?></option>
                    <?php endforeach ?>
                </select>
              </div>
        </div>
        <button type="submit" class="btn btn-primary" name="oldperso">Ok</button>
    </form>
</main>


<footer class="footer">
    <div class="container">

    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"
        integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
        crossorigin="anonymous"></script>

</body>
</html>
