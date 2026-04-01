<?php
require('carregar_pdo.php');
require('carregar_twig.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = (int) $_POST['id'] ?? false;
    if ($id) {
        $editar = $pdo->prepare('UPDATE FROM jogos WHERE id = :id');
        $editar->bindParam(':id', $id);
        $editar->execute();

    }
}
$id = (int) $_GET['id'] ?? false;
$dados = $pdo->prepare('SELECT * FROM jogos WHERE id = :id');
$dados->execute([':id' => $id]);


$jogo = $dados->fetch(PDO::FETCH_ASSOC);


echo $twig->render('jogos_editar.html', [
    'jogo'=> $jogo,
]);