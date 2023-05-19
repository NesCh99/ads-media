<?php

namespace App\Notifications;

use App\Models\Billing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class PagoNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $pago;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pago)
    {
       $this->pago = $pago;
       $this->user = $this->getCliente();
      
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('[ADS Media] Confirmación de suscripción.')
                    ->view('client.componets.mail', ['notificacion' => $this->pago ,'cliente' => $this->user]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {

        $notifiable->notification += 1;
        $notifiable->save();
        return [
     
            'mount'=>$this->pago->TotalPago,
            'message' =>'Tiene una nueva suscripción'
        ];
    }

    public function getCliente(){
        $cliente = User::find(auth()->user()->id);
        $billing = $cliente->billing;
        return $billing ;
    }

    
}
