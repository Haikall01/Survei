<?php

namespace App\Http\Controllers;

use App\Models\ObjekSurvei;
use App\Models\Question;
use App\Models\responden;
use App\Models\Survei;
use App\Models\Tanggapan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

class AdminSurveiController extends Controller
{
    /**
     * Display the admin survey page.
     *
     * @return \Illuminate\View\View
     */
    public function halamanAdmin()
    {
        $objekSurvei = ObjekSurvei::all();
        $question = Question::all();
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
        $is_active = Survei::findOrFail(1);

        return view('admin.survei.index', compact('objekSurvei', 'question','respon', 'rata2ObjekSurvei', 'is_active')); // Pastikan view ini ada
    }
    public function halamanUser()
    {
        $objekSurvei = ObjekSurvei::all();
        $tanggapan   = Tanggapan::all();
        $question = Question::all();
        $is_active = Survei::findOrFail(1);
        return view('front.survei.index', compact('objekSurvei', 'question','tanggapan','is_active')); // Pastikan view ini ada
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|min:3',
            'password' => 'required|min:3',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home');
        }

        return back()->with('loginError', 'Username atau Password salah!');
    }
}
