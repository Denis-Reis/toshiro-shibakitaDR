<?php
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');

echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

$servername = "db"; // nome do serviço no docker-compose
$username   = "root";
$password   = "123456"; // mesma senha definida no docker-compose
$database   = "toshiro"; // mesmo nome definido no docker-compose

// Criar conexão
$link = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($link->connect_errno) {
    printf("Connect failed: %s\n", $link->connect_error);
    exit();
}

$valor_rand1 = rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name   = gethostname();

$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) 
          VALUES ('$valor_rand1', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$host_name')";

if ($link->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $link->error;
}
?>