<?php
// Criação da variavel con ela ira estabelecer a conexão com o banco de dados
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="server";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

