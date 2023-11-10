<?php
if (isset($_GET['id'])) {
    require_once '../Model/crud.php';
    $crud = new crud();
    $cod_equipe = $_GET['id'];
    $crud->excluir_Equipe($cod_equipe);
}
?>