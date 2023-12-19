<?php

namespace App\Http\Controllers;

use App\Http\Requests\EduSystemAddRequest;
use App\Http\Requests\EduSystemupdateRequest;
use App\Models\EduSystem;
use Illuminate\Http\Request;
use Shankl\Repositories\EduSystemRepository;

class EduSystemController extends Controller
{
    private $eduSystemRepo;

    public function __construct(EduSystemRepository $eduSystemRepo)
    {
        $this->eduSystemRepo = $eduSystemRepo;
    }

    public function eduSystems() {
        return view('admin.eduSystems.eduSystems');
    }

    public function create() {
        return view('admin.eduSystems.create');
    }

    public function update($eduSystemId)
    {

        $eduSystem = EduSystem::findOrFail($eduSystemId);

        if ($eduSystem) {
            return view('admin.eduSystems.update')->with(['eduSystem' => $eduSystem]);
        }

        return back();
    }


    public function store(EduSystemAddRequest $request)
    {

        $validatedReq =  $request->validated();

        $data = $this->evaluateData($validatedReq);


        $eduSystem = $this->eduSystemRepo->create($data);


        if ($eduSystem) {
            toastr('Education System created successfully', 'success', 'Create Education System');
            return redirect()->route('eduSystems');
        }


        toastr('error in  creating', 'error');
    }

    public function edit(EduSystemupdateRequest $request )
    {

        $validatedReq =  $request->validated();

        $data = $this->evaluateData($validatedReq);


        $eduSystem = EduSystem::findOrFail($data['id']);

        $action = $eduSystem->update($data);


        if ($action) {
            toastr('Education System Updated successfully', 'success', 'Update Education System');

            return redirect()->route('eduSystems');
        }


        toastr('error in updating', 'error');
    }

    public function delete($eduSystemId)
    {

        try {
            $action = $this->eduSystemRepo->delete($eduSystemId);

            toastr("Education System deleted successfully", 'success', "Delete Education System");

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
