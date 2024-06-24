
<?php
include_once "login_handler.php";
require_once "funciones.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit; }
$tasks = getAllTasks($conn);
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
        <div class="container-fluid services py-5 mb-5">

                <div class="container">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h1>TAREAS DISPONIBLES</h1>
                    <div class="blog-btn d-flex justify-content-between position-relative px-3" style="margin-top: 0px;">
                                <div class="blog-btn-icon btn btn-secondary px-4 py-3 rounded-pill ">
                                    <div class="blog-icon-1">
                                        <p class="text-white px-2">Nueva Tarea<i class="fa fa-plus ms-2"></i></p>
                                    </div>
                                    
                                </div>
                            </div>
                </div>
                            
                    <div class="row">
                    <?php
                    $materia_colores = [
                        'MATEMATICA' => 'bg-math',
                        'Ciencias' => 'bg-science',
                        'Historia' => 'bg-history',
                        'LENGUAJE' => 'bg-language',
                        // Agrega más materias y colores según sea necesario
                    ];
                        if (!empty($tasks)) {
                            foreach ($tasks as $task) {
                                $materia = $task["subjet"];
                                $color_class = isset($materia_colores[$materia]) ? $materia_colores[$materia] : 'bg-default';
                                echo '
                                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                                    <div class="services-item ' . htmlspecialchars($color_class) . '">
                                        <div class="p-4 text-center services-content">
                                            <div class="services-content-icon">
                                                <i class="fa fa-code fa-7x mb-4 text-primary"></i>
                                                <h4 class="mb-3">' . htmlspecialchars($task["title"]) . '</h4>
                                                <p class="mb-4">' . htmlspecialchars($task["description"]) . '</p>
                                                <a href="vert.php?id=' . $task["id"] . '" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            }
                        } else {
                            echo "No se encontraron tareas.";
                        }
                    ?>
                    </div>
                </div>
            </div>


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