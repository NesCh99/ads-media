<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class NotificationComponent extends Component
{
    public $notifications, $count;

    public function mount(){
        $this->notifications =auth()->user()->notifications;
        $this->count =auth()->user()->unreadNotifications->count();
    }
    public function render()
    {
        return view('livewire.notification-component');
    }

    public function resetNotification(){
        auth()->user()->notification=0;
        auth()->user()->save();
    }

    public function read($notification_id){
         $notification = auth()->user()->notifications()->findOrFail($notification_id);
         $notification->markAsRead();
    }



    public function delete($notification_id){
        $notification = auth()->user()->notifications()->findOrFail($notification_id);
        $notification->delete();
        return redirect()->route('cliente.home');
      
   }


}
