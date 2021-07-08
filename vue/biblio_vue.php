<?php
    include_once('../module/connexion.php');
    $sql_afficher_site = $connexion->prepare(
        "SELECT numMus FROM `musee`"
    );
    $sql_afficher_site->execute();
    $sql_afficher_site->setFetchMode(PDO::FETCH_ASSOC);

    $sql_afficher_ouvrage = $connexion->prepare(
        "SELECT isbn FROM `ouvrage`"
    );
    $sql_afficher_ouvrage->execute();
    $sql_afficher_ouvrage->setFetchMode(PDO::FETCH_ASSOC);
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
<section class="section">
                    <!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts" style="font-size: 25px;">
<?php
            if(isset($_REQUEST['errCode'])){
                echo '<div style="text-align: right;"> Formulaire invalide. Déjà existant.</div>';
            }
        
    ?>
                    <div class="row match-height">
                        <div class="col-sm-2"></div>
                        <div class="col-md-8 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 style="text-decoration: underline;">Formulaire Bibliothèque</h2>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="../module/biblio_modu_ins.php" Method="POST">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">N° Musée : </label>
                                                            <fieldset class="form-group">
                                                                <select class="form-select" name="numM" id="numM">
                                                                <?php
                                                                while($ligne=$sql_afficher_site->fetch()){
                                                                ?>
                                                                    <option value="<?php echo $ligne['numMus'] ;?>"><?php echo $ligne['numMus'] ;?></option>    
                                                                <?php 
                                                                    }
                                                                ?>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">ISBN : </label>
                                                            <fieldset class="form-group">
                                                                <select class="form-select" name="isbn" id="isbn">
                                                                <?php
                                                                    while($ligne=$sql_afficher_ouvrage->fetch()){
                                                                    ?>
                                                                        <option value="<?php echo $ligne['isbn'] ;?>"><?php echo $ligne['isbn'] ;?></option>    
                                                                    <?php 
                                                                    }
                                                                ?>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="date-id-vertical">Date Achat</label>
                                                            <input type="date" name="dat" id="dat" id="roundText" class="form-control round">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Ajouter</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Annuler</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Vertical form layout section end -->
</section>
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