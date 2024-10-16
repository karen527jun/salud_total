<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CtlSignoVital;
use App\Models\MntSignoVitalRegistrado;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class MntSignoVitalRegistradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // dd(json_encode($request->user()));
            $signos = MntSignoVitalRegistrado::where('id_paciente', $request->user()->paciente->id)->get();
            return response()->json([
                'data'=>$signos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // dd(json_encode($request->user()->paciente->id));
            $signo = MntSignoVitalRegistrado::create(
                [
                    'id_paciente'=>$request->user()->paciente->id,
                    'presion_sistolica'=>$request->presion_sistolica,
                    'presion_diastolica'=>$request->presion_diastolica,
                    'frecuencia_respiratoria'=>$request->frecuencia_respiratoria,
                    'temperatura_farenheit'=>$request->temperatura_farenheit,
                    'temperatura_centigrados'=>$request->temperatura_centigrados,
                    'pulso'=>$request->pulso,
                    'oxigeno_en_la_sangre'=>$request->oxigeno_en_la_sangre,
                ]
                );
                DB::commit();
                return response()->json([
                    'data'=>$signo
                ]);
        } catch (\Exception $e) {
            return response()->json([
                'error'=>$e->getMessage()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
