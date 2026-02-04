<?php 
    $header = "Bienvenue sur l'shie Promo";
?>
<?php require 'portions/header.php' ?>

<h1 class="text-2xl font-bold text-white">Profiter de nos meilleures offres</h1>

<?php require 'models/promotions-data.php' ?>

<?php foreach($promotions as $magasin => $produits): ?>

<div>
    <h1 class='text-white'><?php echo $magasin; ?></h1>
    <div class="grid grid-cols-3 gap-3">
        <?php foreach($produits as $produit => $details): ?>
        
        <?php require 'composants/offre-card.php'; ?>
        <?php endforeach; ?>
    </div>

</div>

<?php endforeach; ?>

<?php require 'portions/footer.php' ?>