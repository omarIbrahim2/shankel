<?php

namespace App\View\Components;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\View\View;
use Illuminate\View\Component;
use Shankl\Factories\AuthUserFactory;

class UserDetails extends Component
{
     
     public $User,$guard,$id;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($guard , $id)
    {
        $this->guard = $guard;

        $UserModel = config("auth.custom" . "." . $guard . ".model");
        
        if ($this->guard == 'school') {
            try {
                $user = $UserModel::with(['area' , "eduSystem"])->findOrFail($id);
            } catch (\Throwable $th) {
                $user = null;
                $this->render();
            }
           
        
        }else{
            
            $user = $UserModel::with(['area'])->findOrFail($id);
        }
        

        $this->User =$user;
        
        
    }

    public function setAttributes($user){


        if ($this->guard == 'parent') {
            return [
                'parent' => [
                   'image' => $user->image,
                   'name' => $user->name(),
                    "email" => $user->email,
                     'phone' => $user->phone,
                   'address'=> $user->area->name(),
                ]
                ];
          }elseif($this->guard == 'school'){

              return [
                'school'=> [
                    'image' => $user->image,
                    'name' => $user->name(),
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'address'=> $user->area->name(),
                    "mission" => $user->mission(),
                    'vision' => $user->vision(),
                    'description' => $user->desc(),
                    "Establish date" => $user->establish_date,
                    'facebook' => $user->facebook,
                    'twiter' => $user->twitter,
                    'linkedin' => $user->linkedin,
                    "free seats" => $user->free_seats,
                    'type' => $user->type,
                    'Education system' => $user->eduSystem->name(),
                    

                ]
                ];
        }elseif($this->guard == 'teacher'){

           return [
               'teacher' => [
               'image' => $user->image,
               'name' => $user->name(),
               'email' => $user->email,
               'phone' => $user->phone,
               'address'=> $user->area->name(),
               'facebook' => $user->facebook,
               'twiter' => $user->twitter,
               'linkedin' => $user->linkedin,
               'field' => $user->field(),
               ] 
          ];

        }elseif($this->guard == 'supplier'){
            return [
                'supplier' => [
                    'image' => $user->image,
                    'name' => $user->name(),
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'address'=> $user->area->name(),
                    'type' => $user->type(),
                    "Organization Name" => $user->orgName(),
                ]
                ];
        }
       

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
      if (! $this->User) {
          return view('admin.errors.NotFound');
      }
          
       $attributes = $this->setAttributes($this->User);
           $attrs = collect($attributes);
    
        return view('components.user-details')->with(["attrs" => $attrs[$this->guard]]);
    }
}
