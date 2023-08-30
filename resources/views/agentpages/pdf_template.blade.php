

<!DOCTYPE html>
<html>
<head>
    <title>Commande Detail PDF</title>
</head>
<body>
    <h1>Detail de la Commande</h1>
    <<p><strong>Agent:</strong> {{ $commande->agent->name }}</p>

    <!-- Affichez les détails du client -->
    <h3>Détails du client</h3>
    <p><strong>Nom:</strong> {{ $commande->client->nom }}</p>
    <p><strong>Prénom:</strong> {{ $commande->client->prenom }}</p>
    <p><strong>Adresse:</strong> {{ $commande->client->adresse }}</p>
    <p><strong>Téléphone:</strong> {{ $commande->client->telephone }}</p>

    <!-- Affichez les détails de la voiture -->
    <h3>Détails de la voiture</h3>
    <p><strong>Marque:</strong> {{ $commande->voiture->marque }}</p>
    <p><strong>Modèle:</strong> {{ $commande->voiture->modele }}</p>
    <p><strong>Transmission:</strong> {{ $commande->voiture->transmission->name }}</p>
    <p><strong>Carrosserie:</strong> {{ $commande->voiture->carrosserie->name }}</p>
    <p><strong>Carburant:</strong> {{ $commande->voiture->carburant->name }}</p>
    <p><strong>Prix:</strong> {{ $commande->voiture->prix }}</p>
    <p><strong>Description:</strong> {{ $commande->voiture->description }}</p>

</body>
</html>

