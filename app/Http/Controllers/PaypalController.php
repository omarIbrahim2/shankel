<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\SchoolRegOrder;
use Shankl\Helpers\Paypal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Shankl\Services\SchoolService;

class PaypalController extends Controller
{
    private $paypal;
  
    public function __construct()
    {
        $this->paypal = new Paypal();
    }
    
   


   public function payment(Request $request , SchoolService $schoolService){
       
     $parentId  =  Auth::guard("parent")->user()->id;
       $request->validate([
         'school_id' => "required|exists:schools,id", 
         'child_id' => 'required|exists:children,id',
         'grade_id' => 'required|exists:grades,id',
       ]);

       
       $school = $schoolService->getSchool($request->school_id);

        if ($school->seats < 0) {
             
            
            return back()->with("error" , trans("payment.wrong"));
        }
      
       $str = rand();
       $hashed = md5($str);
      $order =  SchoolRegOrder::create([
        'school_id' => $request->school_id,
        'parentt_id' => $parentId,
        'order_code' => $hashed,
        "child_id" => $request->child_id,
        'grade_id' => $request->grade_id, 
       ]);

       session()->put("school_id" , $order->school_id);
       session()->put("child_id" , $order->child_id);
       session()->put("order" , $order);

         
       $data['success'] = url(route('paypal-success' , $request->school_id));
       $data['cancel'] = url(route('paypal-cancel'));
         
        $this->paypal->setData($data);
       return  $this->paypal->submitPayment();
   }


   public function success(Request $request , SchoolService $schoolService){
          
       $schoolId = session()->get("school_id");
       $childid = session()->get("child_id");
       $order = session()->get("order");


       $school = $schoolService->getSchool($schoolId);

       $seats = $school->seats;

       $seats--;


       $school->update(['id' => $schoolId , 'seats' => $seats]);


        $child = Child::findOrFail($childid);

        $child->update(['id' => $childid , "school_id" => $schoolId]);

        $order->update(['status' => true]);

        session()->pull('school_id');
        session()->pull('child_id');
        session()->pull('order');
          
        return $this->paypal->successPayment($request);

        
   }

   public function cancel(){

     dd("payment cancel");
   }

}
