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

            $sql = 'SELECT * FROM utilisateurs';
            $query = $dbco->prepare($sql);
            $query->execute();
            $Reponse = $query->fetchAll();
            $query->closeCursor();

            $sql1 = 'SELECT id FROM utilisateurs';
            $query1 = $dbco->prepare($sql1);
            $query1->execute();
            $Reponse1 = $query1->fetchAll();
            $query1->closeCursor();

            if(!empty($_POST)) {
                  
            }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion des membres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/accueil.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  </head>
  <body>
<?php include 'menu.php'; ?>
<form action="gestionBoutique.php" method="POST">
    <div class="container" style="margin-bottom: 150px;">
        <div class="row justify-content-center">
            <h1 class="text-center title-top"> Gestion des membres </h1>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nom </th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Age</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Type d'utilisateur</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Code postale</th>
                    <th scope="col">Numéro de téléphone</th>
                    <th colspan="2">Gérer</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    for($i=0 ; $i <= $nbElement = count($Reponse1) ; $i++) {
                        if(isset($Reponse1[$i])) { ?>
                            <tr>
                            <th scope="row"><?php echo($Reponse[$i]['nom']); ?></th>
                            <td><?php echo($Reponse[$i]['prenom']); ?></td>
                            <td><?php echo($Reponse[$i]['age']); ?></td>
                            <td><?php echo($Reponse[$i]['mail']); ?></td>
                            <td><?php echo($Reponse[$i]['pseudo']); ?></td>
                            <td><?php  $sql2 = 'SELECT type FROM typeutilisateurs WHERE id = "'.$Reponse[$i]['idtypeUtilisateurs'].'"';
                            $query2 = $dbco->prepare($sql2);
                            $query2->execute();
                            $Reponse2 = $query2->fetchAll();
                            $query2->closeCursor();
                            echo($Reponse2[0]['type']);?></td>
                            <td><?php echo($Reponse[$i]['adresse']); ?></td>
                            <td><?php echo($Reponse[$i]['ville']); ?></td>
                            <td><?php echo($Reponse[$i]['codePostale']); ?></td>
                            <td><?php echo($Reponse[$i]['telephone']); ?></td>
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