<?php

namespace App\Http\Controllers\admin;

use App\Exports\QuestionExport;
use App\Http\Controllers\Controller;
use App\Imports\QuestionImport;
use App\Models\Question;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller
{
    //
    public function index()
    {
        $model = Question::all();
        return view('admin.page.question.index', compact('model'));
    }
    public function add()
    {
        return view('admin.page.question.add');
    }
    public function postAdd(Request $request)
    {
        $request->validate([
            'question' => ['required', 'unique:questions,question'],
            'answer_1' => 'required',
            'answer_2' => 'required',
            'answer_3' => 'required',
            'answer_4' => 'required',
            'correct_answer' => 'required',
            'point_question' => 'required|numeric|min:1',
        ]);
        $model = new Question();
        $model->fill($request->all());
        $model->save();
        return redirect()->route('question.list');
    }
    public function edit($id)
    {
        $model = Question::find($id);
        return view('admin.page.question.edit', compact('model'));
    }
    public function postEdit(Request $request, $id)
    {
        $request->validate([
            'question' => ['required', 'unique:questions,question,' . $id],
            'answer_1' => 'required',
            'answer_2' => 'required',
            'answer_3' => 'required',
            'answer_4' => 'required',
            'correct_answer' => 'required',
            'point_question' => 'required|numeric|min:1',
        ]);
        $model = Question::find($id);
        $model->fill($request->all());
        $model->save();
        return redirect()->route('question.list');
    }
    public function delete($id)
    {
        Question::destroy($id);
        return redirect()->route('question.list');
    }


    // import,export file
    public function fileImportExport()
    {
        return view('admin.page.question.file-import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        $request->validate([
            'file' => ['required','mimes:csv,xlsx,ods,txt'],
        ]);
        $file = $request->file('file');
        $import = new QuestionImport();
        $import->import($file);
        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }
        return redirect()->route('question.list');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExportExcel()
    {
        return Excel::download(new QuestionExport, 'question-collection.xlsx');
    }
    public function fileExportCsv()
    {
        return Excel::download(new QuestionExport, 'question-collection.csv');
    }
}
