<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class FactorHorasDiariasRepository
{

    public function getFactorHorasDiariasCoordinacion(string $horas_diarias_aux){
        switch ($horas_diarias_aux) {
            case 'm_50':
                return -0.05;
            break;

            case '51_167':
                return 0;
            break;

            case '168':
                return 0.08;
            break;

            default:
                # code...
                break;
        }
    }
}
