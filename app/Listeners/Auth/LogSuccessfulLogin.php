<?php

namespace App\Listeners\Auth;

use App\AuthEventLog;
use App\Enums\AuthEventType;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogin
{
    /**
     * @var Request  $request
     */
    protected $request;
    
    /**
     * Create the event listener.
     *
     * @param  Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        
        $ip = $this->request->ip();
        
        $log = (new AuthEventLog())->fill([
            'auth_event_type_id' => AuthEventType::Login,
            'ip' => $ip,
        ]);
        
        $user->authEventLogs()->save($log);
    }
}
