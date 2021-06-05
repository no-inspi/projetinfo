<?php 
            session_start();
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




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Boutique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/accueil.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  </head>
  <body>
<?php
include 'menu.php';
?>
<div class="container" style="margin-bottom: 150px;">
    <div class="row justify-content-center">
        <h1 class="text-center title-top"> La boutique </h1>
        <?php $sql =  'select * from produit';
				foreach  ($dbco->query($sql) as $row) { ?>
        
        <div class="col" style="margin-left: 60px" id="<?php echo($row['nom']) ?>">
            <form action="produit.php" method="post" name="<?php echo($row['id']) ?>">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo($row['lien_image']) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo($row['nom']) ?></h5>
                        <p class="card-text"><?php echo($row['prix']) ?>€</p>
                        <p class="card-text">Stock : <?php echo($row['stock']) ?></p>
                        <button type="submit" class="btn btn-primary" name="<?php echo($row['id']) ?>" id="<?php echo($row['id']) ?>">Acheter</button>
                    </div>
                </div>
            </form>
        </div>
        
        <?php } ?>
    </div>
</div>

<?php include 'footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>