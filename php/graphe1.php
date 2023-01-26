<?php
// ********************************************************************
// PARTIE : Includes et initialisation des variables
// ********************************************************************

// Inclusion de la librairie JpGraph
require_once ("../jpgraph/src/jpgraph.php");
require_once ("../jpgraph/src/jpgraph_pie.php");
require_once('connexionBD.php');

$linkpdo = connexion();

$req1 = "SELECT count(resultat) as gagne FROM matchdispute where resultat = 'Gagné'";
$req2 = "SELECT count(resultat) as perdu FROM matchdispute where resultat = 'Perdu'";
$req3 = "SELECT count(resultat) as nul FROM matchdispute where resultat = 'Egalité'";

$res1 = $linkpdo->prepare($req1);
$res1->execute();

$res2 = $linkpdo->prepare($req2);
$res2->execute();

$res3 = $linkpdo->prepare($req3);
$res3->execute();

if (($res1 !== false) && ($res2 !== false)) {
    $gagne = "Gagné";
    $perdu = "Perdu";
    $nul = "Egalité";
    foreach ($res1 as $row1) {
        $gagne = $row1["gagne"];
    }

    foreach ($res2 as $row2) {
        $perdu = $row2["perdu"];
    }

    foreach ($res3 as $row3) {
        $nul = $row3["nul"];
    }

    $data = array($gagne,$perdu,$nul);
    // Create the Pie Graph. 
    $graph = new PieGraph(350,250);

    $theme_class="DefaultTheme";
    //$graph->SetTheme(new $theme_class());

    // Set A title for the plot
    $graph->title->Set("Taux de matchs gagnés et perdus");
    $graph->SetBox(true);

    // Create
    $p1 = new PiePlot($data);
    $graph->Add($p1);

    $p1->ShowBorder();
    $p1->SetColor('black');
    $p1->SetSliceColors(array('#0000FF','#FF0000','#808080'));
    $graph->Stroke();
}

deconnexion($linkpdo);
?>