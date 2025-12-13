<?php

namespace App\Http\Controllers;

use App\Http\Resources\SalaResource;
use App\Models\Reserva;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{


    public function index(){
        //Mostrar todas las reservas del usuario logueado
        $user = auth()->user();
        $reservas = $user->reservas;

        return view('reservas.index', compact('reservas', 'user'));
    }

    /**
     * Mostrar formulario para crear una nueva reserva
     */
    public function new(){
        return view('reservas.new');
    }

    /**
     * Almacenar nueva reserva
     */
    public function store(Request $request){
        $sala_id = $request->input('sala_id');
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $numPersonas = $request->input('numPersonas');
        $telefono = $request->input('telefono');

        Reserva::create([ 'sala_id' => $sala_id,
            'fecha' => $fecha,
            'hora' => $hora,
            'user_id' => auth()->id(),
            'numPersonas' => $numPersonas,
            'telefono' => $telefono,
            'estado' => 'pendiente']);

        return redirect()->route('mis_reservas');
    }

    public function buscarDisponibilidad(Request $request)  {
        //Validar datos del formulario
        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'personas' => 'required|integer|min:1',
            'telefono' => 'required|string|min:9'
        ]);

        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $numPersonas = $request->input('personas');
        $telefono = $request->input('telefono');

        //Lógica para buscar disponibilidad de salas
        // Obtener todas las salas
        // capacidad - numPersona <= 2 --> dos huecos se pueden dejar en las salas
        $salas = Sala::where('capacidad', '>=', $numPersonas)
            ->where('capacidad', '<=', (2 + $numPersonas) )->get(); //SQL

        // Filtrar salas ocupadas en esa fecha y hora (SQL)
        $ocupadas = Reserva::where('fecha', $fecha)
            ->where('hora', $hora)
            ->pluck('sala_id')  // Obtener solo los IDs de las salas ocupadas
            ->toArray();

        // Salas libres
        $libres = $salas->whereNotIn('id', $ocupadas); // No SQL, se trabaja en memoria

        return view('reservas.search', compact('libres', 'telefono','fecha', 'hora', 'numPersonas'));
    }

    public function cancelar($reserva) {
        $reserva = Reserva::findOrFail($reserva);

        //Verificar que la reserva pertenece al usuario logueado
        if (!auth()->user()->admin){
            if ($reserva->user_id != auth()->id()) {
                abort(403);
            }
        }

        $reserva->estado = 'cancelada';
        $reserva->save();

        if (auth()->user()->admin){
            return redirect()->route('reservas.pendientes');
        } else{
            return redirect()->route('mis_reservas');
        }

    }

    public function pendientes(){
        $reservas = Reserva::where('fecha', '>=', now()->toDateString())->get();

        return view('reservas.pendientes', compact('reservas'));
    }

    public function filtrar(Request $request){
        $fecha = $request->input('fecha');
        $estado = $request->input('estado');

        if ($estado == 'todas'){
            $estados = ['pendiente','confirmada','cancelada'];

            $reservas = Reserva::where('fecha', '=', $fecha)->
            whereIn('estado', $estados)->get();
        } else{
            $reservas = Reserva::where('fecha', '=', $fecha)->
            where('estado', '=', $estado)->get();
        }
        return view('reservas.pendientes', compact('reservas'));
    }

    public function confirmar($reserva) {
        $reserva = Reserva::findOrFail($reserva);

        //Verificar que la reserva pertenece al usuario logueado
        if (!auth()->user()->admin){
                abort(403);
        }
        if ($reserva->estado == 'pendiente'){
            $reserva->estado = 'confirmada';
            $reserva->save();
        }

        if (auth()->user()->admin){
            return redirect()->route('reservas.pendientes');
        }

    }

    ///////////////////////////////////////////////////////////////////////
    /// API
    ///////////////////////////////////////////////////////////////////////

    public function apiNewReserva(Request $request){
        $sala_id = $request->input('sala_id');
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $numPersonas = $request->input('numPersonas');
        $telefono = $request->input('telefono');
        $user_id = auth()->user()->id;

        //Comprobar disponibilidad de la sala
        $reservaOcupada = DB::table('reservas')->where('sala_id', $sala_id)
            ->where('fecha', $fecha)
            ->where('hora', $hora)

            ->first();

        if ($reservaOcupada){
            return response()->json(['mensaje' => 'Sala ocupada o no disponible','error' => 1]);
        }

        //sala seleccionada es demasiado grande
        $sala = Sala::findOrFail($sala_id);
        if (($sala->capacidad < $numPersonas) || (($sala->capacidad - $numPersonas) > 2)) {
            return response()->json(['mensaje' => 'Tamaño de la sala incompatible','error' => 2]);
        }

        //Crear reserva
        $reserva = Reserva::create([ 'sala_id' => $sala_id,
            'fecha' => $fecha,
            'hora' => $hora,
            'user_id' => $user_id,
            'numPersonas' => $numPersonas,
            'telefono' => $telefono,
            'estado' => 'pendiente']);

        return $reserva->toResource();

    }

    //Cancelar reserva si es tuya o eres admin
    public function apiUpdateReserva($id){
        $reserva = Reserva::findOrFail($id);

        if (!auth()->user()->admin){
            if ($reserva->user_id != auth()->user()->id) {
                abort(403);
            }
        }


        $reserva->estado = 'cancelada';
        $reserva->save();

        return response()->json(['mensaje' => 'Reserva cancelada','reserva' => $reserva->toResource()]);
    }

    //Eliminar reserva si es tuya o eres admin
    public function apiDeleteReserva($id){
        $reserva = Reserva::findOrFail($id);

        if (!auth()->user()->admin){
            if ($reserva->user_id != auth()->user()->id) {
                abort(403);
            }
        }

        $reserva->delete();

        return response()->json(['mensaje' => 'Reserva eliminada','reserva' => $reserva->toResource()]);
    }

    public function apiGetReservaById($id){
        $reserva = Reserva::findorFail($id);

        if ($reserva->user_id == auth()->id()){
            return $reserva->toResource();
        } else{
            abort(403);
        }
    }

    public function apiGetReservasUser(){
        return Reserva::where('user_id','=', auth()->id())->get()->toResourceCollection();

    }

    public function apiGetReservasAdmin(){
        if (auth()->user()->admin){
            return Reserva::all()->toResourceCollection();
        } else{
            abort(401);
        }
    }

    public function apiGetSalaById($id){
        return Sala::findorFail($id)->toResource();

    }

    public function apiGetSalas(){
        return SalaResource::collection(Sala::all());

    }

}
