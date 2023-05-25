<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoAddReq;
use App\Http\Requests\InfoUpdateReq;
use App\Models\Information;
use App\Traits\HandleUpload;
use Illuminate\Http\Request;
use Shankl\Services\FileService;
use Yoeunes\Toastr\Facades\Toastr;

class InfoController extends Controller
{
    use HandleUpload;
    public function index(){

        return view('admin.informations.informations');

    }

    public function create(){

        return view('admin.informations.create');
    }

    public function update($infoId){
     
        $Info = Information::findOrFail($infoId);

         if ($Info) {
            return view('admin.informations.update')->with(['Info' => $Info]);
         }

         return back();


    }

    public function store(InfoAddReq $request , FileService $fileService){

        $validatedReq =  $request->validated();

        $data = $this->evaluateData($validatedReq);
         

        $data['image'] =  $this->handleUpload($request , $fileService);
         
        $Info = Information::create($data);


        if ($Info) {
            toastr('info created successfully' , 'success' , 'create info');
            return redirect()->route('Infos');
        }

         
        toastr('error in  creating' , 'error');

    }


    public function edit(InfoUpdateReq $request , FileService $fileService){
        
        $validatedReq =  $request->validated();

        $data = $this->evaluateData($validatedReq);

        
        $Info = Information::findOrFail($data['id']);

        $data['image'] = $this->handleUpload($request , $fileService , $Info);

         
         $action = $Info->update($data);


         if ($action) {
             toastr('Info Updated successfully' , 'success' , 'update Info');

             return redirect()->route('Infos');
         }


         toastr('error in updating' , 'error');



           
    }

    public function delete($infoId){

        $Info = Information::findOrFail($infoId);

        if ($Info) {
            $action = $Info->delete();

            if ($action) {
                 toastr("Info deleted successfully" , 'success' , "delete info");

                 return back();
            }else{
                 
                toastr("error in deleting" , 'error');

                return back();

            }
        }else{

            return back();
        }


    }


    public function show($infoId){

        $Info = Information::findOrFail($infoId);

        if ($Info) {
            return view('admin.informations.infoDetails')->with(['Info' => $Info]);
        }

        return back();
    }


    private function evaluateData($request){
        $data = array();
       if (array_key_exists('id' , $request)) {
           
           $data['id'] = $request['id'];  
       }
       $data['title'] = json_encode([
           'en' => $request['title_en'],
           'ar' => $request['title_ar'],
       ]);
           

           $data['aboutUs'] = json_encode([
               'en' => $request['aboutUs_en'],
               'ar' => $request['aboutUs_ar'],
           ]);
       

           $data['mission'] = json_encode([
            'en' => $request['mission_en'],
            'ar' => $request['mission_ar'],
        ]);


        $data['vision'] = json_encode([
            'en' => $request['vision_en'],
            'ar' => $request['vision_ar'],
        ]);

        $data['choose'] = json_encode([
            'en' => $request['choose_en'],
            'ar' => $request['choose_ar'],
        ]);

       return $data;


   }
}
