<?php
$arrayCatalogo = array("Red Sea","JBJ","Boyu","Lomas","Ice Cap","Reef Octopus","EcoTech Marine",
"Neptune Systems","Kessil","Aquamax","Maxspect","Orphek","Red Sea","Coral Box","Ice Cap",
"EcoTech Marine","IceCap","Innovative Marine","JBJ","Maxi-Jet","Maxspect Gyre","Neptune Systems",
"Red Sea","Reef Octopus","Coral Box","Jebao","Sicce","EcoTech Marine","Eheim","Innovative Marine",
"Lifegard","Maxspect","Neptune Systems","Reef Octopus","Sicce","Coral Box","Jebao","EcoTech Marine",
"Iwaki","Neptune Systems","ReeFlo","Reef Octopus","Sicce","Coral Box","Jebao","Bulkheads",
"Lockline","Jets de regreso","Tubería","Válvula");

$arrayClean = array();

foreach($arrayCatalogo as $value){
	if(!in_array($value,$arrayClean)){
		$arrayClean[] = $value;
	}
}
$cadena = "array(";
foreach($arrayClean as $value){
    $cadena.= "'".$value."',";
    echo "<br>";
}
$cadena .=");";
echo $cadena;

array('Red Sea','JBJ','Boyu','Lomas','Ice Cap','Reef Octopus','EcoTech Marine','Neptune Systems','Kessil','Aquamax','Maxspect','Orphek','Coral Box','IceCap','Innovative Marine','Maxi-Jet','Maxspect Gyre','Jebao','Sicce','Eheim','Lifegard','Iwaki','ReeFlo','Bulkheads','Lockline','Jets de regreso','Tubería','Válvula');
?>