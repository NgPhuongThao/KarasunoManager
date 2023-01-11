<?php
// ********************************************************************
// PARTIE : Includes et initialisation des variables
// ********************************************************************

// Inclusion de la librairie JpGraph
require_once ("../jpgraph/src/jpgraph.php");
require_once ("../jpgraph/src/jpgraph_pie.php");

require_once('connexionBD.php');

$linkpdo = connexion();

$req1 = "SELECT count(resultat) as gagne FROM matchdispute where resultat = 1";
$req2 = "SELECT count(resultat) as perdu FROM matchdispute where resultat = 0";

$res1 = $linkpdo->prepare($req1);
$res1->execute();

$res2 = $linkpdo->prepare($req2);
$res2->execute();

if (($res1 !== false) && ($res2 !== false)) {
    foreach ($res1 as $row1) {
        foreach ($res2 as $row2) {
            $data = array($row1["gagne"],$row2["perdu"]);
        }
    }
}

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
$p1->SetSliceColors(array('#0000FF','#FF0000'));
$graph->Stroke();

deconnexion($linkpdo);
?>