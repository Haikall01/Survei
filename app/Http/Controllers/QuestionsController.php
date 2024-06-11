<?php

namespace App\Http\Controllers;

use App\Models\ObjekSurvei;
use App\Models\Question;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'text'              => 'required|min:10',
            'objek_survei_id'   =>  'required',
        ],
        [
            'text.required'                 => 'Pertanyaan belum dimasukkan!',
            'text.min'                      => 'Pertanyaan minimal terdiri atas 10 karakter!',
            'objek_survei_id.required'      => 'Objek survei belum dipilih!',
        ]);

        Question::create([
            'text'  => $request->text,
            'objek_survei_id'  => $request->objek_survei_id,
        ]);

        return redirect('/adminsurvei')->with('success', 'Pertanyaan survei berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $quest = ObjekSurvei::findOrFail($id);
        $listQ = Question::all()->where('objek_survei_id', $id);
        return view('admin.survei.edit', compact('quest','listQ'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'soal'  => 'required|min:10'
        ]);

        $question = Question::findOrFail($id);
        $question->update([
            'text'  => $request->soal
        ]);

        Alert::success('Good Job!', 'Question berhasil diupdate');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quest = Question::findOrFail($id);
        $quest->delete();
        Alert::success('Good Job!', 'Question berhasil dihapus!');
        return back();
    }
}
