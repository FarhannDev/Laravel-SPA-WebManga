<?php

namespace App\Http\Livewire\Page\Homepage;

use App\Models\Contact;
use Livewire\Component;

class ContactIndex extends Component
{

    public $name;
    public $email;
    public $subject;
    public $message;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email:dns',
        'subject' => 'required|max:100,',
        'message' => 'required'
    ];

    public function send()
    {
        $this->validate();

        Contact::create([
            'name'    => $this->name,
            'email'   => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        return redirect()->route('successAlert')
            ->with('message_success', 'Hai ' . $this->name .  ', Terimakasih sudah menghubungi kami,mohon menunggu kami membalas...');
    }

    public function render()
    {
        return view('livewire.page.homepage.contact-index')
            ->extends('layouts.homepage.index')
            ->section('content');
    }
}
