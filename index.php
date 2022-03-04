<?php
include_once("views/header.php");
?>

<div class="wrapper">
    <div class="content">
        <a href="index.php" ><h1 class="title">Picolocal</h1> </a>
        <form action="joueurs.php" method="post">
            <p>à combien de joueurs voulez vous jouer ?</p>
            <input class="decalage" type="number" id="nbJoueurs" name="nbJoueurs" min="1" max="10" required>
            <p><input class="submit decalage"  type="image" src="img/right-arrows.png" border="0" alt="Submit" /></p>
        </form>
    </div>

</div>
</body>
</html>