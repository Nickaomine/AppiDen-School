<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DepartementController extends Controller
{
    public function departement()
    {
        $departement = DB::table('departements')
            ->orderBy('libelleFr')
            ->get();

            
        $services = DB::table('services')
        ->orderBy('libelleFr')
        ->get();
        return view('departservice', compact('departement', 'services'));
    }
    public function insertDepartement(Request $request)
    {
        try {
            $libelleFr = $request->input('libelleFr');
            $libelleEn = $request->input('libelleEn');

            // Récupérer l'ID de l'utilisateur connecté
            $userId = Auth::id();
            // Préparation des données à insérer
            $data = [
                'libelleFr' => $libelleFr,
                'libelleEn' => $libelleEn,
                'created_at' => now(), // Remplit created_at avec l'heure actuelle
                'user_update' => $userId, // ID de l'utilisateur connecté
            ];

            // Insertion dans la base de données
            DB::table('departements')->insert($data);
            return redirect()->back()->with('status', 'departement insérées avec succès.');
        } catch (\Exception $e) {
            // Traitement des erreurs inattendues
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }
}

