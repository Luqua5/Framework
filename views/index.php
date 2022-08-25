<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
<body>
 
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere minima, aut, distinctio explicabo libero aliquam voluptatum, 
    consequuntur cupiditate est porro culpa quae totam enim deleniti praesentium facilis a fuga consequatur.</p>

    <?php 
    foreach($users as $user) {
      echo $user->email . "</br>";
    } 
    ?>
</body>
</html>