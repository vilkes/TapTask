<?php
class ControladorLogout {
    public function logout() {
        session_start();
        $_SESSION = [];
        session_destroy();
        header("Location: ../vistas/vistaPaginaPrincipal.php");
        exit;
    }
}

// Instancia automática
$controlador = new ControladorLogout();
$controlador->logout();