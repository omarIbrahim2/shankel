<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\GradeAddRequest;
use App\Http\Requests\GradeUpdateRequest;
use Shankl\Repositories\GradeRepository;

class GradeController extends Controller
{
    private $gradeRepo;

    public function __construct(GradeRepository $gradeRepo)
    {
        $this->gradeRepo = $gradeRepo;
    }

    public function grades() {
        return view('admin.grades.grades');
    }

    public function create() {
        return view('admin.grades.create');
    }

    public function update($gradeId)
    {

        $grade = Grade::findOrFail($gradeId);

        if ($grade) {
            return view('admin.grades.update')->with(['grade' => $grade]);
        }

        return back();
    }


    public function store(GradeAddRequest $request)
    {

        $validatedReq =  $request->validated();

        $data = $this->evaluateData($validatedReq);


        $Grade = $this->gradeRepo->create($data);


        if ($Grade) {
            toastr('Grade created successfully', 'success', 'create Grade');
            return redirect()->route('grades');
        }


        toastr('error in  creating', 'error');
    }

    public function edit(GradeUpdateRequest $request )
    {

        $validatedReq =  $request->validated();

        $data = $this->evaluateData($validatedReq);


        $Grade = Grade::findOrFail($data['id']);

        $action = $Grade->update($data);


        if ($action) {
            toastr('Grade Updated successfully', 'success', 'update Grade');

            return redirect()->route('grades');
        }


        toastr('error in updating', 'error');
    }

    public function delete($gradeId)
    {

        try {
            $action = $this->gradeRepo->delete($gradeId);

            toastr("Grade deleted successfully", 'success', "delete Grade");

            return back();
        } catch (\Throwable $th) {
            toastr("error in deleting You must delete areas first", 'error');

            return back();
        }
    }


    private function evaluateData($request)
    {
        $data = array();
        if (array_key_exists('id', $request)) {

            $data['id'] = $request['id'];
        }
        $data['name'] = json_encode([
            'en' => $request['name_en'],
            'ar' => $request['name_ar'],
        ]);
        return $data;
    }

}
