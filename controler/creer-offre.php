<?php
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';

$dossier_database = __DIR__ . '/../database/';

if (!is_dir($dossier_database)) {
    mkdir($dossier_database, 0777, true);
}

$pdo = new PDO('sqlite:' . $dossier_database . 'lshipromo.sqlite');

$pdo->exec("CREATE TABLE IF NOT EXISTS promotions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom_produit TEXT NOT NULL,
    prix_initial INTEGER NOT NULL,
    prix_promo INTEGER  NOT NULL,
    device TEXT NOT NULL,
    magasin TEXT NOT NULL,
    chemin_image TEXT NOT NULL
)");
$nom_produit = $_POST['nom_produit'];
$prix_initial = $_POST['prix_initial'];
$prix_promo = $_POST['prix_promo'];
$device = $_POST['device'];
$magasin = $_POST['magasin'];

$dossier_uploads = __DIR__ . '/../uploads/' .$magasin.'/';
if (!is_dir($dossier_uploads)) {
    mkdir($dossier_uploads, 0777, true);
}

$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$nom_fichier = uniqid() . '.' . $extension;
$chemin_complet = $dossier_uploads . $nom_fichier;

if (move_uploaded_file($_FILES['image']['tmp_name'], $chemin_complet)) {
    $chemin_image = 'uploads/' . $magasin . '/' . $nom_fichier;

    $stmt = $pdo->prepare("
        INSERT INTO promotions (nom_produit, prix_initial, prix_promo, 
        device, magasin, chemin_image) 
        VALUES (:nom_produit, :prix_initial, :prix_promo, 
        :device, :magasin, :chemin_image)");
    $stmt->execute([
        ':nom_produit' => $nom_produit,
        ':prix_initial' => $prix_initial,
        ':prix_promo' => $prix_promo,
        ':device' => $device,
        ':magasin' => $magasin,
        ':chemin_image' => $chemin_image
    ]);

    echo "Offre promotionnelle créée avec succès !";
} else {
    echo "Erreur lors de l'upload de l'image.";
}