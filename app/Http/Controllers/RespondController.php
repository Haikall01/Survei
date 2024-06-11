<?php

namespace App\Http\Controllers;

use App\Models\ObjekSurvei;
use App\Models\Question;
use App\Models\responden;
use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RespondController extends Controller
{
    public function store(Request $request){
        $countdosen = Question::all()->where('objek_survei_id',1)->count();
        $countstaff = Question::all()->where('objek_survei_id',2)->count();
        $countkurikulum = Question::all()->where('objek_survei_id',3)->count();
        $countfasilitas = Question::all()->where('objek_survei_id',4)->count();
        $countkegiatan = Question::all()->where('objek_survei_id',5)->count();
        $datadosen = [];
        $datastaff = []; 
        $datafasilitas = [];
        $datakurikulum = [];
        $datakegiatan = [];
        $dataObjek = ObjekSurvei::all();
        $question = Question::all();
        
        $count = 0;
        foreach($dataObjek as $re){
            foreach($question->where('objek_survei_id', $re->id) as $qs){
                $nama1 = $re->name;
                $nama2 = $qs->id;
                $hasil = $nama1.'-'.$nama2;
                if($count<$countdosen){
                    $datadosen[] = $request->$hasil;
                }else if($count<$countdosen+$countstaff){
                    $datastaff[] = $request->$hasil;
                }else if($count<$countdosen+$countstaff+$countkurikulum){
                    $datakurikulum[] = $request->$hasil;
                }else if($count<$countdosen+$countstaff+$countkurikulum+$countfasilitas){
                    $datafasilitas[] = $request->$hasil;
                }else if($count<$countdosen+$countstaff+$countkurikulum+$countfasilitas+$countkegiatan){
                    $datakegiatan[] = $request->$hasil;
                }
                $count++;
            }
        }

        // dd($datadosen, $datastaff, $datakurikulum, $datafasilitas, $datakegiatan);
       
        $i = 0;
        $Ques = Question::all();
        $dosen = $Ques->where('objek_survei_id', 1);
        foreach ($dosen as $key => $d) {
            $oldnilai = $d->point;
            $newNilai = $datadosen[$i];
            $nilaiUpdate = $oldnilai+$newNilai;
            DB::table('questions')->where('id', $d->id)->update(['point' => $nilaiUpdate]);
            $i++;
        }

        $i = 0;
        $staff = $Ques->where('objek_survei_id', 2);
        foreach ($staff as $ke => $s) {
            $oldnilai = $s->point;
            $newNilai = $datastaff[$i];
            $nilaiUpdate = $oldnilai+$newNilai;
            DB::table('questions')->where('id', $s->id)->update(['point' => $nilaiUpdate]);
            $i++;
        }

        $i = 0;
        $kurikulum = $Ques->where('objek_survei_id', 3);
        foreach ($kurikulum as $key => $k) {
            $oldnilai = $k->point;
            $newNilai = $datakurikulum[$i];
            $nilaiUpdate = $oldnilai+$newNilai;
            DB::table('questions')->where('id', $k->id)->update(['point' => $nilaiUpdate]);
            $i++;
        }

        $i = 0;
        $fasilitas = $Ques->where('objek_survei_id', 4);
        foreach ($fasilitas as $key => $f) {
            $oldnilai = $f->point;
            $newNilai = $datafasilitas[$i];
            $nilaiUpdate = $oldnilai+$newNilai;
            DB::table('questions')->where('id', $f->id)->update(['point' => $nilaiUpdate]);
            $i++;
        }

        $i=0;
        $kegiatan = $Ques->where('objek_survei_id', 5);
        foreach ($kegiatan as $key => $g) {
            $oldnilai = $g->point;
            $newNilai = $datakegiatan[$i];
            $nilaiUpdate = $oldnilai+$newNilai;
            DB::table('questions')->where('id', $g->id)->update(['point' => $nilaiUpdate]);
            $i++;
        }
        
        $respon = new responden();
        $respon->save();
        Alert::success('Good Job!', 'Survei berhasil dikrim!');
        return back();
    }

    public function reset(Question $question){
        DB::table('respondens')->delete();
        DB::table('questions')->update([
            'point' => 0
        ]);

        Alert::success('Good Job!', 'Semua responden berhasil direset!');
        return back();
    }

    public function is_active( Survei $survei, $id){
        $survei = Survei::findOrFail($id);
        $survei->update([
            'is_active' => true
        ]);
        Alert::success('Good job!', 'Survei berhasil dibuka!');
        return back();
    }

    public function dis_active( Survei $survei, $id){
        $survei = Survei::findOrFail($id);
        $survei->update([
            'is_active' => false
        ]);
        Alert::success('Good job!', 'Survei berhasil ditutup!');
        return back();
    }

    
}
