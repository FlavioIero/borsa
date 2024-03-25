<?php
function connect() {
  $serverName = "localhost";
  $userName = "root";
  $password = "";
  $database = "borsa";
  return mysqli_connect($serverName, $userName, $password, $database);
}

function insert($conn, $nomeTabella, $colonne) {
  /* si assume che la PK sia in AUTOINCREMENT e che 
  i valori delle colonne siano mandati dal metodo POST,
  NON usare questa funzione altrimenti */

  $sql = "INSERT INTO $nomeTabella (";
  // inserisco le colonne nella query
  for ($i=1; $i<count($colonne); $i++) {
    $sql .= $colonne[$i] . ", ";
  }
  $sql = rtrim($sql, ", ") . ") VALUES (";

  // inserisco i valori nelle query
  for ($i=1; $i<count($colonne); $i++) {
    $sql .= "'" . $_POST[$colonne[$i]] . "', ";
  }
  $sql = rtrim($sql, ", ") . ");";
  echo "$sql";
  return mysqli_query($conn, $sql);
}













?>