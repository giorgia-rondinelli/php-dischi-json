<?php
// prendo il file json esterno e salvo come stringa il suo contenuto
$json_string= file_get_contents('dischi.json');
// ricodifico la stringa trasformandola in un elemento php 
$lista_dischi=json_decode($json_string,true);



if(isset($_POST['newDiskTitle'])){
  $new_disk=[
    'title' => $_POST['newDiskTitle'],
    'year' => $_POST['newDiskYear'],
    'author' => $_POST['newDiskAuthor'],
    'poster' => $_POST['newDiskPoster'],

  ];
  $lista_dischi[]= $new_disk;
  file_put_contents('dischi.json',json_encode($lista_dischi));
}

if(isset($_POST['indexToRemove'])){
  $indexToRemove= $_POST['indexToRemove'];
  array_splice($lista_dischi,$indexToRemove,1);
  file_put_contents('dischi.json', json_encode($lista_dischi));
}

if(isset($_POST['indexToLike'])){
  $indexToLike=$_POST['indexToLike'];
  $lista_dischi[$indexToLike]['liked']= !$lista_dischi[$indexToLike]['liked'];
  file_put_contents('dischi.json', json_encode($lista_dischi));
}




// trasformo il file php in un json
header('Content-Type: application/json');

// stampo la lista nuovamente trasformata in stringa
echo json_encode($lista_dischi)



?>