<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire et sécurisation
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = htmlspecialchars($_POST["email"]);
    $telephone = htmlspecialchars($_POST["telephone"]);
    $marque = htmlspecialchars($_POST["marque"]);
    $modele = htmlspecialchars($_POST["modele"]);
    $description = htmlspecialchars($_POST["description"]);
    $problemes = isset($_POST["probleme"]) ? implode(", ", $_POST["probleme"]) : "Non spécifié";

    // Adresse e-mail de réception (REMPLACE par ton adresse)
    $to = "mkassam39@yahoo.fr";
    $subject = "Nouvelle demande de devis - $nom $prenom";

    // Contenu du message
    $message = "
        Nouvelle demande de devis :
        
        Nom : $nom $prenom
        Email : $email
        Téléphone : $telephone
        Marque : $marque
        Modèle : $modele
        Problèmes : $problemes
        Description : $description
    ";

    // En-têtes de l'e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envoi de l'e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "Votre demande de devis a bien été envoyée.";
    } else {
        echo "Erreur lors de l'envoi du devis.";
    }
}
?>
