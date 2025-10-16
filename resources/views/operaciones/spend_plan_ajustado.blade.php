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
            <div class="hidden md:grid md:grid-cols-1 lg:grid-cols-3 lg:gap-4 w-full max-w-7xl">
                <!-- Table 1 -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-[#1B17BB]">
                    <table>
                        <thead class="bg-gradient-to-r from-[#1B17BB] to-[#2d28d4]">
                            <tr>
                                <th colspan="3" class="px-2 py-1 md:py-4 font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-2xl">Spend Plan Ventas</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_coordinacion_calculo_1" class="divide-y divide-gray-200">
                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-black text-lg md:text-xl" for="">Facturación</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/2">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/4">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Materiales</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Equipos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Mano de Obra</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Vehículos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Contrtistas</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Viaticos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Burden</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pt-3">
                                <td class="px-1 md:px-2 py-1 md:py-1 flex">
                                   <label class="font-roboto font-bold text-left text-black text-lg md:text-xl" for="">Costo Operacional</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pb-3">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-black text-lg md:text-xl" for="">Gross Profit</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">

                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td colspan="3" class="px-1 md:px-2 py-1 md:py-1 w-full">
                                  <div class="w-full flex">
                                    <div class="w-1/2  place-content-center">
                                         <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Ganancia Esperada</label>
                                    </div>
                                    <div class="w-1/2">
                                         <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                    </div>

                                  </div>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/4">

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
                                   <label class="font-roboto font-bold text-center text-black text-lg md:text-xl" for="">Facturación</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/2">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/4">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Materiales</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Equipos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Mano de Obra</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Vehículos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Contrtistas</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Viaticos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Burden</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pt-3">
                                <td class="px-1 md:px-2 py-1 md:py-1 flex">
                                   <label class="font-roboto font-bold text-left text-black text-lg md:text-xl" for="">Costo Operacional</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pb-3">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-black text-lg md:text-xl" for="">Gross Profit</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">

                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td colspan="3" class="px-1 md:px-2 py-1 md:py-1 w-full">
                                  <div class="w-full flex">
                                    <div class="w-1/2  place-content-center">
                                         <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Ganancia Esperada</label>
                                    </div>
                                    <div class="w-1/2">
                                         <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                    </div>

                                  </div>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/4">

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
                                   <label class="font-roboto font-bold text-center text-black text-lg md:text-xl" for="">Facturación</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/2">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/4">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Materiales</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Equipos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Mano de Obra</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Vehículos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Contrtistas</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Viaticos</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Burden</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pt-3">
                                <td class="px-1 md:px-2 py-1 md:py-1 flex">
                                   <label class="font-roboto font-bold text-left text-black text-lg md:text-xl" for="">Costo Operacional</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200 pb-3">
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                   <label class="font-roboto font-bold text-center text-black text-lg md:text-xl" for="">Gross Profit</label>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1">
                                    <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">

                            </tr>

                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                                <td colspan="3" class="px-1 md:px-2 py-1 md:py-1 w-full">
                                  <div class="w-full flex">
                                    <div class="w-1/2  place-content-center">
                                         <label class="font-roboto font-bold text-center text-[#1B17BB] text-lg md:text-xl" for="">Ganancia Esperada</label>
                                    </div>
                                    <div class="w-1/2">
                                         <input disabled type="number" class="w-full h-9 md:h-10 px-2 md:px-3 text-center text-xs md:text-sm font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                    </div>

                                  </div>
                                </td>
                                <td class="px-1 md:px-2 py-1 md:py-1 w-1/4">

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
                                    <input disabled type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input disabled type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input disabled type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
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
                                    <input disabled type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input disabled type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input disabled type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
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
                                    <input disabled type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input disabled type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                                <td class="px-1 py-1">
                                    <input disabled type="number" class="w-full h-8 px-2 text-center text-xs font-semibold bg-gray-100 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-[#1B17BB] focus:ring-2 focus:ring-[#1B17BB]/20 transition-all duration-200 cursor-not-allowed opacity-60">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        console.log('Dashboard Spend Plan cargado correctamente');
    </script>
</body>
</html>
