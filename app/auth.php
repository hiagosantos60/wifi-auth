<?php
require 'config.php';

$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$sabor = $_POST['sabor'] ?? '';

if (!empty($email) && !empty($telefone)) {
    try {
        $stmt = $pdo->prepare("INSERT INTO acessos (email, telefone, sabor_favorito) VALUES (?, ?, ?)");
        $stmt->execute([$email, $telefone, $sabor]);

        header("Location: ../pages/pos_login/pos_login.html");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao salvar: " . $e->getMessage();
    }
} else {
    echo "Preencha todos os campos obrigatórios.";
}
?>
