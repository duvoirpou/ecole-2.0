<?php

namespace App\Http\Livewire;

use App\Models\Contact as ModelsContact;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;

    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.contact');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertSuccess()
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Message envoyé avec succes']
        );
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        // Store the message in the database
        ModelsContact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);
        session()->flash('message', 'Envoyé avec succes !');
        $this->alertSuccess();
        $this->resetInput();
    }
}
