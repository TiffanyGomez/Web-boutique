<section>
 <div class="titre">
 Administration du site (Accès réservé)</br>
 - Bonjour <?php echo $_SESSION['login_admin']; ?> -
 </div> 
 <a href="index.php?controleur=Categories&action=afficher"</a>Gestion des catégories</br>
 <a href="">Gestion des produits</a></br>
 <p>
        <a href="index.php?controleur=Admin&action=seDeconnecter">Déconnexion (<?php echo $_SESSION['login_admin'] ?>)</a>
 </p>
</section>