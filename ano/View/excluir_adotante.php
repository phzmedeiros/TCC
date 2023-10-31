<?php
if (isset($_GET['cpf'])) {
    require_once '../Model/crud.php';
    $crud = new crud();
    $cpf = $_GET['cpf'];
    $crud->excluir_Adotante($cpf);
}
?>