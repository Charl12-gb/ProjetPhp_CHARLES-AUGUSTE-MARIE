<?php
    include_once('../module/connexion.php');

    $sql_afficher = $connexion->prepare(
        "SELECT * FROM `pays` ORDER BY RAND() LIMIT 5 "
    );
    $sql_afficher->execute();
    $sql_afficher->setFetchMode(PDO::FETCH_ASSOC);
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <?php
        include_once('menu.html');
    ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h2 style="text-align: center;">Bienvenue sur <strong style="color: blue;">AUG-CHAR</strong></h2>
            </div>
            <hr>
            <div class="page-content">
                <section class="row">
                    <div class="col-8 col-lg-8">
                        <div class="row" style="text-align: center;">
                            <div class="col-sm-2"><a href="pays_afficher.php"><button class="btn btn-primary">Pays</button></a></div>
                            <div class="col-sm-2"><a href="musee_afficher.php"><button class="btn btn-info">Musée</button></a></div>
                            <div class="col-sm-2"><a href="visiter_afficher.php"><button class="btn btn-success">Visiter</button></a></div>
                            <div class="col-sm-2"><a href="ouvrage_afficher.php"><button class="btn btn-danger">Ouvrage</button></a></div>
                            <div class="col-sm-2"><a href="site_afficher.php"><button class="btn btn-warning">site</button></a></div>
                            <div class="col-sm-2"><a href="relier_afficher.php"><button class="btn btn-dark">Relier</button></a></div>
                            <br><br><br>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-2"><a href="biblio_afficher.php"><button class="btn btn-info">Bibliothèque</button></a></div>
                            <div class="col-sm-2"><a href="referencer_afficher.php"><button class="btn btn-danger">Referencer</button></a></div>
                            <br><br>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 style="text-decoration: underline;">Statistique des visites</h3>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4">
                    <div class="col-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 style="text-decoration: underline;">Les pays</h2>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="card-text">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        </p>
                                        <!-- Table with outer spacing -->
                                        <div class="table-responsive">
                                            <table class="table table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Code Pays</th>
                                                        <th>Nombre Habitant</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        while($ligne = $sql_afficher->fetch()){
                                                            ?>
                                                            <tr>
                                                        <td class="text-bold-500"><?php echo $ligne['codePays'] ;?></td>
                                                        <td><?php echo $ligne['nbhabitant'] ;?></td>
                                                        </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php
            include_once('footer.html');
        ?>
    
        </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>

    <script src="../assets/js/main.js"></script>
</body>

</html>