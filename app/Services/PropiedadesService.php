<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\PropiedadesModel;
use App\EmpresasModel;
use Illuminate\Support\Facades\Auth;

class PropiedadesService{
    public function generar_propiedades(){
        $empresas = EmpresasModel::all();
        foreach ($empresas as $empresa) {
            $propiedad = new PropiedadesModel();
            $propiedad->id_empresa = $empresa->id;
            $propiedad->name = $empresa->name;
            $propiedad->email = $empresa->email;
            $propiedad->direccion = $empresa->direccion;
            $propiedad->ciudad = $empresa->ciudad;
            $propiedad->codigo_postal = $empresa->codigo_postal;
            $propiedad->telefono = $empresa->telefono;
            $propiedad->contacto = $empresa->contacto;
            $propiedad->datos_factura = $empresa->datos_factura;
            $propiedad->status = $empresa->status;
            $propiedad->save();
        }
    }
    public function edit($request,$id){
        $propiedad=PropiedadesModel::where('id','=',$id)->first();
        $propiedad->name = $request->nombre_edit;
        $propiedad->distancia = explode('kms', $request->distancia_edit)[0] ?? null;
        $propiedad->categoria = $request->categoria_edit;
        $propiedad->yrs_edificio = $request->yrs_edificio_edit;
        $propiedad->email  = $request->email_edit;
        $propiedad->comentarios = $request->datos_factura_edit;
        $propiedad->direccion = $request->direccion_edit;
        $propiedad->contacto = $request->contacto_edit;
        $propiedad->telefono = $request->telefono_edit;
        $propiedad->codigo_postal = $request->codigo_postal_edit;
        $propiedad->ciudad = $request->ciudad_edit;
        $propiedad->estado = $request->estado_edit;
        $propiedad->estatus = $request->estatus_edit;
        $propiedad->cliente = $request->cliente_edit;
        if ($propiedad->update()) {
            return true;
        }
    }
    public function store($request,$id_empresa){
        $new_propiedad = new PropiedadesModel();
        $new_propiedad->name = $request->nombre;
        // $new_propiedad->id_cliente =NULL;
        $new_propiedad->id_empresa = Auth::user()->id_empresa;
        $new_propiedad->distancia = explode('kms', $request->distancia)[0] ?? null;
        $new_propiedad->categoria = $request->categoria;
        $new_propiedad->yrs_edificio = $request->yrs_edificio;
        $new_propiedad->email  = $request->email;
        $new_propiedad->comentarios = $request->datos_factura;
        $new_propiedad->direccion = $request->direccion;
        $new_propiedad->contacto = $request->contacto;
        $new_propiedad->telefono = $request->telefono;
        $new_propiedad->codigo_postal = $request->codigo_postal;
        $new_propiedad->ciudad = $request->ciudad;
        $new_propiedad->estado = $request->estado;
        $new_propiedad->estatus = $request->estatus;
        $new_propiedad->cliente = $request->cliente;
        $new_propiedad->save();
        if($new_propiedad->save()){
            return true;
        }
    }
    public function get_id_propiedad_by_id_empresa($id_empresa){
        $propiedad = PropiedadesModel::where('id_empresa', $id_empresa)->first();
        return $propiedad ? $propiedad->id : null;
    }
    public function delete($id){
        $del_propiedad = PropiedadesModel::find($id);
        $del_propiedad->delete();
    }
}
