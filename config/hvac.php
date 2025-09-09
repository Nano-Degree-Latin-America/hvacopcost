<?php

return [
    // Preguntas sugeridas que verás como “chips” en el chat
    'suggested_questions' => [

    ],

    // FAQ interno para respuestas rápidas sin llamar a la API
    'faq' => [
        '¿Qué es burden?' => "En instrumentación, 'burden' suele referirse a la carga que presenta un instrumento (como un amperímetro) al circuito, produciendo caída de tensión. En HVAC, el término no es estándar; normalmente se habla de 'carga térmica' (heat load). ¿Te refieres a carga térmica?",
        '¿diferencia entre seer, seer2 y eer?' => "SEER es eficiencia estacional (promedio a lo largo de la temporada de enfriamiento). EER es eficiencia en un punto de operación fijo. Un SEER alto indica mejor rendimiento estacional.",
        '¿Qué es Minisplit Inverter?' => "Unidad dividida con una unidad interior y otra exterior. Para uso de enfriamiento residencial.",
        '¿Qué es Split DX?' => "Unidad dividida con una unidad exterior y otra interior (fancoil o manejadora). Para uso comercial.",
        '¿Qué es Paquete (RTU)?' => "Unidad con todos los componentes en su interior. De pequeña a gran capacidad y ubicados por lo general en los techos.",
        '¿Qué es VRF No Ductado?' => "Unidad dividida con una o múltiples condensadoras y evaporadoras, sin capacidad de ductaje.",
        '¿Qué es WSHP?' => "Unidad compacta con unidad de refrigeración enfriada por agua. De alto uso comercial.",
        '¿Qué es Chiller Aire Scroll?' => "Unidad enfriadora de agua con compresores Scroll y condensador por aire. Uso comercial.",
        '¿Qué es Chiller Aire Tornillo?' => "Unidad enfriadora de agua con compresores de Tornillo con variadores o con 4 etapas; y condensador por aire. Uso comercial e industrial.",
        '¿Qué es VRF Ductado?' => "Unidad dividida con una o múltiples condensadoras y evaporadoras, con capacidad de ductaje.",
        '¿Qué es PTAC / VTAC?' => "Unidad compacta bajo ventana o en pared. De pequeña capacidad y de uso en hotelería.",
        '¿Qué es CAPEX?' => "Gastos de capital o inversiones físicas anuales para crecimiento empresarial. Incluye instalación y puesta en marcha de sistemas HVAC.",
        '¿Qué es OPEX?' => "Gastos operativos para funciones principales de la empresa. En HVAC incluye consumo energético, mantenimiento y reparaciones.",
        '¿Qué es Payback?' => "Indicador que mide el tiempo de retorno de una inversión. No considera el valor del dinero en el tiempo.",
        '¿Qué es MARR?' => "Tasa mínima aceptable de rendimiento. Representa la rentabilidad esperada que debe superar una inversión.",
        '¿Qué es ROI?' => "Retorno de inversión. Mide la rentabilidad comparando el costo inicial con la ganancia neta obtenida.",
        '¿Qué es EUI?' => "Intensidad del uso de energía. Mide el consumo energético de un edificio en relación a su tamaño. Un EUI bajo indica buen desempeño energético.",
        '¿Qué es m²?' => "Metros cuadrados. Unidad de superficie utilizada para medir áreas en el sistema métrico.",
        '¿Qué es ft²?' => "Pies cuadrados.",
        '¿Qué es RTU?' => "Roof Top Unit.",
        '¿Qué es VRF?' => "Volumen de Refrigerante Variable. Sistema eficiente que ajusta el flujo de refrigerante según la demanda.",
        '¿Qué es PTAC?' => "Packaged Terminal Air Conditioner. Unidad compacta instalada en muros o ventanas, común en hoteles.",
        '¿Qué es VTAC?' => "Vertical Terminal Air Conditioner. Similar al PTAC pero con configuración vertical.",
        '¿Qué es LSP?' => "Low Static Pressure. Baja presión estática en sistemas de aire, ideal para ductos cortos.",
        '¿Qué es MSP?' => "Medium Static Pressure. Media presión estática, adecuada para ductos medianos.",
        '¿Qué es HSP?' => "High Static Pressure. Alta presión estática, usada en sistemas con ductos largos o complejos.",
        '¿Qué es TR?' => "Tonelada de Refrigeración. Equivale a 12,000 BTUH o 3.516 kW térmicos.",
        '¿Qué es kW?' => "Kilowatt térmico. Unidad de potencia usada para medir capacidad de enfriamiento o calefacción.",
        '¿Qué son Cooling Hours?' => "Horas de enfriamiento. Tiempo total en que el sistema opera en modo frío.",
        '¿Qué es EER?' => "Energy Efficiency Ratio. Mide la eficiencia energética en condiciones estándar. EER = COP × 3.412.",
        '¿Qué es SEER?' => "Seasonal Energy Efficiency Ratio. Eficiencia energética estacional. SEER = 1.14 × EER.",
        '¿Qué es SEER2?' => "Versión actualizada del SEER. SEER2 = SEER × 0.95.",
        '¿Qué es IEER?' => "Integrated Energy Efficiency Ratio. Eficiencia energética integrada en cargas parciales. IEER = 1.43 × EER.",
        '¿Qué es IPLV?' => "Integrated Part Load Value. Valor de eficiencia en cargas parciales. IPLV = 12 / EER o 3.5 / COP.",
        '¿Qué es VAV?' => "Variable Air Volume. Caja que regula el flujo de aire en sistemas HVAC.",
        '¿Qué es HR?' => "Heat Recovery. Recuperadora de calor que reutiliza energía térmica del sistema.",
        '¿Qué es DOA?' => "Dedicated Outdoor Air. Unidad dedicada para introducir aire exterior tratado.",
        '¿Qué es DDC?' => "Direct Digital Control. Sistema de control digital para automatización HVAC.",
        '¿Qué es Kwh?' => "Kilowatt hora. Unidad de energía eléctrica consumida.",
        '¿Qué es ROI?' => "Return on Investment. Retorno de inversión. Evalúa la rentabilidad de un proyecto.",
        '¿Qué es MARR?' => "Minimum Acceptable Rate of Return. Tasa mínima aceptable de rendimiento.",
        '¿Qué es EUI?' => "Energy Use Intensity. Mide el consumo energético de un edificio en relación a su tamaño.",
        '¿Qué es BTU?' => "British Thermal Unit. Unidad térmica usada para medir energía.",
        '¿Qué es BTUH?' => "BTU por hora. Mide la capacidad térmica por unidad de tiempo.",
        '¿Qué es Sqf?' => "Square feet. Pies cuadrados. Unidad de superficie en el sistema imperial.",
        '¿Qué es ASHRAE Estándar 100?' => "Recurso con más de 100 medidas típicas de eficiencia energética (EEM) aplicables para que los edificios cumplan objetivos energéticos establecidos, mejorando su rendimiento.",
        '¿Qué es ASHRAE Estándar 62.1?' => "Estándar para diseño de sistemas de ventilación y calidad del aire interior (IAQ). Define tasas mínimas de ventilación y medidas para proteger la salud y productividad de los ocupantes.",
        '¿Qué es ASHRAE Estándar 180?' => "Establece requisitos mínimos para inspección y mantenimiento de equipos HVAC, asegurando confort térmico, eficiencia energética y calidad del aire en edificios comerciales nuevos y existentes.",
        '¿Qué es ASHRAE Estándar 90.1?' => "Referencia clave para códigos energéticos en EE.UU. y el mundo. Define requisitos mínimos para diseño energéticamente eficiente en edificios comerciales.",
        '¿Qué es ASHRAE Estándar 169?' => "Proporciona datos climáticos globales para diseño de edificios. Incluye estadísticas como temperaturas medias, grados-día de enfriamiento/calefacción y porcentajes estacionales.",
        '¿Qué es ASHRAE Estándar 55?' => "Define ambientes térmicos aceptables considerando factores humanos, para garantizar confort en diseño y operación de edificios ocupados.",
        '¿Qué es ASHRAE Estándar 70?' => "Establece métodos de laboratorio para probar entradas y salidas de aire en terminales con o sin ductos. Incluye especificaciones para difusores, rejillas y distribución de aire.",
        '¿Qué es ENERGY STAR?' => "Con la puntuación ENERGY STAR de 1 a 100, se puede comprender cómo se compara el consumo de energía de un edificio con edificios similares en todo USA. La puntuación ENERGY STAR permite que todos los miembros de su organización, desde el técnico de mantenimiento hasta un director ejecutivo, comprendan rápidamente el rendimiento de su edificio. Una puntuación de 50 representa el rendimiento energético medio, mientras que una puntuación de 75 o más indica que su edificio tiene un rendimiento superior y puede ser elegible para la certificación ENERGY STAR."
    ],

    // Lista de palabras/temas HVAC (whitelist simple para filtro previo)
    'hvac_keywords' => [
        'hvac','aire acondicionado','refrigeración','calefacción','ventilación','split','vrf','termostato','seer','eer','carga térmica','refrigerante','compresor','evaporador','condensador','conductos','fancoil','chiller','heat pump','btu','toneladas','manual j','ashrae','mantenimiento','filtro','presión estática','burden','CAPEX','OPEX','Paquete (RTU)','Split DX','Minisplit Inverter','WSHP','Chiller Aire Scroll','Chiller Aire Tornillo',' VRF Ductado','PTAC / VTAC','Payback','MARR','ROI','EUI','m²','ft²','RTU','VRF','PTAC','VTAC','LSP','MSP','HSP','TR','kW','Cooling Hours','EER','SEER','SEER2','IEER','IPLV','VAV','HR','DOA','DDC','Kwh','ROI','MARR','EUI','BTU','BTUH','Sqf','ASHRAE Estándar 100','ASHRAE Estándar 62.1','ASHRAE Estándar 180','ASHRAE Estándar 90.1','ASHRAE Estándar 169','ASHRAE Estándar 55','ASHRAE Estándar 70','ENERGY STAR','Hola','Estándar 100','Estándar 62.1','Estándar 180','Estándar 90.1','Estándar 169','Estándar 55','Estándar 70','gracias','adios'
    ],
];
