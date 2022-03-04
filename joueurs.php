<?php
include_once("views/header.php");
session_start();
$_SESSION["nbJoueurs"]=$_POST["nbJoueurs"];
?>
<div class="wrapper joueurs">
    <div class="content">
        <a href="index.php" <h1 class="title">Picolocal</h1 > </a>
        <form action="action.php" method="post">
            <p>entrez le nom des joueurs </p>
            <?php
                $nbJoueurs=$_POST["nbJoueurs"]+1;
                for ($i=1 ; $i<$nbJoueurs ; $i++) {
                    echo '<p><span>Joueur '.$i.' </span><input type="text" name="nom'.$i.'" /></p>';
                }
            ?>
            <p><input class="submit" type="image" src="img/right-arrows.png" border="0" alt="Submit" /></p>
        </form>
    </div>
</div>
</body>
</html>