<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Watch;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Auth;

class Action_watch
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Watch $event)
    {
        

        if(!Session() ->has('logined'))

        {

       $this->update_watcher($event->video);//video from event watch.php 

       }

       else

        {
        return false;

    
     

       } 



    }

    public function update_watcher($video){
      
     Session()->put('logined',$video->id);



      $video->watch = $video->watch+1;
      $video->save();
    }
}
