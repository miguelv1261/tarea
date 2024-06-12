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
<div class="container-fluid blog py-5 mb-5">
            <div class="container">
                <div class="row g-5 justify-content-center">
                    <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                        <div class="blog-item position-relative bg-light rounded">
                            <img src="img/blog-1.jpg" class="img-fluid w-100 rounded-top" alt="">
                            <span class="position-absolute px-4 py-3 bg-primary text-white rounded animated fadeInUp" style="top: -28px; right: 31%;">Inicar Sesión</span>
                            <br>
                            <br>
                            <br>
                            <div class="blog-content text-center position-relative px-3" style="margin-top: -25px;">
                            
                                <form action="login_handler.php" method="post">
                                    <div class="form-group">
                                        <h6 class="text-secondary h4 animated fadeInUp"><label for="username">Usuario:</label></h6>
                                        <input type="text" id="username" name="username" class="form-control animated fadeInUp" placeholder="Usuario" required>
                                    </div>
                                    <div class="form-group">
                                        <h6 class="text-secondary h4 animated fadeInUp"><label for="password">Contraseña:</label></h6>
                                        <input type="password" id="password" name="password" class="form-control animated fadeInUp" placeholder="Contraseña" required>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary animated fadeInUp">Iniciar Sesión</button>
                                </form>
                            <hr>
                            </div>
                            <div class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom animated fadeInUp">
                                
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
</div>
</body>
</html>