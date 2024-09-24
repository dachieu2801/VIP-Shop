<?php


namespace Beike\Mail;

use Beike\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;

class CustomerNewOrder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private Order $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orderLocale = $this->order->locale;
        App::setLocale($orderLocale);

        return $this->view('mails.order_new', ['order' => $this->order]);
    }
}
