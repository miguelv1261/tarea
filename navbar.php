<?php
include_once "login_handler.php";

?>
<div class="container-fluid bg-primary">
            <div class="container">
                <nav class="navbar navbar-dark navbar-expand-lg py-0">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="text-white fw-bold d-block">High<span class="text-secondary">Tech</span> </h1>
                    </a>
                    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                        <div class="navbar-nav ms-auto mx-xl-auto p-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="about.php" class="nav-item nav-link">Tareas</a>
                             <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Tareas</a>
                                <div class="dropdown-menu rounded">
                                    <a href="about.php" class="dropdown-item">Tareas Completas</a>
                                    <a href="about.php" class="dropdown-item active">Tareas Finalizadas</a>
                                    <a href="about.php" class="dropdown-item">Tareas En Proceso</a>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <div class="d-none d-xl-flex flex-shirink-0">
                        <div class="d-flex flex-column pe-4 border-end">
                        
                            <?php if (isset($_SESSION['username'])): ?>
                                <br>
                                <span class="text-secondary"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                                <br>
                            <?php else: ?>

                                <a href="login.php" class="btn btn-secondary text-white px-3 py-2 rounded-pill">Iniciar Sesión</a>

                            <?php endif; ?>
                        </div>
                        <div class="d-flex align-items-center justify-content-center ms-4 ">
                            <a href="#"><i class="bi bi-search text-white fa-2x"></i> </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>