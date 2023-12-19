<?php

namespace App\Http\Livewire\Web;

use App\Models\Message;
use Livewire\Component;

class ContactUs extends Component
{
    public $email;
    public $name;
    public $subject;
    public $message;

    protected $rules = [
       'name' => 'required|string|max:100|min:3',
       'email' => 'required|email',
       'subject' => 'required|string|max:255|min:3',
       'message' => 'required|string',
    ];
    public function render()
    {
        return view('livewire.web.contact-us');
    }

    public function resetInputs(){

        $this->name = "";
        $this->email = "";
        $this->subject ="";
        $this->message = "";

    }

    public function save(){
       
        $this->validate();


       $message = Message::create([
        'name' => $this->name,
        'email' => $this->email,
        'subject' => $this->subject,
        'message' => $this->message,
       ]); 


       if($message){
        
        session()->flash('success', trans('contact.messSucc'));
        $this->resetInputs();

       }else{
        session()->flash('error', trans('contact.messfail'));
       }
     

        

    }
}
