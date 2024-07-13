<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('type_id')) {
            $typeIds = $request->query('type_id');
            if (!is_array($typeIds)) {
                $typeIds = [$typeIds];
            }

            // whereHas per filtrare i ristoranti in base a relazione (alle tipologie, contenute in typeIds che ho impostato sempre come array)
            // whereHas accetta una callback come primo parametro e una condizione come secondo parametro.
            // la condizione è costituita da tre elementi: colonna utilizzata (di default è quella principale della relazione, qui types), operatore (qui specifico '=') e il valore (qui count($typeIds))
            $restaurants = Restaurant::whereHas('types',
            // funzione di callback per definire ulteriori filtri sulla relazione
            function ($query) use ($typeIds) {
                // whereIn per cercare ristoranti che abbiano tipologie con type_id presenti in typeIds
                $query->whereIn('type_id', $typeIds);},
                // operatore di confronto: voglio assicurarmi che i risultati abbiano esattamente il numero di filtri/tipologie passati
                '=',
                // conto quanti elementi ci sono in typeIds
                count($typeIds))

                //RIASSUNTO: la callback (function ($query) use ($typeIds)) prima filtra i ristoranti in base agli id delle tipologie contenuti in typeIds. Poi applica anche una verifica: passa solo i risultati filtrati il cui numero di tipologie è uguale a count(typeIds)
            ->with('products', 'types')->get();
        } else {
            $restaurants = Restaurant::with('products', 'types')->get();
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Ok',
            'results' => $restaurants
        ], 200);
    }
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)
        ->with(['products' => function ($query) {
            $query->where('visible', 1);
        },'types'])
        ->first();
        if($restaurant){
            return response()->json([
                'status' => 'success',
                'message' => 'OK',
                'results' => $restaurant
            ],200);
        } else {
            return response()->json([
                'status' => 'error',	
                'message' => 'Error'
            ],404);
        }
    }
}