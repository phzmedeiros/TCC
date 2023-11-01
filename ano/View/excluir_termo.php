<?php
if (isset($_GET['email'])) {
    require_once '../Model/crud.php';
    $crud = new crud();
    $email = $_GET['email'];
    $crud->excluir_Termo($email);
}
?>