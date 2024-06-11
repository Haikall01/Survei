<?php

namespace App\Http\Controllers;

use App\Models\ObjekSurvei;
use App\Models\Question;
use App\Models\responden;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $objekSurvei    = ObjekSurvei::all();
        $question       = Question::all();
        $respon         = responden::all()->count();
        $rata2ObjekSurvei = [];
        foreach ($objekSurvei as $key => $value) {
            $QuestByObjekSurvei = Question::all()->where('objek_survei_id', $value->id);
            $CountQuestByObjekSurvei = Question::all()->where('objek_survei_id', $value->id)->count();
            $sumValue = 0;
            foreach ($QuestByObjekSurvei as $key => $Qbos) {
                $value = $Qbos->point;
                $sumValue+=$value;
            }
            if($respon>0){
                $avg = ($sumValue)/($CountQuestByObjekSurvei*$respon);
            }else{
                $avg = 0;
            }
            $rata2ObjekSurvei[] = $avg;
        }

        return view('home', compact('objekSurvei','question', 'respon','rata2ObjekSurvei'));
        
    }
    public function survei()
    {
        // Logika untuk halaman survei
        // Misalnya, Anda bisa memuat data dari database atau melakukan logika lain di sini

        return view('survei'); // Pastikan 'survei' adalah nama file blade view untuk halaman survei
    }
}
