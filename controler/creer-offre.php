<?php
session_start();

// Définit le chemin du dossier database par rapport au fichier courant
$dossier_database = __DIR__ . '/../database/';

// Crée le dossier database s'il n'existe pas
if (!is_dir($dossier_database)) {
    mkdir($dossier_database, 0777, true);
}

// Connexion à la base de données SQLite
$pdo = new PDO('sqlite:' . $dossier_database . 'lshipromo.sqlite');

// Crée la table promotions si elle n'existe pas
// La table contient: id (clé primaire), nom_produit, prix_initial, prix_promo, device, magasin, chemin_image
$pdo->exec("CREATE TABLE IF NOT EXISTS promotions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom_produit TEXT NOT NULL,
    prix_initial INTEGER NOT NULL,
    prix_promo INTEGER  NOT NULL,
    device TEXT NOT NULL,
    magasin TEXT NOT NULL,
    chemin_image TEXT NOT NULL
)");

// Récupère les données envoyées par le formulaire
$nom_produit = $_POST['nom_produit'];
$prix_initial = $_POST['prix_initial'];
$prix_promo = $_POST['prix_promo'];
$device = $_POST['device'];
$magasin = $_POST['magasin'];

// Crée le dossier d'upload spécifique au magasin s'il n'existe pas
$dossier_uploads = __DIR__ . '/../uploads/' .$magasin.'/';
if (!is_dir($dossier_uploads)) {
    mkdir($dossier_uploads, 0777, true);
}

// Récupère l'extension du fichier image et génère un nom unique
$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$nom_fichier = uniqid() . '.' . $extension;   // uniqid() génère un ID unique basé sur le microtime
$chemin_complet = $dossier_uploads . $nom_fichier;

// Vérifie si le fichier a été uploadé avec succès
if (move_uploaded_file($_FILES['image']['tmp_name'], $chemin_complet)) {
    // Chemin relatif pour stocker dans la base de données
    $chemin_image = 'uploads/' . $magasin . '/' . $nom_fichier;

    // Prépare la requête SQL d'insertion
    // Les paramètres nommés (:nom_produit, etc.) évitent les injections SQL
    $stmt = $pdo->prepare("
        INSERT INTO promotions (nom_produit, prix_initial, prix_promo, 
        device, magasin, chemin_image) 
        VALUES (:nom_produit, :prix_initial, :prix_promo, 
        :device, :magasin, :chemin_image)");
    
    // Exécute la requête avec les données
    $stmt->execute([
        ':nom_produit' => $nom_produit,
        ':prix_initial' => $prix_initial,
        ':prix_promo' => $prix_promo,
        ':device' => $device,
        ':magasin' => $magasin,
        ':chemin_image' => $chemin_image
    ]);

    // Message de succès
    $_SESSION['succes'] = "Offre promotionnelle créée avec succès !";
} else {
    // Message d'erreur si l'upload échoue
    $_SESSION['error'] = "Erreur lors de l'upload de l'image.";
}

header('Location: ../publier.php');
exit;