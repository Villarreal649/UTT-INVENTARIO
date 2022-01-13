<?php

namespace App\Http\Controllers;

use App\Models\Resguardo;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\Area;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
/**
 * Class ResguardoController
 * @package App\Http\Controllers
 */
class ResguardoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-resguardo|crear-resguardo|editar-resguardo|borrar-resguardo',['only'=>['index']]);
        $this->middleware('permission:crear-resguardo',['only'=>['create','store']]);
        $this->middleware('permission:editar-resguardo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-resguardo',['only'=>['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       abort_if(Gate::denies('resguardo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resguardo = Resguardo::with('productos')->get();
            $resguardos = Resguardo::paginate();

            return view('resguardo.index', compact('resguardos'))
                ->with('i', (request()->input('page', 1) - 1) * $resguardos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('resguardo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $now = Carbon::now();
        $resguardo = new Resguardo();
        $productos = Producto::all();
        $users = User::pluck('name','id');
        $areas = Area::pluck('name','id');
        return view('resguardo.create', compact('productos','resguardo','users','areas','now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resguardo = Resguardo::create($request->all());

        $productos = $request->input('productos', []);
        $quantities = $request->input('quantities', []);
        for ($producto=0; $producto < count($productos); $producto++) {
            if ($productos[$producto] != '') {
                $resguardo->productos()->attach($productos[$producto], ['quantity' => $quantities[$producto]]);
            }
        }

        return redirect()->route('resguardos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Resguardo $resguardo)
    {
        abort_if(Gate::denies('resguardo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resguardo->load('productos');

        return view('resguardo.show', compact('resguardo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Resguardo $resguardo)
    {
        abort_if(Gate::denies('resguardo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productos = Producto::all();
        $users = User::pluck('name','id');
        $areas = Area::pluck('name','id');

        $resguardo->load('productos');

        return view('resguardo.edit', compact('productos', 'resguardo', 'users','areas',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Resguardo $resguardo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resguardo $resguardo)
    {
        $resguardo->update($request->all());

        $resguardo->productos()->detach();
        $productos = $request->input('productos', []);
        $quantities = $request->input('quantities', []);
        for ($producto=0; $producto < count($productos); $producto++) {
            if ($productos[$producto] != '') {
                $resguardo->productos()->attach($productos[$producto], ['quantity' => $quantities[$producto]]);
            }
        }

        return redirect()->route('resguardos.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Resguardo $resguardo)
    {
        abort_if(Gate::denies('resguardo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resguardo->delete();

        return back();
    }
    public function massDestroy(Request $request)
    {
        Resguardo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
