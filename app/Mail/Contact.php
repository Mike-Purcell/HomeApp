<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Item;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
    
    public $items
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($items)
    {
        $this->items = Item::all();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.contact')
            ->subject('Shopping List');
    }
}
