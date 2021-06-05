<?php 
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
            if(!empty($_POST)) {
                $sql =  'select * from produit';
                foreach  ($dbco->query($sql) as $row) {
                    if(isset($_POST[$row['id']])) {
                        $query = $dbco->prepare('SELECT * FROM produit WHERE id='.$row['id']);
                        $query->execute();
                        $Reponse = $query->fetchAll();
                        $query->closeCursor();
                    }
                }
            }
            else {
                header("Location: index.php");
                die();
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
<div class="container" style="margin-bottom: 120px;">
<form action="verificationAchat.php" method="POST">
    <div class="row justify-content-center">
            <h1 class="text-center title-top"> Votre produit </h1>
            <img src="<?php echo($Reponse[0]['lien_image']) ?>" height="400" style="width: 450px">
            <ul class="text-center" style="margin-top: 30px; list-style: none;">
                <li name="nom">Nom : <?php echo($Reponse[0]['nom']) ?></li><br>
                <li name="prix">Prix : <?php echo($Reponse[0]['prix']) ?>€</li>
            </ul>
            <button type="submit" class="btn btn-success bg-success" style="width: 150px; margin-top:2%;" name="product<?php echo($Reponse[0]['id']) ?>"> Acheter </button>
    </div>
    </form>
</div>

<?php include 'footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>