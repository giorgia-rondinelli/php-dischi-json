<?php
// prendo il file json esterno e salvo come stringa il suo contenuto
$json_string= file_get_contents('dischi.json');
// ricodifico la stringa trasformandola in un elemento php 
$lista_dischi=json_decode($json_string);



// logica




// trasformo il file php in un json
header('Content-Type: application/json');

// stampo la lista nuovamente trasformata in stringa
echo json_encode($lista_dischi)



?>