<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\TipoArticulo;
use App\Models\UnidadMedida;
use App\Models\ClaseArticulo;
use App\Models\Marca;
use App\Models\Proveedor;

class ArticuloController extends Controller
{
    public function index(){
        $articulos = Articulo::all();
        return view('articulos.index', compact('articulos'));
    }

    public function create(){
        $tiposArticulo = TipoArticulo::all();
        $unidadesMedida = UnidadMedida::all();
        $clasesArticulo = ClaseArticulo::all();
        $marcas = Marca::all();
        $proveedores = Proveedor::all();
        return view('articulos.create', compact('tiposArticulo', 'unidadesMedida', 'clasesArticulo', 'marcas', 'proveedores'));
    }

    public function store(Request $request){
        try {
          
            $articulo = new Articulo();
            $articulo->sku = $request->sku;
            $articulo->descripcion = $request->descripcion;
            $articulo->tipo_articulo_id = $request->tipo_articulo_id;
            $articulo->unidad_medida_id = $request->unidad_medida_id;
            $articulo->clase_articulo_id = $request->clase_articulo_id;
            $articulo->marca_id = $request->marca_id;
            $articulo->proveedor_id = $request->proveedor_id;
            $articulo->precio_compra = $request->precio_compra;
            $articulo->precio_venta = $request->precio_venta;

            $imagen = $request->file('imagen');
            $nombreImage = time().'.'.$imagen->getClientOriginalExtension();
            $rutaImagen = public_path('pic_articulos/' . $nombreImage);
            $imagen->move(public_path('pic_articulos'), $nombreImage);

            $articulo->imagen = 'pic_articulos/' . $nombreImage;
            $articulo->save();

            return redirect()->route('articulos.index')->with('success', 'Artículo creado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function edit($id){
        $articulo = Articulo::find($id);
        $tiposArticulo = TipoArticulo::all();
        $unidadesMedida = UnidadMedida::all();
        $clasesArticulo = ClaseArticulo::all();
        $marcas = Marca::all();
        $proveedores = Proveedor::all();
        return view('articulos.edit', compact('articulo', 'tiposArticulo', 'unidadesMedida', 'clasesArticulo', 'marcas', 'proveedores'));
    }

    public function update(Request $request, $id){
        try {
           
            $articulo = Articulo::find($id);
            $articulo->sku = $request->sku;
            $articulo->descripcion = $request->descripcion;
            $articulo->tipo_articulo_id = $request->tipo_articulo_id;
            $articulo->unidad_medida_id = $request->unidad_medida_id;
            $articulo->clase_articulo_id = $request->clase_articulo_id;
            $articulo->marca_id = $request->marca_id;
            $articulo->proveedor_id = $request->proveedor_id;
            $articulo->precio_compra = $request->precio_compra;
            $articulo->precio_venta = $request->precio_venta;
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
                $rutaImagen = public_path('pic_articulos/' . $nombreImagen);
                $imagen->move(public_path('pic_articulos'), $nombreImagen);
                $articulo->imagen = 'pic_articulos/' . $nombreImagen;
            }
            $articulo->save();

            return redirect()->route('articulos.index')->with('success', 'Artículo actualizado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }

    public function destroy($id){
        try {
            Articulo::destroy($id);
            return redirect()->route('articulos.index')->with('success', 'Artículo borrado correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Algo salió mal, intenta de nuevo.');
        }
    }
}
