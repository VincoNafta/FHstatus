<?php


$ip= '82.208.17.38';
$port= 27522;
//V prípade že nemáte domenu, prepíšte IP  a port v tvare XXXX:XXX
$dns = 'mojadomena.sk';
//zobrazenie DNS
$zobrazdns = true;
//Zobrazenie statusu
$zobrazstatus = true;
//nastavenie zobrazenie počtu hráčov
$zobrazhracov = true;
//zobrazenie verzie
$zobrazverziu = true;
//zobrazenie využitia procesora
$zobrazcpu = true;
//zobrazenie využitia RAM
$zobrazpamat = false;
//Zobrazenie listu
$zobrazlist = true;
//Spôsob zobrazenia listu(tabuľka alebo riadok)
$zobrazenie = 'tabulka';
//velkosť avataru v pixeloch
$velkostav = 16;
//Pokiaľ kód funguje do tejto časti nezasahujte, teda pokiaľ neviete čo presne robíte
$zdroj = json_decode(file_get_contents("https://query.fakaheda.eu/".$ip.":".$port.".feed"));

$status = $zdroj->status;
$players = $zdroj->players;
$maxplayers = $zdroj->slots;
$version = $zdroj->version;
$cpu = $zdroj->cpu;
$memory = $zdroj->memory;
$list = $zdroj->players_list;

if ($zobrazdns == true) {
	# code...
	echo "<br>IP: ".$dns;
}
if($zobrazstatus == true){
	echo "<br>Status:" .$status;
}
if ($zobrazhracov == true) {
	echo "<br>Hraci: ".$players."/".$maxplayers;
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
			echo "<img src='https://minotar.net/avatar/".$hrac."' height=".$velkostav."'>".$hrac." ";		
		}
	}
	else{
		echo("<table>");
			foreach ($list as $key => $value) {
				$hrac = $value->name;
				echo "<tr><td><img src='https://minotar.net/avatar/".$hrac."' height=".$velkostav."'> ".$hrac." </td></tr>";		
			}
			echo "</table>";
		}

}

?>
