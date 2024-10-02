<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petite;
use Illuminate\Support\Facades\DB;


class ClassesController extends Controller
{
    /*Controller petite section*/

    public function petitesection()
    {
        $petitesection = DB::table('Petites')
            ->orderBy('nom')
            ->get();
        return view('classes.petitesection', compact('petitesection'));
    }

    public function insertpetites(Request $request)
    {
        try {
            // Récupération des données
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

            // Vérification des doublons
            $existingPetites = DB::table('petites')
                ->where('matricule', $matricule)
                ->first();

            if ($existingPetites) {
                return redirect()->back()->with('error', 'Cet Eleve est déjà inscrit avec ce matricule.');
            }
            // Préparation des données à insérer
            $data = [
                'nom' => $nom,
                'sexe' => $sexe,
                'age' => $age,
                'statut' => $statut,
                'prenom' => $prenom,
                'orphelin' => $orphelin,
                'matricule' => $matricule,
                'datenaissance' => $datenaissance,
                'lieunaissance' => $lieunaissance,
                'numeroparent' => $numeroparent,
                'adresse' => $adresse,
                'etat' => $etat,
                'created_at' => now(), // Remplit created_at avec l'heure actuelle
            ];

            // Insertion dans la base de données
            DB::table('petites')->insert($data);
            return redirect()->back()->with('status', 'Eleve Inscrit avec succès.');
        } catch (\Exception $e) {
            // Traitement des erreurs inattendues
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }
   
    public function updatepetites(Request $request)
    {
        try {
            //recuperation des personnels
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

         
        } catch (\Exception $e) {
            //traitement des erreurs innattendues
            return redirect()->back()->with('error', 'une erreur s\'est produite:' . $e->getMessage());
        }
        //preparation des donnees update 
        $data = [
            'nom' => $nom,
            'sexe' => $sexe,
            'age' => $age,
            'statut' => $statut,
            'prenom' => $prenom,
            'orphelin' => $orphelin,
            'matricule' => $matricule,
            'datenaissance' => $datenaissance,
            'lieunaissance' => $lieunaissance,
            'numeroparent' => $numeroparent,
            'adresse' => $adresse,
            'etat' => $etat,
            'created_at' => now(), // Remplit created_at avec l'heure actuelle
        ];

        DB::table('petites')->where('petiteID', $request->input('petiteID'))->update($data);

        return redirect()->back()->with('status', 'ELeve Modifier avec succès.');
    }
    

    public function filtrepetites(Request $request)
    {
        $nom = $request->input('nom');

        $petitesection = DB::table('petites')
            ->where('nom', $nom)
            ->orderBy('nom')
            ->get();
            return view('classes.petitesection',compact('petitesection'));
    }

    public function deletepetites($petiteID)
    {
        $petiteID = (int) $petiteID;

        if ($petiteID > 0) {
            DB::table('petites')->where('petiteID', $petiteID)->delete();
            return redirect()->back()->with('status', 'Eleve Supprimer avec success');
        } else {
            return redirect()->back()->with('error', 'Eleve echec de suppression');
        }
    }

    /*Controller grande section*/ 

    public function grandesection()
    {
        $grandesection = DB::table('grandes')
            ->orderBy('nom')
            ->get();
        return view('classes.grandesection', compact('grandesection'));
    }

    public function insertgrandes(Request $request)
    {
        try {
            // Récupération des données
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

            // Vérification des doublons
            $existingPetites = DB::table('grandes')
                ->where('matricule', $matricule)
                ->first();

            if ($existingPetites) {
                return redirect()->back()->with('error', 'Cet Eleve est déjà inscrit avec ce matricule.');
            }
            // Préparation des données à insérer
            $data = [
                'nom' => $nom,
                'sexe' => $sexe,
                'age' => $age,
                'statut' => $statut,
                'prenom' => $prenom,
                'orphelin' => $orphelin,
                'matricule' => $matricule,
                'datenaissance' => $datenaissance,
                'lieunaissance' => $lieunaissance,
                'numeroparent' => $numeroparent,
                'adresse' => $adresse,
                'etat' => $etat,
                'created_at' => now(), // Remplit created_at avec l'heure actuelle
            ];

            // Insertion dans la base de données
            DB::table('grandes')->insert($data);
            return redirect()->back()->with('status', 'Eleve Inscrit avec succès.');
        } catch (\Exception $e) {
            // Traitement des erreurs inattendues
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }

    public function updategrandes(Request $request)
    {
        try {
            //recuperation des personnels
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

         
        } catch (\Exception $e) {
            //traitement des erreurs innattendues
            return redirect()->back()->with('error', 'une erreur s\'est produite:' . $e->getMessage());
        }
        //preparation des donnees update 
        $data = [
            'nom' => $nom,
            'sexe' => $sexe,
            'age' => $age,
            'statut' => $statut,
            'prenom' => $prenom,
            'orphelin' => $orphelin,
            'matricule' => $matricule,
            'datenaissance' => $datenaissance,
            'lieunaissance' => $lieunaissance,
            'numeroparent' => $numeroparent,
            'adresse' => $adresse,
            'etat' => $etat,
            'created_at' => now(), // Remplit created_at avec l'heure actuelle
        ];

        DB::table('grandes')->where('grandeID', $request->input('grandeID'))->update($data);

        return redirect()->back()->with('status', 'ELeve Modifier avec succès.');
    }

    public function filtregrandes(Request $request)
    {
        $nom = $request->input('nom');

        $grandesection = DB::table('grandes')
            ->where('nom', $nom)
            ->orderBy('nom')
            ->get();
            return view('classes.grandesection',compact('grandesection'));
    }

    public function deletegrandes($grandeID)
    {
        $grandeID = (int) $grandeID;

        if ($grandeID > 0) {
            DB::table('grandes')->where('grandeID', $grandeID)->delete();
            return redirect()->back()->with('status', 'Eleve Supprimer avec success');
        } else {
            return redirect()->back()->with('error', 'Eleve echec de suppression');
        }
    }

    /*Controller grande section*/ 
    public function sil()
    {
        $sil = DB::table('sil')
            ->orderBy('nom')
            ->get();
        return view('classes.sil', compact('sil'));
    }

    public function insertsil(Request $request)
    {
        try {
            // Récupération des données
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

            // Vérification des doublons
            $existingPetites = DB::table('sil')
                ->where('matricule', $matricule)
                ->first();

            if ($existingPetites) {
                return redirect()->back()->with('error', 'Cet Eleve est déjà inscrit avec ce matricule.');
            }
            // Préparation des données à insérer
            $data = [
                'nom' => $nom,
                'sexe' => $sexe,
                'age' => $age,
                'statut' => $statut,
                'prenom' => $prenom,
                'orphelin' => $orphelin,
                'matricule' => $matricule,
                'datenaissance' => $datenaissance,
                'lieunaissance' => $lieunaissance,
                'numeroparent' => $numeroparent,
                'adresse' => $adresse,
                'etat' => $etat,
                'created_at' => now(), // Remplit created_at avec l'heure actuelle
            ];

            // Insertion dans la base de données
            DB::table('sil')->insert($data);
            return redirect()->back()->with('status', 'Eleve Inscrit avec succès.');
        } catch (\Exception $e) {
            // Traitement des erreurs inattendues
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }

    public function updatesil(Request $request)
    {
        try {
            //recuperation des personnels
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

         
        } catch (\Exception $e) {
            //traitement des erreurs innattendues
            return redirect()->back()->with('error', 'une erreur s\'est produite:' . $e->getMessage());
        }
        //preparation des donnees update 
        $data = [
            'nom' => $nom,
            'sexe' => $sexe,
            'age' => $age,
            'statut' => $statut,
            'prenom' => $prenom,
            'orphelin' => $orphelin,
            'matricule' => $matricule,
            'datenaissance' => $datenaissance,
            'lieunaissance' => $lieunaissance,
            'numeroparent' => $numeroparent,
            'adresse' => $adresse,
            'etat' => $etat,
            'created_at' => now(), // Remplit created_at avec l'heure actuelle
        ];

        DB::table('sil')->where('silID', $request->input('silID'))->update($data);

        return redirect()->back()->with('status', 'ELeve Modifier avec succès.');
    }

    public function filtresil(Request $request)
    {
        $nom = $request->input('nom');

        $sil = DB::table('sil')
            ->where('nom', $nom)
            ->orderBy('nom')
            ->get();
            return view('classes.sil',compact('sil'));
    }

    public function deletesil($silID)
    {
        $silID = (int) $silID;

        if ($silID > 0) {
            DB::table('sil')->where('silID', $silID)->delete();
            return redirect()->back()->with('status', 'Eleve Supprimer avec success');
        } else {
            return redirect()->back()->with('error', 'Eleve echec de suppression');
        }
    }

    /*Controller grande section*/ 
    public function cp()
    {
        $cp = DB::table('cp')
            ->orderBy('nom')
            ->get();
        return view('classes.cp',compact('cp'));
    }

    public function insertcp(Request $request)
    {
        try {
            // Récupération des données
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

            // Vérification des doublons
            $existingPetites = DB::table('cp')
                ->where('matricule', $matricule)
                ->first();

            if ($existingPetites) {
                return redirect()->back()->with('error', 'Cet Eleve est déjà inscrit avec ce matricule.');
            }
            // Préparation des données à insérer
            $data = [
                'nom' => $nom,
                'sexe' => $sexe,
                'age' => $age,
                'statut' => $statut,
                'prenom' => $prenom,
                'orphelin' => $orphelin,
                'matricule' => $matricule,
                'datenaissance' => $datenaissance,
                'lieunaissance' => $lieunaissance,
                'numeroparent' => $numeroparent,
                'adresse' => $adresse,
                'etat' => $etat,
                'created_at' => now(), // Remplit created_at avec l'heure actuelle
            ];

            // Insertion dans la base de données
            DB::table('cp')->insert($data);
            return redirect()->back()->with('status', 'Eleve Inscrit avec succès.');
        } catch (\Exception $e) {
            // Traitement des erreurs inattendues
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }

    public function updatecp(Request $request)
    {
        try {
            //recuperation des personnels
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

         
        } catch (\Exception $e) {
            //traitement des erreurs innattendues
            return redirect()->back()->with('error', 'une erreur s\'est produite:' . $e->getMessage());
        }
        //preparation des donnees update 
        $data = [
            'nom' => $nom,
            'sexe' => $sexe,
            'age' => $age,
            'statut' => $statut,
            'prenom' => $prenom,
            'orphelin' => $orphelin,
            'matricule' => $matricule,
            'datenaissance' => $datenaissance,
            'lieunaissance' => $lieunaissance,
            'numeroparent' => $numeroparent,
            'adresse' => $adresse,
            'etat' => $etat,
            'created_at' => now(), // Remplit created_at avec l'heure actuelle
        ];

        DB::table('cp')->where('cpID', $request->input('cpID'))->update($data);

        return redirect()->back()->with('status', 'ELeve Modifier avec succès.');
    }

    public function filtrecp(Request $request)
    {
        $nom = $request->input('nom');

        $cp = DB::table('cp')
            ->where('nom', $nom)
            ->orderBy('nom')
            ->get();
            return view('classes.cp',compact('cp'));
    }

    public function deletecp($cpID)
    {
        $cpID = (int) $cpID;

        if ($cpID > 0) {
            DB::table('cp')->where('cpID', $cpID)->delete();
            return redirect()->back()->with('status', 'Eleve Supprimer avec success');
        } else {
            return redirect()->back()->with('error', 'Eleve echec de suppression');
        }
    }

    /*Controller  ce1*/ 
    public function ce1()
    {
        $ce1 = DB::table('ce1')
            ->orderBy('nom')
            ->get();
        return view('classes.ce1',compact('ce1'));
    }

    public function insertce1(Request $request)
    {
        try {
            // Récupération des données
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

            // Vérification des doublons
            $existingPetites = DB::table('ce1')
                ->where('matricule', $matricule)
                ->first();

            if ($existingPetites) {
                return redirect()->back()->with('error', 'Cet Eleve est déjà inscrit avec ce matricule.');
            }
            // Préparation des données à insérer
            $data = [
                'nom' => $nom,
                'sexe' => $sexe,
                'age' => $age,
                'statut' => $statut,
                'prenom' => $prenom,
                'orphelin' => $orphelin,
                'matricule' => $matricule,
                'datenaissance' => $datenaissance,
                'lieunaissance' => $lieunaissance,
                'numeroparent' => $numeroparent,
                'adresse' => $adresse,
                'etat' => $etat,
                'created_at' => now(), // Remplit created_at avec l'heure actuelle
            ];

            // Insertion dans la base de données
            DB::table('ce1')->insert($data);
            return redirect()->back()->with('status', 'Eleve Inscrit avec succès.');
        } catch (\Exception $e) {
            // Traitement des erreurs inattendues
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }

    public function updatece1(Request $request)
    {
        try {
            //recuperation des personnels
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

         
        } catch (\Exception $e) {
            //traitement des erreurs innattendues
            return redirect()->back()->with('error', 'une erreur s\'est produite:' . $e->getMessage());
        }
        //preparation des donnees update 
        $data = [
            'nom' => $nom,
            'sexe' => $sexe,
            'age' => $age,
            'statut' => $statut,
            'prenom' => $prenom,
            'orphelin' => $orphelin,
            'matricule' => $matricule,
            'datenaissance' => $datenaissance,
            'lieunaissance' => $lieunaissance,
            'numeroparent' => $numeroparent,
            'adresse' => $adresse,
            'etat' => $etat,
            'created_at' => now(), // Remplit created_at avec l'heure actuelle
        ];

        DB::table('ce1')->where('ce1ID', $request->input('ce1ID'))->update($data);

        return redirect()->back()->with('status', 'ELeve Modifier avec succès.');
    }

    public function filtrece1(Request $request)
    {
        $nom = $request->input('nom');

        $ce1 = DB::table('ce1')
            ->where('nom', $nom)
            ->orderBy('nom')
            ->get();
            return view('classes.ce1',compact('ce1'));
    }

    public function deletece1($ce1ID)
    {
        $ce1ID = (int) $ce1ID;

        if ($ce1ID > 0) {
            DB::table('ce1')->where('ce1ID', $ce1ID)->delete();
            return redirect()->back()->with('status', 'Eleve Supprimer avec success');
        } else {
            return redirect()->back()->with('error', 'Eleve echec de suppression');
        }
    }

    /*Controller CE2*/ 
    public function ce2()
    {
        $ce2 = DB::table('ce2')
            ->orderBy('nom')
            ->get();
        return view('classes.ce2',compact('ce2'));
    }

    public function insertce2(Request $request)
    {
        try {
            // Récupération des données
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

            // Vérification des doublons
            $existingPetites = DB::table('ce2')
                ->where('matricule', $matricule)
                ->first();

            if ($existingPetites) {
                return redirect()->back()->with('error', 'Cet Eleve est déjà inscrit avec ce matricule.');
            }
            // Préparation des données à insérer
            $data = [
                'nom' => $nom,
                'sexe' => $sexe,
                'age' => $age,
                'statut' => $statut,
                'prenom' => $prenom,
                'orphelin' => $orphelin,
                'matricule' => $matricule,
                'datenaissance' => $datenaissance,
                'lieunaissance' => $lieunaissance,
                'numeroparent' => $numeroparent,
                'adresse' => $adresse,
                'etat' => $etat,
                'created_at' => now(), // Remplit created_at avec l'heure actuelle
            ];

            // Insertion dans la base de données
            DB::table('ce2')->insert($data);
            return redirect()->back()->with('status', 'Eleve Inscrit avec succès.');
        } catch (\Exception $e) {
            // Traitement des erreurs inattendues
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }

    public function updatece2(Request $request)
    {
        try {
            //recuperation des personnels
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

         
        } catch (\Exception $e) {
            //traitement des erreurs innattendues
            return redirect()->back()->with('error', 'une erreur s\'est produite:' . $e->getMessage());
        }
        //preparation des donnees update 
        $data = [
            'nom' => $nom,
            'sexe' => $sexe,
            'age' => $age,
            'statut' => $statut,
            'prenom' => $prenom,
            'orphelin' => $orphelin,
            'matricule' => $matricule,
            'datenaissance' => $datenaissance,
            'lieunaissance' => $lieunaissance,
            'numeroparent' => $numeroparent,
            'adresse' => $adresse,
            'etat' => $etat,
            'created_at' => now(), // Remplit created_at avec l'heure actuelle
        ];

        DB::table('ce2')->where('ce2ID', $request->input('ce2ID'))->update($data);

        return redirect()->back()->with('status', 'ELeve Modifier avec succès.');
    }

    public function filtrece2(Request $request)
    {
        $nom = $request->input('nom');

        $ce1 = DB::table('ce1')
            ->where('nom', $nom)
            ->orderBy('nom')
            ->get();
            return view('classes.ce1',compact('ce1'));
    }

    public function deletece2($ce2ID)
    {
        $ce2ID = (int) $ce2ID;

        if ($ce2ID > 0) {
            DB::table('ce2')->where('ce2ID', $ce2ID)->delete();
            return redirect()->back()->with('status', 'Eleve Supprimer avec success');
        } else {
            return redirect()->back()->with('error', 'Eleve echec de suppression');
        }
    }

    /*Controller CM1*/ 
    public function cm1()
    {
        $cm1 = DB::table('cm1')
            ->orderBy('nom')
            ->get();
        return view('classes.cm1',compact('cm1'));
    }

    public function insertcm1(Request $request)
    {
        try {
            // Récupération des données
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

            // Vérification des doublons
            $existingPetites = DB::table('cm1')
                ->where('matricule', $matricule)
                ->first();

            if ($existingPetites) {
                return redirect()->back()->with('error', 'Cet Eleve est déjà inscrit avec ce matricule.');
            }
            // Préparation des données à insérer
            $data = [
                'nom' => $nom,
                'sexe' => $sexe,
                'age' => $age,
                'statut' => $statut,
                'prenom' => $prenom,
                'orphelin' => $orphelin,
                'matricule' => $matricule,
                'datenaissance' => $datenaissance,
                'lieunaissance' => $lieunaissance,
                'numeroparent' => $numeroparent,
                'adresse' => $adresse,
                'etat' => $etat,
                'created_at' => now(), // Remplit created_at avec l'heure actuelle
            ];

            // Insertion dans la base de données
            DB::table('cm1')->insert($data);
            return redirect()->back()->with('status', 'Eleve Inscrit avec succès.');
        } catch (\Exception $e) {
            // Traitement des erreurs inattendues
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }

    public function updatecm1(Request $request)
    {
        try {
            //recuperation des personnels
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

         
        } catch (\Exception $e) {
            //traitement des erreurs innattendues
            return redirect()->back()->with('error', 'une erreur s\'est produite:' . $e->getMessage());
        }
        //preparation des donnees update 
        $data = [
            'nom' => $nom,
            'sexe' => $sexe,
            'age' => $age,
            'statut' => $statut,
            'prenom' => $prenom,
            'orphelin' => $orphelin,
            'matricule' => $matricule,
            'datenaissance' => $datenaissance,
            'lieunaissance' => $lieunaissance,
            'numeroparent' => $numeroparent,
            'adresse' => $adresse,
            'etat' => $etat,
            'created_at' => now(), // Remplit created_at avec l'heure actuelle
        ];

        DB::table('cm1')->where('cm1ID', $request->input('cm1ID'))->update($data);

        return redirect()->back()->with('status', 'ELeve Modifier avec succès.');
    }

    public function filtrecm1(Request $request)
    {
        $nom = $request->input('nom');

        $cm1 = DB::table('cm1')
            ->where('nom', $nom)
            ->orderBy('nom')
            ->get();
            return view('classes.cm1',compact('cm1'));
    }

    public function deletecm1($cm1ID)
    {
        $cm1ID = (int) $cm1ID;

        if ($cm1ID > 0) {
            DB::table('cm1')->where('cm1ID', $cm1ID)->delete();
            return redirect()->back()->with('status', 'Eleve Supprimer avec success');
        } else {
            return redirect()->back()->with('error', 'Eleve echec de suppression');
        }
    }

    /*Controller CM1*/ 
    public function cm2()
    {
        $cm2 = DB::table('cm2')
            ->orderBy('nom')
            ->get();
        return view('classes.cm2',compact('cm2'));
    }

    public function insertcm2(Request $request)
    {
        try {
            // Récupération des données
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

            // Vérification des doublons
            $existingPetites = DB::table('cm2')
                ->where('matricule', $matricule)
                ->first();

            if ($existingPetites) {
                return redirect()->back()->with('error', 'Cet Eleve est déjà inscrit avec ce matricule.');
            }
            // Préparation des données à insérer
            $data = [
                'nom' => $nom,
                'sexe' => $sexe,
                'age' => $age,
                'statut' => $statut,
                'prenom' => $prenom,
                'orphelin' => $orphelin,
                'matricule' => $matricule,
                'datenaissance' => $datenaissance,
                'lieunaissance' => $lieunaissance,
                'numeroparent' => $numeroparent,
                'adresse' => $adresse,
                'etat' => $etat,
                'created_at' => now(), // Remplit created_at avec l'heure actuelle
            ];

            // Insertion dans la base de données
            DB::table('cm2')->insert($data);
            return redirect()->back()->with('status', 'Eleve Inscrit avec succès.');
        } catch (\Exception $e) {
            // Traitement des erreurs inattendues
            return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
        }
    }

    public function updatecm2(Request $request)
    {
        try {
            //recuperation des personnels
            $nom = $request->input('nom');
            $sexe = $request->input('sexe');
            $age = $request->input('age');
            $statut = $request->input('statut');
            $prenom = $request->input('prenom');
            $orphelin = $request->input('orphelin');
            $matricule = $request->input('matricule');
            $datenaissance = $request->input('datenaissance');
            $lieunaissance = $request->input('lieunaissance');
            $numeroparent = $request->input('numeroparent');
            $adresse = $request->input('adresse');
            $etat = $request->input('etat');

         
        } catch (\Exception $e) {
            //traitement des erreurs innattendues
            return redirect()->back()->with('error', 'une erreur s\'est produite:' . $e->getMessage());
        }
        //preparation des donnees update 
        $data = [
            'nom' => $nom,
            'sexe' => $sexe,
            'age' => $age,
            'statut' => $statut,
            'prenom' => $prenom,
            'orphelin' => $orphelin,
            'matricule' => $matricule,
            'datenaissance' => $datenaissance,
            'lieunaissance' => $lieunaissance,
            'numeroparent' => $numeroparent,
            'adresse' => $adresse,
            'etat' => $etat,
            'created_at' => now(), // Remplit created_at avec l'heure actuelle
        ];

        DB::table('cm2')->where('cm2ID', $request->input('cm2ID'))->update($data);

        return redirect()->back()->with('status', 'ELeve Modifier avec succès.');
    }

    public function filtrecm2(Request $request)
    {
        $nom = $request->input('nom');

        $cm2 = DB::table('cm2')
            ->where('nom', $nom)
            ->orderBy('nom')
            ->get();
            return view('classes.cm2',compact('cm2'));
    }

    public function deletecm2($cm2ID)
    {
        $cm2ID = (int) $cm2ID;

        if ($cm2ID > 0) {
            DB::table('cm2')->where('cm2ID', $cm2ID)->delete();
            return redirect()->back()->with('status', 'Eleve Supprimer avec success');
        } else {
            return redirect()->back()->with('error', 'Eleve echec de suppression');
        }
    }


}
