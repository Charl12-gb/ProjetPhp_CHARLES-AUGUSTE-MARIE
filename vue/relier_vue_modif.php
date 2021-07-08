<?php
    include_once('../module/connexion.php');
    $sql_afficher_site = $connexion->prepare(
        "SELECT nomSite FROM `site`"
    );
    $sql_afficher_site->execute();
    $sql_afficher_site->setFetchMode(PDO::FETCH_ASSOC);

    $sql_afficher_site2 = $connexion->prepare(
        "SELECT nomSite FROM `site`"
    );
    $sql_afficher_site2->execute();
    $sql_afficher_site2->setFetchMode(PDO::FETCH_ASSOC);

    $n1 = $_REQUEST['n1'] ;
    $n2 = $_REQUEST['n2'] ;

    $sql_afficher_vu = $connexion->prepare(
        "SELECT * FROM `relier` WHERE nomSite1 = '$n1' AND nomSite2 = '$n2'"
    );
    $sql_afficher_vu->execute();
    $sql_afficher_vu->setFetchMode(PDO::FETCH_ASSOC);
    while($ligne=$sql_afficher_vu->fetch()){
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
            if(isset($_REQUEST['errCode2'])){
                echo '<div style="text-align: right;">Impossible de relier un site a lui meme.</div>';
            }
            if(isset($_REQUEST['errCode3'])){
                echo '<div style="text-align: right;"> Sorry distance inferieure a 0.</div>';
            }
    ?>
                    <div class="row match-height">
                        <div class="col-sm-2"></div>
                        <div class="col-md-8 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 style="text-decoration: underline;">Formulaire Relier (Editer)</h2>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="../module/relier_modu_ins.php?edit=<?php echo $ligne['nomSite1'] ;?>&n2=<?php echo $ligne['nomSite2'] ;?>" Method="POST">
                                        <div class="form-body">
                                            <div class="row">
                                            <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Site : </label>
                                                            <fieldset class="form-group">
                                                                <select class="form-select"  name="nomS1" id="nomS1" id="roundText" class="form-control round">
                                                                <option value="<?php echo $ligne['nomSite1'] ;?>"><?php echo $ligne['nomSite1'] ;?></option>
                                                                <?php
                                                                while($lig=$sql_afficher_site->fetch()){
                                                                ?>
                                                                    <option value="<?php echo $lig['nomSite'] ;?>"><?php echo $lig['nomSite'] ;?></option>    
                                                                <?php 
                                                                }
                                                                ?>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Site : </label>
                                                            <fieldset class="form-group">
                                                                <select class="form-select"  name="nomS2" id="nomS2" id="roundText" class="form-control round">
                                                                <option value="<?php echo $ligne['nomSite2'] ;?>"><?php echo $ligne['nomSite2'] ;?></option>
                                                                <?php
                                                                while($l=$sql_afficher_site2->fetch()){
                                                                ?>
                                                                    <option value="<?php echo $l['nomSite'] ;?>"><?php echo $l['nomSite'] ;?></option>    
                                                                <?php 
                                                                }
                                                                ?>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="text-id-vertical">Distance : </label>
                                                            <input type="number" name="dist" id="dist" value="<?php echo $ligne['distance'] ;?>" id="roundText" class="form-control round">
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

<?php
    }
?>