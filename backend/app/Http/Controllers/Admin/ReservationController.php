<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AccepteEmail;
use App\Mail\RefuseEmail;
use App\Models\Etudiant;
use App\Models\Logement;
use App\Models\Reservation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    
    public function getAllReservation(Request $request)
    {
        if ($request->status == 'enattend') {
            $data = Reservation::where('status', 'en attend')->with('etudiant', 'logement')->orderBy('created_at', 'desc')->get();
        } elseif ($request->status == 'refuser') {
            $data = Reservation::where('status', 'refuser')->with('etudiant', 'logement')->orderBy('created_at', 'desc')->get();
        } elseif ($request->status == 'accepter') {
            $data = Reservation::where('status', 'accepter')->with('etudiant', 'logement')->orderBy('created_at', 'desc')->get();
        } else {
            $data = Reservation::with('etudiant', 'logement')->orderBy('created_at', 'desc')->get();
        }
        $dataRes =  $data->map(function ($items) {
            return [
                "id" => $items->id,
                "noms" => $items->etudiant->nom . ' ' . $items->etudiant->prenom,
                "status" => $items->status,
                "chambre" => ' N°: ' . $items->logement->num_logement . ' ' . $items->logement->type_logement,
                "date_debut" => $items->date_debut,
                "date_fin" => $items->date_fin,
                "date_reserve" => $items->created_at,
                "date_confirm" => $items->updated_at,
                "email" => $items->etudiant->email,
            ];
        })->values();

        return $dataRes;
    }
    public function addReservationAction(Request $request)
    {
        $etudeRequest = [
            "matricule" => $request->matricule,
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "date_naissance" => $request->date_naissance,
            "sexe" => $request->sexe,
            "cin" => $request->cin,
            "telephone" => $request->telephone,
            "email" => $request->email,
        ];
        $etudiant = Etudiant::create($etudeRequest);
        if ($etudiant) {
            $reserveRequest = [
                'id_etudiant' => $etudiant->id,
                'id_logement' => $request->id_logement,
                'date_debut' =>  $request->date_debut,
                'date_fin' =>  $request->date_fin,
                'status' =>  'en attend',
            ];
            $reservation = Reservation::create($reserveRequest);
            if ($reservation) {
                return response()->json([
                    'reservation' => $reservation,
                    'status' => 'success',
                ]);
            }
        }
        return $etudiant;
    }


    public function validationDemande(Request $request)
    {
        $reservation = Reservation::find($request->id);
        $data = array(
            "id" => $request->id,
            "noms" => $request->noms,
            "email" => $request->email,
            "chambre" => $request->chambre,
            "date_debut" => $request->date_debut,
            "date_fin" => $request->date_fin,
            "status" => $request->status,
            "id_etudiant" => $reservation->id_etudiant
        );

        $logement = Logement::find($reservation->id_logement);
        if ($logement->status == 'occuper') {
            return response()->json([
                'status' => 'cette chambre est deja prise',
                'envoyer' => $logement,
            ]);
        }

        if ($request->status == 'accepter') {
            $resMail = $this->DemandeAccepted($data);
            if ($resMail) {
                //modification des status dans Reservation que accepter
                $res1 = $reservation->update(["status" => 'accepter']);
                //modification et ajouter le logement reserver par l'etudiant 
                $etudiant = Etudiant::find($reservation->id_etudiant);
                $res = $etudiant->update(["id_logement" => $reservation->id_logement]);
                //modification du status de logement que occuper par l'etudiant 

                $resLog = $logement->update(["status" => 'occuper']);

                if ($res1 && $res && $resLog) {
                    return response()->json([
                        'status' => 'Demande Accepter envoyer par email',
                        'envoyer' => $resLog,
                    ]);
                }
            }
        } elseif ($request->status == 'refuser') {
            $resMail = $this->DemandeRefuser($data);
            if ($resMail) {
                $res1 = $reservation->update(["status" => 'refuser']);
                if ($res1) {
                    return response()->json([
                        'status' => 'Demande refuser envoyer par email',
                        'envoyer' => $resMail,
                    ]);
                }
            }
        }
    }

    public function DemandeAccepted($array)
    {
        
        $mailData = [
            "nom" => $array['noms'] ,
            "date_debut" => $array['date_debut'] , 
            "email" => $array['email'] ,
            "link" => "http://localhost:8001/signup/" . $array['id_etudiant'],
        ];
        try {
            Mail::to($array['email'])
                ->send(new AccepteEmail($mailData));
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function DemandeRefuser($array)
    {
        $mailData = [
            "nom" => $array['noms'] ,
            "email" => $array['email'] ,
        ];
        try {
            Mail::to($array['email'])
                ->send(new RefuseEmail($mailData));
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public function countReserseStatus()
    {
        $dataReserve = Reservation::select('status')
            ->selectRaw('count(*) as nombre')
            ->groupby('status')->get();
        return $dataReserve;
    }
}
