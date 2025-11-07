<?php
class ControladorLogout {
    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION = [];
        session_destroy();
        header("Location: ../vistas/vistaPaginaPrincipal.php");
        exit;
    }
}

// Instancia automática
$controlador = new ControladorLogout();
$controlador->logout();