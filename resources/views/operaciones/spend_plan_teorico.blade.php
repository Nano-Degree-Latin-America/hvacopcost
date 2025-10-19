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

        /* Responsive adjustments */
        @media (max-width: 1280px) {
            label {
                font-size: 16px !important;
            }

            input[type="text"] {
                font-size: 15px !important;
                height: 38px !important;
            }
        }

        @media (max-width: 1024px) {
            label {
                font-size: 14px !important;
            }

            input[type="text"] {
                font-size: 13px !important;
                height: 36px !important;
                padding: 8px !important;
            }

            th {
                font-size: 16px !important;
                padding: 12px 8px !important;
            }
        }

        @media (max-width: 768px) {
            .main-container {
                flex-direction: column !important;
            }

            .table-section,
            .info-section {
                width: 100% !important;
                margin-bottom: 1rem;
            }

            label {
                font-size: 13px !important;
            }

            input[type="text"] {
                font-size: 12px !important;
                height: 34px !important;
                padding: 6px !important;
            }

            th {
                font-size: 14px !important;
                padding: 10px 6px !important;
            }

            td {
                padding: 8px 4px !important;
            }
        }

        @media (max-width: 640px) {
            label {
                font-size: 11px !important;
            }

            input[type="text"] {
                font-size: 11px !important;
                height: 32px !important;
                padding: 4px !important;
            }

            th {
                font-size: 13px !important;
                padding: 8px 4px !important;
            }

            td {
                padding: 6px 2px !important;
            }

            .info-section .flex {
                flex-direction: column;
                align-items: stretch !important;
            }

            .info-section .w-2\/5,
            .info-section .w-1\/4 {
                width: 100% !important;
                margin-bottom: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            label {
                font-size: 10px !important;
            }

            input[type="text"] {
                font-size: 10px !important;
                height: 30px !important;
                padding: 3px !important;
            }

            th {
                font-size: 12px !important;
                padding: 6px 2px !important;
            }
        }
    </style>
</head>

<body>
    <div class="h-auto md:h-[80vh] w-full overflow-y-auto overflow-x-hidden bg-gradient-to-br from-gray-50 to-gray-100 p-2 sm:p-4 md:p-6 font-roboto">
        <div class="flex justify-center w-full mt-2 md:mt-6">
            <!-- Desktop/Tablet Layout -->
            <div class="flex flex-col lg:flex-row w-full gap-2 lg:gap-x-3 max-w-7xl justify-center main-container">
                <!-- Table 1 - Spend Plan Ventas -->
                <div class="bg-white rounded-xl lg:rounded-2xl shadow-xl overflow-hidden border-2 border-[#1B17BB] w-full lg:w-1/3 table-section">
                    <table>
                        <thead class="bg-gradient-to-r from-[#1B17BB] to-[#2d28d4]">
                            <tr>
                                <th colspan="3" class="px-2 py-2 md:py-3 lg:py-4 font-roboto font-bold text-center text-[#1B17BB] text-base sm:text-lg md:text-xl lg:text-2xl">Spend Plan Ventas</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_ventas" class="divide-y divide-gray-200">
                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Facturación</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/3 sm:w-1/2">
                                    <input id="facturacion_ventas" name="facturacion_ventas" type="text" readonly onchange="format_num(this.value,this.id);" onkeypress="return soloNumeros(event)" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/4">
                                    <input value="100%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Materiales</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="materiales_ventas" name="materiales_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_materiales_ventas" name="porcent_materiales_ventas" value="10%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Equipos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="equipos_ventas" name="equipos_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_equipos_ventas" name="porcent_equipos_ventas" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Mano de Obra</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="mano_obra_ventas" name="mano_obra_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_mano_obra_ventas" name="porcent_mano_obra_ventas" value="25%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Vehículos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="vehiculos_ventas" name="vehiculos_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_vehiculos_ventas" name="porcent_vehiculos_ventas" value="5%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Contratistas</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="contratistas_ventas" name="contratistas_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_contratistas_ventas" name="porcent_contratistas_ventas" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Viáticos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="viaticos_ventas" name="viaticos_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_viaticos_ventas" name="porcent_viaticos_ventas" value="0%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Burden</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="burden_ventas" name="burden_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_burden_ventas" name="porcent_burden_ventas" value="20%" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="">
                                <td class="">
                                    <label class="text-sm" for="">&nbsp;</label>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Costo Operacional</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="costo_operacional_ventas" name="costo_operacional_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_costo_operacional_ventas" name="porcent_costo_operacional_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-left text-black text-sm sm:text-base md:text-lg lg:text-xl block" for="">Gross Profit</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="gross_profit_ventas" name="gross_profit_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input id="porcent_gross_profit_ventas" name="porcent_gross_profit_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                </td>
                            </tr>

                            <tr class="">
                                <td class="">
                                    <label class="text-sm" for="">&nbsp;</label>
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td colspan="3" class="px-1 md:px-2 py-2 md:py-3 w-full">
                                  <div class="w-full flex flex-col sm:flex-row gap-2">
                                    <div class="w-full sm:w-1/2 place-content-center">
                                         <label class="font-roboto font-bold text-center text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl block" for="">Ganancia Esperada</label>
                                    </div>
                                    <div class="w-full sm:w-1/2">
                                         <input id="ganancia_esperada_ventas" name="ganancia_esperada_ventas" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                                    </div>
                                  </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Section 2 - Info adicional -->
                <div class="bg-white rounded-xl lg:rounded-2xl overflow-hidden w-full lg:w-1/2 grid place-items-center p-4 info-section">
                    <div class="grid w-full gap-y-3 sm:gap-y-4">
                        <div class="w-full flex flex-col sm:flex-row gap-2 sm:gap-0">
                            <div class="w-full sm:w-2/5 place-items-center flex justify-start">
                                <label class="font-roboto font-bold text-center sm:text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl" for="">Horas Disponibles</label>
                            </div>
                            <div class="w-full sm:w-1/4">
                                <input id="horas_disponibles" name="horas_disponibles" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                            </div>
                        </div>

                        <div class="w-full flex flex-col sm:flex-row gap-2 sm:gap-0">
                            <div class="w-full sm:w-2/5 place-items-center flex justify-start">
                                <label class="font-roboto font-bold text-center sm:text-left text-[#1B17BB] text-sm sm:text-base md:text-lg lg:text-xl" for="">Kilómetros Disponibles</label>
                            </div>
                            <div class="w-full sm:w-1/4">
                                <input id="kilometros_disponibles" name="kilometros_disponibles" readonly type="text" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-sm sm:text-base md:text-lg font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
