<?php 
            session_start();
            require("function.php");	
	 		$servname = 'localhost';
            $dbname = 'projetinfo1';
            $user = 'root';
            $pass = '';
            $tamp = 0;

            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
            $null=0;
            $Cnull= '';

            $sql = 'SELECT * FROM produit';
            $query = $dbco->prepare($sql);
            $query->execute();
            $Reponse = $query->fetchAll();
            $query->closeCursor();

            $sql1 = 'SELECT id FROM produit';
            $query1 = $dbco->prepare($sql1);
            $query1->execute();
            $Reponse1 = $query1->fetchAll();
            $query1->closeCursor();

            if(!empty($_POST)) {
                $bdd = connexionBDD();
                echo($_POST['2']);
                for($i=0 ; $i <= 2 ; $i++) {
                    if($_POST['1'] = $Reponse[$i]['id']) {
                        $sql = 'UPDATE produit SET nom="'.$Cnull.'", prix="'.$null.'" , stock="'.$null.'" , lien_image="'.$Cnull.'" WHERE id="'.$Reponse[$i]['id'].'"';
                        $query = $bdd->prepare($sql);
                        $query->execute();
                        $query->closeCursor();
                        $message = 'Le produit a bien été supprimé';
                        echo('text');
                    }
                }   
            }
            
            if(!empty($_POST)) {
                $bdd = connexionBDD();
                for($i=0 ; $i <= 2 ; $i++) {
                    if($_POST[''] = $Reponse[$i]['id']) {
                        $sql = '';
                        $query = $bdd->prepare($sql);
                        $query->execute();
                        $query->closeCursor();
                        $message = "L'événement a bien été supprimé";
                        echo($_POST['']);
                    }
                }   
            }
            ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion de la boutique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/accueil.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  </head>
  <body>
  <?php if(isset($message)) { ?>
    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
  <?php echo($message); ?>
  </div>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php include 'menu.php'; ?>
<form action="gestionBoutique.php" method="POST">
    <div class="container" style="margin-bottom: 150px;">
        <div class="row justify-content-center">
            <h1 class="text-center title-top"> Gestion de la boutique </h1>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nom du produit</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Image de présentation (lien)</th>
                    <th scope="col">Stock</th>
                    <th colspan="2">Gérer</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    for($i=0 ; $i <= $nbElement = count($Reponse1) ; $i++) {
                        if(isset($Reponse1[$i])) { ?>
                            <tr>
                            <th scope="row"><?php echo($Reponse[$i]['nom']); ?></th>
                            <td><?php echo($Reponse[$i]['prix']); ?>€</td>
                            <td><?php echo($Reponse[$i]['lien_image']); ?></td>
                            <td><?php echo($Reponse[$i]['stock']); ?></td>
                            <td><button type="button" class="btn btn-outline-primary">Modifier</button></td>
                            <td><button type="button" name="<?php echo ($Reponse[$i]['id'])?>" class="btn btn-outline-danger">Supprimer</button></td>
                            </tr>
                        <?php }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</form>
<?php include 'footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>