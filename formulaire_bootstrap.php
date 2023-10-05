<?php

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="formulaire_bootstrap.css">
        <title>Formulaire de commande</title>
    </head>
    <body>
        <div class="fstyle">
            <form action="formulaire_bootstrap.php" class="formu" method ="post">
                <div class="img1">
                    <img src="./images/IMG-20220921-WA0029.webp" alt="" id="image" width="602px" height="250px">
                </div>
                <div class="formu-2">
                    <!-- <button class="fermerBtn"><i class="fa fa-times" aria-hidden="true"></i></button> -->
                    <h2>Ma commande</h2>
                    <div id="informations-cartes" class="choix">
                        
                    </div>
                    <h2 class="h2-form">Assortiment</h2>
                    <div class="assort">
                        <input type="checkbox" class="ant-radio-input" value="Frites de pommes" name="complement"/>
                        <label>Frite de pommes</label>
                        <input type="checkbox" class="ant-radio-input" value="Frites de plantains" name="complement">
                        <label>Frites de plantains</label>
                        <input type="checkbox" class="ant-radio-input" value="baton" name="complement">
                        <label>Bâtons de manioc</label>
                    </div>
                    <h2 class="h2-form">La sauce que je veux</h2>
                    <div class="sauce">
                        <input type="checkbox" name="sauce" id="piment" value="piment"> <label for="sauce">Piment</label>
                        <input type="checkbox" name="sauce" id="Mayonnaise" value="mayonnaise"> <label for="sauce">Mayonnaise</label>
                        <input type="checkbox" name="sauce" id="ketchup" value="ketchup"> <label for="sauce">ketchup</label><br>                
                    </div>
                    <h2 class="h2-form">Ma boisson</h2>
                    <div class="boisson">
                        <input type="checkbox" name="boisson" id="coca" value="Coca"> <label for="boisson">coca</label>
                        <input type="checkbox" name="boisson" id="malta" value="Malta"> <label for="boisson">Malta</label>
                        <input type="checkbox" name="boisson" id="grenadine" value="Grenadine"> <label for="boisson">Grenadine</label>
                        <input type="checkbox" name="boisson" id="Aucune" value="Aucune"> <label for="boisson">Aucune</label>
                    </div><br>
                    <label for="">*Autres précisions concernant ma commande*</label><br>
                    <input type="text" class="text" id="precis-commande">

                    <h2>Détail de livraison</h2>

                    <label for="" class="label">*Numéro à appeler*</label><br>
                    <input type="number" class="text" id="numéro" name ="numero"> <br><br>
                    <label for="">*Nom de la personne  à appeler*</label><br>
                    <input type="text" class="text" id="perso-appeler"><br><br>
                    <label for="">*Date de livraison*</label><br>
                    <input type="date" class="text" id="date-livraison"  name= "date"><br>
                    <h2 class="h2-form">Heure de la livraison</h2>
                    <div class="heure">
                        <input type="radio" name="heure" id="tot" value="Le plus tot possible"> <label for="heure">Le plus tôt possible</label><br>
                        <input type="radio" name="heure" id="tot2" value="Dans 1h ou 2h"> <label for="heure">Dans 1h ou 2h</label><br>
                        <input type="radio" name="heure" id="soir" value="Tourné du soir"> <label for="heure">Tournée du soir (19h-21h)</label><br>
                        <input type="radio" name="heure" id="autre" value="Autre"> <label for="heure">Autre</label><br><br>
                    </div><br>

                    <label for="" class="label">*Lieu de livraison*</label><br>
                    <input type="text" class="text" id="lieu-livraison"><br><br>

                    <label for="" class="label">*Autrs indications concernant le lieu de livraison*</label><br>
                    <input type="text" class="text" id="indication-livraison"><br><br>
                        
                    <h2 class="h2-form">TOTAL DE MA COMMANDE</h2>
                    <p class="p-form">Le total sera communiqué par l'équipe après l'envoi de formulaire. Appuyer sur envoyez pour finaliser</p>
                    <input type="button" onclick="valider(this)" value="Valider"  name="submit" class="valider">
                </div>
                <div class="test">
                    <div id="test0">Ma commande: </div>
                    <div id="test01">Prix: </div>
                    <div id="test1">Complément: </div>
                    <div id="test2">Ma sauce: </div>
                    <div id="test3">Ma boisson: </div>
                    <div id="test10">Précision sur ma commande: </div>
                    <div id="test4">Numéro à appeler: </div>
                    <div id="test5">Personne à appeler : </div>
                    <div id="test6">Date de livraison : </div>
                    <div id="test7">Heure de livraison: </div>
                    <div id="test8">Lieu de livraison : </div>
                    <div id="test9">Autres indications : </div>
                    <input type="submit" onclick="whatsapp() "  value="Envoyer sur WhatsApp" class="btn-form">
                </div>
            </form>
        </div>   
        <?php
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=crunch_food', 'root', '');
            }
            catch (Exception $e)
            {
                    die('Erreur : ' . $e->getMessage());
            }

            if (isset($_POST['numero']) AND isset($_POST['date']) AND isset($_POST['heure'])) {
                $numero_appeler = $_POST['numero'];
                $date_envoi = $_POST['date'];
                $heure_envoi = $_POST['heure'];
               
                $req = $db->prepare('INSERT INTO client(num_client) VALUES(:numero)');
                    $req->execute(array(
                    'numero' =>$numero_appeler
                ));
                $req2 = $db->prepare('INSERT INTO commande(date_commande, heure_commande) VALUES(:dat, NOW())');
                    $req2->execute(array(
                    'dat' => $date_envoi
                ));
            }
           
        ?>

    <script>

        // code js de l'envoi des commande sur le formulaire
        document.addEventListener("DOMContentLoaded", function() {
          // Récupérez les informations des cartes sélectionnées depuis localStorage
          var cartesSelectionnees = JSON.parse(localStorage.getItem("cartesSelectionnees"));
          var informationsDiv = document.getElementById("informations-cartes");
        
          // Affichez ces informations sur la page
          if (cartesSelectionnees && informationsDiv) {
            cartesSelectionnees.forEach(function(carte) {
            var carteDiv = document.createElement("div");
            carteDiv.innerHTML = `
                <h3>${carte.titre}</h3>
                <span>${carte.prix}</span>
              `;
              informationsDiv.appendChild(carteDiv);
            });
          }
        });

        

        // code js de l'envoi du formulaire sur whatsapp
        function valider(bouton){
            var carte = bouton.parentNode;
            // var pouletPane = document.getElementById("poulet-pane").value;
            // var pouletpane = document.getElementById("poulet-pane").value;
            var h3 = carte.querySelectorAll("h3")
            var valeur=h3;
            var titre= "";
                for(val of valeur){
                        titre += val.textContent + ", ";
                 }

            var span = carte.querySelectorAll("span")
            var piece = span;
            var prix = "";
            for(val of piece){
                prix+= val.textContent + ", ";
            }


            // var p = carte.querySelectorAll("span").textContent;
        //      let carteDivPrix = []
        //      let carteDivTitre = []
        //      let i = 0
        //     var cartesSelectionnees = JSON.parse(localStorage.getItem("cartesSelectionnees"));
        //     if (cartesSelectionnees) {
        //     cartesSelectionnees.forEach(function(carte) {
        //       carteDivPrix[i] = carte.titre;
        //       carteDivTitre[i] = carte.prix;
        //       i++;
        //     });
        //   }
        // let i1 = ""
        // let i2 = ""
        //     var cartesSelectionnees = JSON.parse(localStorage.getItem("cartesSelectionnees"));
        //     if (cartesSelectionnees) {
        //     cartesSelectionnees.forEach(function(carte) {
        //       i1.textContent = carte.titre;
        //       i2.textContent =carte.prix;
              
        //     });
        //   }

   

            var complements = checkedboxes('complement');
            var sauces = checkedboxes('sauce');
            var boissons = checkedboxes('boisson');
            // var emballages = checkedboxes('emballage');
            var precisionCommande = document.getElementById("precis-commande").value;
            var numero = document.getElementById("numéro").value;
            var persoAppeler = document.getElementById("perso-appeler").value;
            var dateLivraison = document.getElementById("date-livraison").value;
            var heureLivraison = radio('heure');
            var lieuLivraison = document.getElementById("lieu-livraison").value;
            var indicationLivraison = document.getElementById("indication-livraison").value;

            document.getElementById("test0").textContent = titre;
            document.getElementById("test01").textContent = prix;
            document.getElementById("test1").textContent = complements;
            document.getElementById("test2").textContent = sauces;
            document.getElementById("test3").textContent = boissons;
            document.getElementById("test10").textContent = precisionCommande;
            document.getElementById("test4").textContent = numero;
            document.getElementById("test5").textContent = persoAppeler;
            document.getElementById("test6").textContent = dateLivraison;
            document.getElementById("test7").textContent = heureLivraison;
            document.getElementById("test8").textContent = lieuLivraison;
            document.getElementById("test9").textContent = indicationLivraison;


            

            // fonctions qui récupères les données des checkboxs et radio
            function checkedboxes(name){
                var checkboxes = document.getElementsByName(name)
                var checked = [];
                for (var i=0; i<checkboxes.length;i++){
                    if (checkboxes[i].checked){
                        checked.push(checkboxes[i].value);
                    }
                }
                var list='';
                for(i=0; i<checked.length; i++){
                    list=list+', '+checked[i]
                }
                return (list) ;
            }
            function radio(name){
                var radio = document.getElementsByName(name);
                var valeur;
                for(valeur of radio){
                    if (valeur.checked)
                        return(valeur.value);
                 }
                
            }
   
        }

            // Envoi de la commande sur whatsapp
            function whatsapp(){
                var titre =  document.getElementById("test0").textContent;
                var prix = document.getElementById("test01").textContent;
                var complements = document.getElementById("test1").textContent;
                var sauces = document.getElementById("test2").textContent;
                var boissons = document.getElementById("test3").textContent;
                var precisionCommande = document.getElementById("test10").textContent;
                var numero = document.getElementById("test4").textContent;
                var persoAppeler = document.getElementById("test5").textContent;
                var dateLivraison = document.getElementById("test6").textContent
                var heureLivraison = document.getElementById("test7").textContent
                var lieuLivraison = document.getElementById("test8").textContent;
                var indicationLivraison = document.getElementById("test9").textContent;

                var url="https://wa.me/+237698144985?text=" 
                var info = "je veux un: " + titre
                +"Prix: " + prix 
                +"comme complément: " +complements
                + "La sauce que je veux: " + sauces 
                + "Ma boisson: " + boissons 
                // + "Mon emballage" + emballages + "%0a"
                + "Autres précision sur la commande: " + precisionCommande 
                + "Numéro: " + numero 
                + "Nom de la personne à appeler " + persoAppeler
                + "Date de livraison: " + dateLivraison
                + "Heure de livraison: " + heureLivraison 
                + "Lieu de livraison:" + lieuLivraison 
                + "Autres indication sur le lieu de livraison:" + indicationLivraison;

                var fullUrl = url + encodeURIComponent(info)
                window.open(fullUrl,"_blank").focus(); 
            }
        
        </script>
</html>