
<div class="w-full h-full grid justify-items-center font-roboto  mt-3">

    <div  style="width:65%;" class=" h-full grid justify-items-start font-roboto gap-y-1">
        <div class="flex justify-center mr-20">
            <h1 class="subtitles-just-financiera text_blue font-bold">Spend Plan</h1> <input class="w-20 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center mx-1" id="spend_plan_porcent" name="spend_plan_porcent" onchange="change_to_porcent_mantenimiento(this.value,this.id);calcular_speendplan_base_adicional_gp(this.value);" type="text"><h1  class="subtitles-just-financiera  font-bold"> Gross Profit</h1>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-4 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text_blue text-size-adicionales font-bold">
                Materiales
            </p>
        </div>
        <div class="w-2/3 flex justify-start place-items-center gap-x-3">
            <input id="materiales_gp" name="materiales_gp" type="text" class="w-2/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
            <div class="w-full flex place-items-end gap-x-1">
                <input  id="materiales_porcent_gp" name="materiales_porcent_gp" class="w-1/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text">
            </div>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-1 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text_blue text-size-adicionales font-bold">
                Equipos
            </p>
        </div>
        <div class="w-2/3 flex justify-start place-items-center gap-x-3">
            <input id="equipos_gp" name="equipos_gp" type="text" class="w-2/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
            <div class="w-full flex place-items-end gap-x-1">
                <input id="equipos_porcent_gp" name="equipos_porcent_gp" class="w-1/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text">
            </div>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-1 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text_blue text-size-adicionales font-bold">
                Mano de Obra
            </p>
        </div>
        <div class="w-2/3 flex justify-start place-items-center gap-x-3">
            <input id="mano_obra_gp" name="mano_obra_gp" type="text" class="w-2/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
            <div class="w-full flex place-items-end gap-x-1">
                <input id="mano_obra_porcent_gp" name="mano_obra_porcent_gp" class="w-1/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text">
            </div>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-1 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text_blue text-size-adicionales font-bold">
                Vehículos
            </p>
        </div>
        <div class="w-2/3 flex justify-start place-items-center gap-x-3">
            <input  id="vehiculo_gp" name="vehiculo_gp" type="text" class="w-2/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
            <div class="w-full flex place-items-end gap-x-1">
                <input id="vehiculo_porcent_gp" name="vehiculo_porcent_gp" class="w-1/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text">
            </div>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-1 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text_blue text-size-adicionales font-bold">
                Contratista
            </p>
        </div>
        <div class="w-2/3 flex justify-start place-items-center gap-x-3">
            <input  id="contratista_gp" name="contratista_gp" type="text" class="w-2/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
            <div class="w-full flex place-items-end gap-x-1">
                <input id="contratista_porcent_gp" name="contratista_porcent_gp" class="w-1/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text">
            </div>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-1 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text_blue text-size-adicionales font-bold">
                Viaticos
            </p>
        </div>
        <div class="w-2/3 flex justify-start place-items-center gap-x-3">
            <input  id="viaticos_gp" name="viaticos_gp" type="text" class="w-2/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
            <div class="w-full flex place-items-end gap-x-1">
                <input id="viaticos_porcent_gp" name="viaticos_porcent_gp" class="w-1/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text">
            </div>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-1 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text_blue text-size-adicionales font-bold">
                Burden
            </p>
        </div>
        <div class="w-2/3 flex justify-start place-items-center gap-x-3">
            <input id="burden_gp" name="burden_gp" type="text" class="w-2/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
            <div class="w-full flex place-items-end gap-x-1">
                <input id="burden_porcent_gp" name="burden_porcent_gp" class="w-1/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text">
            </div>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex my-2 justify-center">

    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-1 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text_blue text-size-adicionales font-bold">
                G&A
            </p>
        </div>
        <div class="w-2/3 flex justify-start place-items-center gap-x-3">
            <input id="ga_gp" name="ga_gp" type="text" class="w-2/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
            <div class="w-full flex place-items-end gap-x-1">
                <input  id="ga_porcent_gp" name="ga_porcent_gp" class="w-1/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text">
            </div>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-1 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text_blue text-size-adicionales font-bold">
                Ventas
            </p>
        </div>
        <div class="w-2/3 flex justify-start place-items-center gap-x-3">
            <input id="ventas_gp" name="ventas_gp"  type="text" class="w-2/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
            <div class="w-full flex place-items-end gap-x-1">
                <input id="ventas_porcent_gp" name="ventas_porcent_gp" class="w-1/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text">
            </div>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-1 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text_blue text-size-adicionales font-bold">
                Financiamiento
            </p>
        </div>
        <div class="w-2/3 flex justify-start place-items-center gap-x-3">
            <input id="financiamiento_gp" name="financiamiento_gp" type="text" class="w-2/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
            <div class="w-full flex place-items-end gap-x-1">
                <input id="financiamiento_porcent_gp" name="financiamiento_porcent_gp" class="w-1/3 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text">
            </div>
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex py-2 justify-center">

    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-1 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text-title-costo-mantenimiento font-bold">
                Valor de Venta
            </p>
        </div>
        <div class="w-2/3 flex justify-start">
            <input  id="valor_venta_gp" name="valor_venta_gp" type="text" class="w-1/2 bg-blue-800 text-white border-2 border-color-inps text-lg rounded-md text-center py-1" type="text" >
        </div>
    </div>

    <div style="width:65%;" class="gap-x-3 flex mt-1 justify-center">
        <div class="w-1/3 grid justify-items-start place-items-center ">
            <p class="text-title-costo-mantenimiento font-bold">
                Ganancia
            </p>
        </div>
        <div class="w-2/3 flex justify-start place-items-center gap-x-3">
            <input  id="ganancia_gp" name="ganancia_gp" type="text" class="w-1/2 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text" >
            <div class="w-full flex place-items-end gap-x-1">
                <input id="ganancia_porcent_gp" name="ganancia_porcent_gp" class="w-1/5 text_blue border-2 border-color-inps text-lg rounded-md py-1 text-center" type="text">
            </div>
        </div>
    </div>






<style>
    .alto_caja_blue{
        height:50% !important;
    }

    .alto_caja{
        height:98% ;
    }

    .act_var{
        height:60% ;
    }
</style>
</div>
