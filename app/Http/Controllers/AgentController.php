<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Commande;
use App\Models\rendezVous;
use App\Models\User;
use App\Models\Voitures;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class AgentController extends Controller
{
    public function index()
    {
        $commandes = Commande::all(); // Récupérer les commandes depuis la base de données
    return view('agentpages.dashboard', compact('commandes'));

    }


    //client

    public function client()
    {
        $client = Client::all();
        return view('agentpages.client', compact('client'));
    }

    public function createClient(Request $request)
    {
        // Validez les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required',
        ]);

        // Créez un nouveau client avec les données validées
        Client::create($validatedData);

        // Redirigez vers la page avec un message de succès (vous pouvez personnaliser ceci)
        return redirect()->route('clients.store')->with('success', 'Client ajouté avec succès.');
    }

    //commandes

    public function commandes()
    {
        $agents = User::where('role', 'AGENT')->get(); // Récupérer la liste des agents
        $clients = Client::all(); // Récupérer la liste des clients
        $voitures = Voitures::all(); // Récupérer la liste des voitures
        $commandes = Commande::with(['agent', 'client', 'voiture'])->get();
        return view('agentpages.commandes', compact('agents', 'clients', 'voitures', 'commandes'));
    }

    public function createCommandeForm()
    {
        $agents = User::where('role', 'AGENT')->get();
        $clients = Client::all();
        $voitures = Voitures::all();

        return view('agentpages.commandes', [
            'agents' => $agents, // Assigner la variable $agents à la vue
            'clients' => $clients,
            'voitures' => $voitures,
        ]);
    }

    public function storeCommande(Request $request)
    {
        $validatedData = $request->validate([
            'agent_id' => 'required',
            'client_id' => 'required',
            'voiture_id' => 'required',
            // ... autres validations ...
        ]);

        Commande::create($validatedData);

        return redirect()->route('agentpages.commandes')->with('success', 'Commande ajoutée avec succès.');
    }

    public function showCommandeDetails(Commande $commande)
    {
        // Charger les relations nécessaires
        $commande->load(['agent', 'client', 'voiture.carrosserie', 'voiture.transmission', 'voiture.carburant', 'voiture.images']);

        return view('agentpages.commande_details', compact('commande'));
    }




    public function generatePdf($commandeId)
    {
        $commande = Commande::findOrFail($commandeId);

        // Configure Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        // Load your HTML template (you can create a Blade view or use HTML directly)
        $html = view('agentpages.pdf_template', compact('commande'));

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Render the PDF (first step)
        $dompdf->render();

        // Get the client's full name for the PDF title
        $clientFullName = $commande->client->nom . ' ' . $commande->client->prenom;

        // Stream the PDF to the user's browser for download with the client's name as the title
        return $dompdf->stream($clientFullName . '_commande_detail.pdf');
    }

//suivi
    public function updateCommandeStatus(Request $request, Commande $commande)
{
    $validatedData = $request->validate([
        'statut' => 'required|in:en_attente,livree',
    ]);

    $commande->update(['statut' => $validatedData['statut']]);

    return redirect()->back()->with('success', 'Statut de la commande mis à jour avec succès.');
}


// ...

public function suiviCommandes()
{
    $commandes = Commande::with(['client', 'voiture'])
        ->orderBy('created_at', 'desc')
        ->get();

    return view('agentpages.suivicommandes', compact('commandes'));
}


public function rendezVous(Request $request)
{
    if ($request->isMethod('post')) {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'client_nom' => 'required|string',
            'client_prenom' => 'required|string',
            'date' => 'required|date',
            'lieu' => 'required|string',
        ]);

        // Créer le rendez-vous
        $rendezVous = new RendezVous();
        $rendezVous->client_nom = $request->input('client_nom');
        $rendezVous->client_prenom = $request->input('client_prenom');
        $rendezVous->date = $request->input('date');
        $rendezVous->lieu = $request->input('lieu');
        $rendezVous->agent_id = auth()->user()->id; // ID de l'agent connecté
        $rendezVous->save();
        $rendezvous = RendezVous::with('agent')->get();


        return redirect()->route('agentpages.rendezvous')->with('success', 'Rendez-vous enregistré avec succès.');
    }

    // Récupérer les rendez-vous enregistrés pour les afficher dans le tableau
    $rendezvous = RendezVous::where('agent_id', auth()->user()->id)->get();

    return view('agentpages.rendezvous', compact('rendezvous'));
}





}


