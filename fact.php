<?php
require_once "funciones.php";
$total_tasks = getTotalTasks($conn);
$total_tasksp = getTotalTasksPro($conn);
$total_tasksd = getTotalTasksDone($conn);
$total_users = getTotalUsers($conn);
?>
<div class="container-fluid bg-secondary py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".1s">
                        <div class="d-flex counter">
                            <h1 class="me-3 text-primary counter-value"><?php echo $total_tasks; ?></h1>
                            <h5 class="text-white mt-1">Tareas Disponibles</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".3s">
                        <div class="d-flex counter">
                            <h1 class="me-3 text-primary counter-value"><?php echo $total_tasksp; ?></h1>
                            <h5 class="text-white mt-1">Tareas en Progreso</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".5s">
                        <div class="d-flex counter">
                            <h1 class="me-3 text-primary counter-value"><?php echo $total_tasksd; ?></h1>
                            <h5 class="text-white mt-1">Tareas Completas</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 wow fadeIn" data-wow-delay=".7s">
                        <div class="d-flex counter">
                            <h1 class="me-3 text-primary counter-value"><?php echo $total_users; ?></h1>
                            <h5 class="text-white mt-1">Usuarios Registrados</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>