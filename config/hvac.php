<?php

return [
    // Preguntas sugeridas que verás como “chips” en el chat
    'suggested_questions' => [
        '¿Qué es burden?',
        '¿Qué mantenimiento requiere un split?',
        '¿Diferencia entre SEER, SEER2 y EER?',
        '¿Qué es un termostato inteligente?',
        '¿Qué es CAPEX?'
    ],

    // FAQ interno para respuestas rápidas sin llamar a la API (ejemplo; ajusta contenido)
    'faq' => [
        '¿Qué es burden?' => "En instrumentación, 'burden' suele referirse a la carga que presenta un instrumento (como un amperímetro) al circuito, produciendo caída de tensión. En HVAC, el término no es estándar; normalmente se habla de 'carga térmica' (heat load). ¿Te refieres a carga térmica?",
        '¿diferencia entre seer, seer2 y eer?' => "SEER es eficiencia estacional (promedio a lo largo de la temporada de enfriamiento). EER es eficiencia en un punto de operación fijo. Un SEER alto indica mejor rendimiento estacional.",
        '¿Qué es CAPEX?' => "El Capex (gasto de capital) se refiere a la inversión que una empresa realiza para adquirir, mantener o mejorar activos fijos, como maquinaria, edificios o vehículos. Estas inversiones son esenciales para el crecimiento y funcionamiento a largo plazo de la empresa, ya que se utilizan para generar ingresos a largo plazo.",
    ],

    // Lista de palabras/temas HVAC (whitelist simple para filtro previo)
    'hvac_keywords' => [
        'hvac','aire acondicionado','refrigeración','calefacción','ventilación','split','vrf','termostato','seer','eer','carga térmica','refrigerante','compresor','evaporador','condensador','conductos','fancoil','chiller','heat pump','btu','toneladas','manual j','ashrae','mantenimiento','filtro','presión estática','burden','CAPEX','OPEX'
    ],
];
