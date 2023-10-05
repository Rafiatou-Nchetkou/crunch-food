<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="inscription.css">
        <title>inscription</title>
    </head>
    <body>
        <section class="contact">
            <div class="box-container">
                
                <form method="post" action="inscription.php">
                    <h1>Inscription</h1>
                    <div class="input-field">
                        <input type="text" name="nom">
                        <label for="">Nom</label>
                    </div>
                    <div class="input-field">
                        <input type="prenom" name="prenom">
                        <label for="">Prénom</label>
                    </div>
                    <div class="input-field">
                        <input type="numero" name="numero">
                        <label for="">Numéro</label>
                    </div>
                    <!-- <div class="input-field">
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                        <label for="">Message</label>
                    </div> -->
                    <input type="submit" value="valider" name="valider" class="submit"/>
                </form>
            </div>
        </section>


        <?php
            $bdd = new PDO('mysql:host=localhost;dbname=site_crunchFood', 'root', '');


            if ( isset($_POST['valider']) )// Si le mot de passe est bon 
            { // On affiche les codes 
                $nom=$_POST['nom'];
                $prenom = $_POST['prenom'];
                $numero = $_POST['numero'];
                
                $req= $bdd-> prepare('INSERT INTO client  (nom, prenom, numero) VALUES (:nom, :prenom, :numero)');
                $req->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'numero' => $numero));
    
            }  
            // if ($pseudo == 'rafi' AND $mot_de_passe == 123456789){
            //     echo "Felicitation vous avez trouvez le bon mot de passe!";
            // }
            // else{
            //     echo "Vous n'avez pas saisi les bonnes informations!";
            // }

        ?>
    </body>
</html>