<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User; 
use App\Models\Area;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
/**
 * Class PrestamoController
 * @package App\Http\Controllers
 */
class PrestamoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-prestamo|crear-prestamo|editar-prestamo|borrar-modelo',['only'=>['index']]);
        $this->middleware('permission:crear-prestamo',['only'=>['create','store']]);
        $this->middleware('permission:editar-prestamo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-prestamo',['only'=>['destroy']]);

    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('prestamo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prestamo = Prestamo::with('productos')->get();
            $prestamos = Prestamo::paginate();

            return view('prestamo.index', compact('prestamos'))
                ->with('i', (request()->input('page', 1) - 1) * $prestamos->perPage());
    }

    public function create()
    {
        abort_if(Gate::denies('prestamo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $now = Carbon::now();
        $prestamo = new Prestamo();
        $productos = Producto::all();
        $users = User::pluck('name','id');
        $areas = Area::pluck('name','id');

        return view('prestamo.create', compact('productos', 'prestamo', 'users','areas','now'));
    }

    public function store(Request $request)
    {
        $prestamo = Prestamo::create($request->all());

        $productos = $request->input('productos', []);
        $quantities = $request->input('quantities', []);
        for ($producto=0; $producto < count($productos); $producto++) {
            if ($productos[$producto] != '') {
                $prestamo->productos()->attach($productos[$producto], ['quantity' => $quantities[$producto]]);
            }
        }

        return redirect()->route('prestamos.index');
    }

    public function edit(Prestamo $prestamo)
    {
        abort_if(Gate::denies('prestamo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productos = Producto::all();
        $users = User::pluck('name','id');
        $areas = Area::pluck('name','id');

        $prestamo->load('productos');

        return view('prestamo.edit', compact('productos', 'prestamo', 'users','areas',));
    }

    public function update(Request $request, Prestamo $prestamo)
    {
        $prestamo->update($request->all());

        $prestamo->productos()->detach();
        $productos = $request->input('productos', []);
        $quantities = $request->input('quantities', []);
        for ($producto=0; $producto < count($productos); $producto++) {
            if ($productos[$producto] != '') {
                $prestamo->productos()->attach($productos[$producto], ['quantity' => $quantities[$producto]]);
            }
        }

        return redirect()->route('prestamos.index');
    }

    public function show(Prestamo $prestamo)
    {
        abort_if(Gate::denies('prestamo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prestamo->load('productos');

        return view('prestamo.show', compact('prestamo'));
    }

    public function destroy(Prestamo $prestamo)
    {
        abort_if(Gate::denies('prestamo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prestamo->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Prestamo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    
}