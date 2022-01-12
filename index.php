<?php
//IP adresa vášho servera(zvyčajne sa začína 82.208)
$ip = '82.208.17.32';
//Port nájdete za dvojbockou
$port = 27548;
//V prípade že nemáte domenu, prepíšte IP  a port v tvare XXXX:XXX
$dns = 'mojadomena.sk';
//zobrazenie DNS
$zobrazdns = true;
//Zobrazenie WEBU
$zobrazWeb = true;
//Definovanie vašej webstranky
$web = "môjkranyweb.sk";
//Zobrazenie statusu
$zobrazstatus = true;
//nastavenie zobrazenie počtu hráčov
$zobrazhracov = true;
//zobrazenie verzie
$zobrazverziu = true;
//Zobrazenie mapy
$zobrazMapu = true;
//zobrazenie využitia procesora
$zobrazcpu = true;
//zobrazenie využitia RAM
$zobrazpamat = false;
//Zobrazenie listu
$zobrazlist = true;
//Spôsob zobrazenia listu(tabuľka alebo riadok)
$zobrazenie = 'riadok';
//Zobraziť skin
$zobrazSkin = false;
//špecialny znak pre zobrazenie v prípade že si neželáte použiť skin. V prípade, že nechcete zobraziť nič, tak nechajte túto syntax ""
$specialZnak = "○";
//velkosť avataru v pixeloch
$velkostav = 16;





//Pokiaľ kód funguje do tejto časti nezasahujte, teda pokiaľ neviete čo presne robíte
$zdroj = json_decode(file_get_contents("https://query.fakaheda.eu/".$ip.":".$port.".feed"));

$status = $zdroj->status;
$players = $zdroj->players;
$maxplayers = $zdroj->slots;
$map = $zdroj->map;
$version = $zdroj->version;
$cpu = $zdroj->cpu;
$memory = $zdroj->memory;
$list = $zdroj->players_list;

if($zobrazstatus == true){
	echo "<br>Status: " .$status;
}
if ($zobrazdns == true) {
	echo "<br>IP: ".$dns;
}
if ($zobrazWeb == true) {
	echo "<br>WEB: ".$web;
}
if ($zobrazhracov == true) {
	echo "<br>Hraci: ".$players."/".$maxplayers;
}
if ($zobrazMapu == true) {
	echo "<br>Mapa: ".$map;
}
if($zobrazverziu == true){
	echo "<br>Verzia: ". $version;
}
if($zobrazcpu == true){
	echo "<br>Procesor: ".$cpu."%";
}
if($zobrazpamat == true){	
	echo "<br>Pamäť: ".$memory. "B";
}
echo "<br>";
if ($zobrazlist == true) {
	if($zobrazenie == 'riadok'){
		foreach ($list as $key => $value) {
			$hrac = $value->name;
			if ($zobrazSkin == true) {
				echo "<img src='https://minotar.net/avatar/".$hrac."' height=".$velkostav."'>".$hrac." ";		
			} else {
				echo " ".$specialZnak. " " .$hrac;
			}
		}
	}
	else{
	echo("<table>");
		foreach ($list as $key => $value) {
			$hrac = $value->name;
			if ($zobrazSkin == true) {
				echo "<tr><td><img src='https://minotar.net/avatar/".$hrac."' height=".$velkostav."'> ".$hrac." </td></tr>";		
			} else {
				echo "<tr><td> ".$specialZnak. " " .$hrac . "</tr></td>";
			}
		}
		echo "</table>";
	}
}

?>
