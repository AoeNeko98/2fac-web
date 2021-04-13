<?php

$Eco = $_POST['Eco'];
$Fr = $_POST['Fr'];
$Ang = $_POST['Ang'];
$Gs = $_POST['Gs'];
$Gh = $_POST['Gh'];
$Mh = $_POST['Mh'];
$M = $_POST['M'];



if( is_numeric( $Eco ) && is_numeric( $Fr ) && is_numeric( $Ang ) && is_numeric( $Gs ) && is_numeric( $Gh ) && is_numeric( $Mh )&& is_numeric( $M )) {
    $resultat=4*$M+0.5*$Mh+1.5*$Eco+1.5*$Gs+0.5*$Gh+$Fr+$Ang;
    echo( "Votre Score est: $resultat" );
}
?>
