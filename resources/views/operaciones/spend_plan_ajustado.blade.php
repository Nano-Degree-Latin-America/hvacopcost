<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spend Plan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        th, td {
            text-align: center;
            vertical-align: middle;
        }

        /* Scrollbar personalizado */
        .overflow-y-auto::-webkit-scrollbar {
            width: 8px;
        }

        .overflow-y-auto::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb {
            background: #1B17BB;
            border-radius: 10px;
        }

        .overflow-y-auto::-webkit-scrollbar-thumb:hover {
            background: #2d28d4;
        }

        .max-w-spendplan{
            max-width: 90rem;
        }

        /* Animación para filas nuevas */
        @keyframes fadeInRow {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        tbody tr {
            animation: fadeInRow 0.3s ease-out;
        }

        /* Estilos para inputs */
        .form-control:focus {
            transform: scale(1.02);
            box-shadow: 0 0 0 3px rgba(27, 23, 187, 0.1);
        }

        /* Cards para mobile */
        .table-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 2px solid #1B17BB;
            margin-bottom: 1.5rem;
        }

        .table-card-header {
            background: linear-gradient(to right, #1B17BB, #2d28d4);
            color: white;
            padding: 1rem;
            text-align: center;
            font-weight: bold;
            font-size: 1.25rem;
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            th, td {
                font-size: 13px;
                padding: 10px 6px;
            }

            th {
                font-size: 14px;
                padding: 12px 8px;
            }

            input[type="number"],
            input[type="text"] {
                font-size: 12px !important;
                height: 36px !important;
                padding: 8px 10px !important;
            }
        }

        @media (max-width: 768px) {
            .table-container {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .table-wrapper {
                width: 100%;
            }

            table {
                min-width: 100%;
                margin: 0;
            }

            th, td {
                font-size: 12px;
                padding: 8px 4px;
            }

            th {
                font-size: 13px;
                padding: 10px 6px;
            }

            input[type="number"],
            input[type="text"] {
                font-size: 11px !important;
                height: 34px !important;
                padding: 6px 8px !important;
            }

            .table-card-header {
                font-size: 1.1rem;
                padding: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .table-card {
                margin-bottom: 1rem;
                border-radius: 0.75rem;
            }

            .table-card-header {
                font-size: 1rem;
                padding: 0.6rem;
            }

            th, td {
                font-size: 11px;
                padding: 6px 2px;
            }

            input[type="number"],
            input[type="text"] {
                font-size: 10px !important;
                height: 32px !important;
                padding: 4px 6px !important;
            }
        }
    </style>
</head>

<body>
    <div class="h-auto md:h-[80vh] w-full overflow-y-auto overflow-x-hidden bg-gradient-to-br from-gray-50 to-gray-100 p-2 sm:p-4 md:p-6 font-roboto">
        <div class="flex justify-center w-full mt-2 md:mt-6">
            <!-- Desktop/Tablet Layout (3 columns) -->
            <div class="hidden md:grid md:grid-cols-1 lg:grid-cols-3 lg:gap-4 w-full max-w-spendplan">
                <!-- Table 1 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-[#1B17BB]">
                    <table>
                        <thead class="bg-gradient-to-r from-[#1B17BB] to-[#2d28d4]">
                            <tr>
                                <th colspan="3" class="px-2 py-1 md:py-4 font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-2xl">Spend Plan Ventas</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_spend_ventas" class="divide-y divide-gray-200">
                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Facturación</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/3 sm:w-1/2">
                                    <input id="facturacion_ventas_ajustado" name="facturacion_ventas_ajustado" type="text" readonly onchange="format_num(this.value,this.id);" onkeypress="return soloNumeros(event)" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/4">
                                    <input value="100%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                             <tr class="">
                                <td class="">
                                    <label class="text-xs" for="">&nbsp;</label>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Materiales</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="materiales_ventas_ajustado" name="materiales_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_materiales_ventas_ajustado" name="porcent_materiales_ventas_ajustado" value="10%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Equipos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="equipos_ventas_ajustado" name="equipos_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_equipos_ventas_ajustado" name="porcent_equipos_ventas_ajustado" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Mano Obra</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="mano_obra_ventas_ajustado" name="mano_obra_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_mano_obra_ventas_ajustado" name="porcent_mano_obra_ventas_ajustado" value="25%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Vehículos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="vehiculos_ventas_ajustado" name="vehiculos_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_vehiculos_ventas_ajustado" name="porcent_vehiculos_ventas_ajustado" value="5%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Contratistas</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="contratistas_ventas_ajustado" name="contratistas_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_contratistas_ventas_ajustado" name="porcent_contratistas_ventas_ajustado" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Viáticos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="viaticos_ventas_ajustado" name="viaticos_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_viaticos_ventas_ajustado" name="porcent_viaticos_ventas_ajustado" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Burden</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="burden_ventas_ajustado" name="burden_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_burden_ventas_ajustado" name="porcent_burden_ventas_ajustado" value="20%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                             <tr class="">
                                <td class="">
                                    <label class="text-xs" for="">&nbsp;</label>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pt-3">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Costo Operacional</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="costo_operacional_ventas_ajustado" name="costo_operacional_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_costo_operacional_ventas_ajustado" name="porcent_costo_operacional_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pb-3">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Gross Profit</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="gross_profit_ventas_ajustado" name="gross_profit_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_gross_profit_ventas_ajustado" name="porcent_gross_profit_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="">
                                <td class="">
                                    <label class="text-xs" for="">&nbsp;</label>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td colspan="3" class="px-1 md:px-2 py-2 md:py-3 w-full">
                                  <div class="w-full flex flex-col sm:flex-row gap-2">
                                    <div class="w-full sm:w-1/2 place-content-center">
                                         <label class="font-roboto font-bold text-center text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Ganancia Esperada</label>
                                    </div>
                                    <div class="w-full sm:w-1/2">
                                         <input id="ganancia_esperada_ventas_ajustado" name="ganancia_esperada_ventas_ajustado" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Table 2 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-[#1B17BB]">
                     <table>
                        <thead class="bg-gradient-to-r from-[#1B17BB] to-[#2d28d4]">
                            <tr>
                                <th colspan="3" class="px-2 py-1 md:py-4 font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-2xl">Spend Plan Ajustado</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_coordinacion_calculo_1" class="divide-y divide-gray-200">
                             <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Facturación</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/3 sm:w-1/2">
                                    <input id="facturacion_ventas_spa" name="facturacion_ventas_spa" type="text" readonly onchange="format_num(this.value,this.id);" onkeypress="return soloNumeros(event)" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/4">
                                    <input value="100%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                             <tr class="">
                                <td class="">
                                    <label class="text-xs" for="">&nbsp;</label>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Materiales</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="materiales_ventas_spa" name="materiales_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_materiales_ventas_spa" name="porcent_materiales_ventas_spa" value="10%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Equipos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="equipos_ventas_spa" name="equipos_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_equipos_ventas_spa" name="porcent_equipos_ventas_spa" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Mano Obra</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="mano_obra_ventas_spa" name="mano_obra_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_mano_obra_ventas_spa" name="porcent_mano_obra_ventas_spa" value="25%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Vehículos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="vehiculos_ventas_spa" name="vehiculos_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_vehiculos_ventas_spa" name="porcent_vehiculos_ventas_spa" value="5%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Contratistas</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="contratistas_ventas_spa" name="contratistas_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_contratistas_ventas_spa" name="porcent_contratistas_ventas_spa" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Viáticos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="viaticos_ventas_spa" name="viaticos_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_viaticos_ventas_spa" name="porcent_viaticos_ventas_spa" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Burden</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="burden_ventas_spa" name="burden_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_burden_ventas_spa" name="porcent_burden_ventas_spa" value="20%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                             <tr class="">
                                <td class="">
                                    <label class="text-xs" for="">&nbsp;</label>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pt-3">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Costo Operacional</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="costo_operacional_ventas_spa" name="costo_operacional_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_costo_operacional_ventas_spa" name="porcent_costo_operacional_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pb-3">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Gross Profit</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="gross_profit_ventas_spa" name="gross_profit_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_gross_profit_ventas_spa" name="porcent_gross_profit_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="">
                                <td class="">
                                    <label class="text-xs" for="">&nbsp;</label>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td colspan="3" class="px-1 md:px-2 py-2 md:py-3 w-full">
                                  <div class="w-full flex flex-col sm:flex-row gap-2">
                                    <div class="w-full sm:w-1/2 place-content-center">
                                         <label class="font-roboto font-bold text-center text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Ganancia Esperada</label>
                                    </div>
                                    <div class="w-full sm:w-1/2">
                                         <input id="ganancia_esperada_ventas_spa" name="ganancia_esperada_ventas_spa" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Table 3 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-[#1B17BB]">
                     <table>
                        <thead class="bg-gradient-to-r from-[#1B17BB] to-[#2d28d4]">
                            <tr>
                                <th colspan="3" class="px-2 py-1 md:py-4 font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-2xl">Spend Plan Manual</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_coordinacion_calculo_1" class="divide-y divide-gray-200">
                             <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Facturación</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/3 sm:w-1/2">
                                    <input value="$0" id="facturacion_ventas_manual" name="facturacion_ventas_manual" type="text" onchange="format_num(this.value,this.id);spenPlanManual();" onkeypress="return soloNumeros(event)" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 bg-blue-200">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/4">
                                    <input value="100%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                             <tr class="">
                                <td class="">
                                    <label class="text-xs" for="">&nbsp;</label>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Materiales</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input value="$0" id="materiales_ventas_manual" name="materiales_ventas_manual" onchange="format_num(this.value,this.id);spenPlanManual();" onkeypress="return soloNumeros(event)" type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 bg-blue-200">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_materiales_ventas_manual" name="porcent_materiales_ventas_manual" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Equipos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input value="$0" id="equipos_ventas_manual" name="equipos_ventas_manual" onchange="format_num(this.value,this.id);spenPlanManual();" onkeypress="return soloNumeros(event)" type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 bg-blue-200">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_equipos_ventas_manual" name="porcent_equipos_ventas_manual" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Mano Obra</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input value="$0" id="mano_obra_ventas_manual" name="mano_obra_ventas_manual" onchange="format_num(this.value,this.id);spenPlanManual();" onkeypress="return soloNumeros(event)" type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-blue-200 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_mano_obra_ventas_manual" name="porcent_mano_obra_ventas_manual" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Vehículos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input value="$0" id="vehiculos_ventas_manual" name="vehiculos_ventas_manual" onchange="format_num(this.value,this.id);spenPlanManual();" onkeypress="return soloNumeros(event)" type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-blue-200 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_vehiculos_ventas_manual" name="porcent_vehiculos_ventas_manual" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Contratistas</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input value="$0" id="contratistas_ventas_manual" name="contratistas_ventas_manual" onchange="format_num(this.value,this.id);spenPlanManual();" onkeypress="return soloNumeros(event)"  type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-blue-200 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_contratistas_ventas_manual" name="porcent_contratistas_ventas_manual" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Viáticos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input  value="$0"  id="viaticos_ventas_manual" name="viaticos_ventas_manual" onchange="format_num(this.value,this.id);spenPlanManual();" onkeypress="return soloNumeros(event)"  type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-blue-200 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_viaticos_ventas_manual" name="porcent_viaticos_ventas_manual" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Burden</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="burden_ventas_manual" name="burden_ventas_manual" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                    <input type="text" id="burden_val" name="burden_val" hidden>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_burden_ventas_manual" name="porcent_burden_ventas_manual" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                             <tr class="">
                                <td class="">
                                    <label class="text-xs" for="">&nbsp;</label>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pt-3">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Costo Operacional</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="costo_operacional_ventas_manual" name="costo_operacional_ventas_manual" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_costo_operacional_ventas_manual" name="porcent_costo_operacional_ventas_manual" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pb-3">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Gross Profit</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="gross_profit_ventas_manual" name="gross_profit_ventas_manual" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_gross_profit_ventas_manual" name="porcent_gross_profit_ventas_manual" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="">
                                <td class="">
                                    <label class="text-xs" for="">&nbsp;</label>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td colspan="3" class="px-1 md:px-2 py-2 md:py-3 w-full">
                                  <div class="w-full flex flex-col sm:flex-row gap-2">
                                    <div class="w-full sm:w-1/2 place-content-center">
                                         <label class="font-roboto font-bold text-center text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Ganancia Esperada</label>
                                    </div>
                                    <div class="w-full sm:w-1/2">
                                         <input id="ganancia_esperada_ventas_manual" name="ganancia_esperada_ventas_manual" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mobile/Tablet Layout (stacked) -->
            <div class="md:hidden w-full max-w-2xl table-container">
                <!-- Card 1 -->
                <div class="table-card">
                    <div class="table-card-header">Spend Plan Ventas</div>
                    <table>
                        <tbody id="tbody_coordinacion_calculo_mobile_1" class="divide-y divide-gray-200">
                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 py-1">
                                    <input readonly type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input readonly type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input readonly type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Card 2 -->
                <div class="table-card">
                    <div class="table-card-header">Spend Plan Ventas</div>
                    <table>
                        <tbody id="tbody_coordinacion_calculo_mobile_2" class="divide-y divide-gray-200">
                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 py-1">
                                    <input readonly type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input readonly type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input readonly type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Card 3 -->
                <div class="table-card">
                    <div class="table-card-header">Spend Plan Ventas</div>
                    <table>
                        <tbody id="tbody_coordinacion_calculo_mobile_3" class="divide-y divide-gray-200">
                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 py-1">
                                    <input readonly type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input readonly type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input readonly type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
</body>
</html>
