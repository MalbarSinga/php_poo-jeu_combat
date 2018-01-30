<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Le combat va commencer</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css"
          integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">


    <link rel="stylesheet" href="vue/css/style.css">
</head>
<body>

<header>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top">

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto nav-right">
                <li class="nav-item">
                    <a class="nav-link" style="color:black" href="?fermer=">Fermer</a>
                </li>
            </ul>
        </div>
    </nav>

</header>


<main role="main" class="container">

<h1>En avant <?php echo $personnage->getNom()?>!</h1>

    <img src="<?php echo $personnage->getImage() ?>">
<br/>
    <br/>
<form method="post">
    <div class="form-group">
        <label for="nom">Choisissez l'adversaire</label>
        <select class="form-control" name="id">
            <?php foreach($adversaires as $adversaire) :

            if ($adversaire->getId() === $personnage->getId()):
                continue;
            else : ?>
          <option value="<?php echo $adversaire->getId(); ?>"><?php echo $adversaire->getNom(); ?></option>
            <?php endif ?>
            <?php endforeach ?>
        </select>
      </div>

    <?php if (isset($erreur)): ?>
</form>
        <div class="alert alert-warning">
            <?php echo $erreur ?><br/>
            <a href="?fermer"><button class="btn btn-primary">Créer un nouveau personnage</button></a>
        </div>
    <?php else: ?>
    <?php foreach ($attacks as $attack): ?>
            <input type="submit" class="btn btn-dark" name="attack" value="<?php echo $attack->getNom(); ?>">
<!--    <input type="submit" name="fight" value="Fight !">-->
    <?php endforeach ?>
</form>
    <?php endif ?>


    <?php if (isset($message)): ?>
        <div class="alert alert-info">
            <?php echo $message ?>
        </div>
    <?php endif; ?>


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