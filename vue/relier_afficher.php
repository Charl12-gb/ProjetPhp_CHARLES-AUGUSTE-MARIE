<?php
    include_once('../module/connexion.php');
    if(isset($_REQUEST['er'])){
        echo 'Un probleme est urvnu lors de l\'execution';
    }

    $sql_afficher = $connexion->prepare(
        "SELECT * FROM `relier`"
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
            <!-- Hoverable rows start -->
<section class="section">
                    <div class="row" id="table-hover-row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 style="text-align: center; text-decoration: underline;">Liaisons des sites</h2>
                                </div>
                                <div class="card-content">
                                    <!-- table hover -->
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>NOM SITE 1</th>
                                                    <th>NOM SITE 2</th>
                                                    <th>DISTANCE</th>
                                                    <th>ACTION 1</th>
                                                    <th>ACTION 2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while($ligne=$sql_afficher->fetch()){
                                            ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $ligne['nomSite1'] ;?></td>
                                                    <td><?php echo $ligne['nomSite2'] ;?></td>
                                                    <td><?php echo $ligne['distance'] ;?>km</td>
                                                    <td><a href="relier_vue_modif.php?n1=<?php echo $ligne['nomSite1'] ;?>&n2=<?php echo $ligne['nomSite2'] ;?>"><strong style="color: black;">Editer</strong></a></td>
                                                    <td><a href="../module/relier_modu_ins.php?n1=<?php echo $ligne['nomSite1'] ;?>&n2=<?php echo $ligne['nomSite2'] ;?>"><strong style="color: red;">Supprimer</strong></a></td>
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
                </section>
                <!-- Hoverable rows end -->
            
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