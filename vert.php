
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit; }
include 'funciones.php';
$task_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$agent_id = $_SESSION['user_id']; // Asegúrate de que el agente esté autenticado y su ID esté en la sesión


$task = getTaskDetails($conn, $task_id);
$suggestions = getSuggestions($conn, $task_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $suggested_price = $_POST['suggested_price'];
    $suggested_time = $_POST['suggested_time'];
    $suggestion_id = insertSuggestion($conn, $task_id, $agent_id, $suggested_price, $suggested_time);

    // Insertar una transacción relacionada con la sugerencia aceptada
    insertSuggestion($conn, $suggestion_id, $agent_id, $task_id, $suggested_price);

    header("Location: vert.php?id=$task_id");
    exit;
}


if (!$task) {
    echo "No se encontró la tarea.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>HighTech - IT Solutions Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid bg-dark py-2 d-none d-md-flex">
            <div class="container">
                <div class="d-flex justify-content-between topbar">
                    <div class="top-info">
                        <small class="me-3 text-white-50"><a href="#"><i class="fas fa-map-marker-alt me-2 text-secondary"></i></a>23 Ranking Street, New York</small>
                        <small class="me-3 text-white-50"><a href="#"><i class="fas fa-envelope me-2 text-secondary"></i></a>Email@Example.com</small>
                    </div>
                    <div id="note" class="text-secondary d-none d-xl-flex"><small>Note : We help you to Grow your Business</small></div>
                    <div class="top-link">
                        <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-primary"></i></a>
                        <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-twitter text-primary"></i></a>
                        <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-instagram text-primary"></i></a>
                        <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in text-primary"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar Start -->
        <?php include "navbar.php"; ?>
        <!-- Navbar End -->

        
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4 animated slideInDown">Tareas</h1>

            </div>
        </div>
        <!-- Page Header End -->


        <!-- Fact Start -->
        <?php   include "fact.php";?>
        <!-- Fact End -->
       
        <div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1><?php echo htmlspecialchars($task['title']); ?></h1>
        </div>
        <div class="card-body">
            <p><strong>Descripción:</strong> <?php echo nl2br(htmlspecialchars($task['description'])); ?></p>
            <p><strong>Precio:</strong> $<?php echo htmlspecialchars($task['price']); ?></p>
            <p><strong>Estado:</strong> <?php echo htmlspecialchars($task['status']); ?></p>
            <p><strong>Creado en:</strong> <?php echo htmlspecialchars($task['created_at']); ?></p>
            <p><strong>Actualizado en:</strong> <?php echo htmlspecialchars($task['updated_at']); ?></p>

             <h2>Hacer una Sugerencia</h2>
            <form method="post">
                <div class="form-group">
                    <label for="suggested_price">Precio Sugerido:</label>
                    <input type="number" step="0.01" class="form-control" id="suggested_price" name="suggested_price" required>
                </div>
                <div class="form-group">
                    <label for="suggested_time">Tiempo Sugerido:</label>
                    <input type="text" class="form-control" id="suggested_time" name="suggested_time" required>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Sugerencia</button>
            </form>
            <h2>Sugerencias Anteriores</h2>
            <?php if (!empty($suggestions)): ?>
                <ul>
                    <?php foreach ($suggestions as $suggestion): ?>
                        <li>
                            <strong>Agente ID:</strong> <?php echo htmlspecialchars($suggestion['agent_id']); ?>,
                            <strong>Precio Sugerido:</strong> $<?php echo htmlspecialchars($suggestion['suggested_price']); ?>,
                            <strong>Tiempo Sugerido:</strong> <?php echo htmlspecialchars($suggestion['suggested_time']); ?>,
                            <strong>Fecha:</strong> <?php echo htmlspecialchars($suggestion['created_at']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hay sugerencias anteriores.</p>
            <?php endif; ?>
        </div>
        <a href="about.php" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Volver</a>
    </div>
</div>
    <hr>
        <!-- Footer Start -->
        <?php include "footer.php"; ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>