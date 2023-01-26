<?php
    if (isset($_POST['valider']) && count($_POST['titulaire[]']!==6)) {
        echo ("Il vous faut 6 titulaires");
    }
?>