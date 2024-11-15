

<div style="background-color: #FF8C00; color: black; padding: 200px;">
    <h2><u>Contactez-nous</u></h2>

    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Vous pouvez ajouter ici le code pour traiter les données du formulaire (envoyer un e-mail, enregistrer dans la base de données, etc.)

        // Exemple de message de confirmation
        echo '<p style="color: green;">Merci pour votre message. Nous vous contacterons bientôt.</p>';
    }
    ?>

    <form id="nouveauClient"  method="post"> 
            <div class="titre">Nouveau message</div>
            <fieldset>
                <legend> Identification : </legend>
                <label for="nom">Votre nom :</label> <input type='text' name='nom' id='nom'/><span> </span><br />
                <label for="prenom"> Votre prénom :</label><input type='password' name='prenom' id='prenom'/><span> </span><br />
                <label for="mail"> Votre mail :</label><input type='password' name='mail' id='mail'/><span> </span><br />
            </fieldset>

            <fieldset>
                <legend> Le message : </legend>
                <label for="message">Message :</label> <input type='text' name='message' id='message'/><span> </span><br />
                
            </fieldset>

            <fieldset class="sansBordure">
             
                <input type='submit' name='Valider' id='valider' value='VALIDER' />
            </fieldset>
        </form>
</div>
