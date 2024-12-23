<?php

namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Services\ProjectService;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use App\ResultsProjectModel;

trait  SaveResultsTrait{

public function save_results($enf,$id_project){
        $res_sum = 0;
        $cants = DB::table('solutions_project')
        ->where('id_project','=',$id_project)
        ->get();

        foreach($cants as $cant){
            $res_sum = $res_sum + $cant->cost_op_an;
        }

       $new_result = new ResultsProjectModel;
       $new_result->num_enf = $enf;
       $new_result->cost_op_an = $res_sum;
       $new_result->id_project = $id_project;
       $new_result->id_empresa=Auth::user()->id_empresa;
       $new_result->id_user=Auth::user()->id;
       $new_result->save();
}

public function update_results($enf,$id_project,$action_submit_send){

$res_sum = 0;
$cants = SolutionsProjectModel::where('id_project','=',$id_project)
->get();

foreach($cants as $cant){
    $res_sum = $res_sum + $cant->cost_op_an;
}

$id_result = ResultsProjectModel::where('id_project','=',$id_project)
->where('num_enf','=',$enf)
->first();

if($action_submit_send == 'store'){
    $new_result=new ResultsProjectModel;
}else if($action_submit_send == 'update'){
    /* $id_solution_1_1 = DB::table('solutions_project')
    ->where('solutions_project.id_project','=',$id_project)
    ->where('solutions_project.num_enf','=',$enf)
    ->where('solutions_project.num_sol','=',$sol)
    ->first(); */
    $new_result = ResultsProjectModel::findorfail($id_result->id);
    if($new_result){

    }else{
        $this->save_results($enf,$id_project);
    }
}
$new_result->num_enf = $enf;
$new_result->cost_op_an = $res_sum;

$new_result->id_project = $id_project;
$new_result->id_empresa=Auth::user()->id_empresa;
$new_result->id_user=Auth::user()->id;
if($action_submit_send == 'store'){
$new_result->save();
}else if($action_submit_send == 'update'){
$new_result->update();
}
}
}
