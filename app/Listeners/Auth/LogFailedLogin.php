<?php

namespace App\Listeners\Auth;

use App\AuthEventLog;
use App\Enums\AuthEventType;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogFailedLogin
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
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        $user = $event->user;
        
        $ip = $this->request->ip();
        
        $log = (new AuthEventLog())->fill([
            'auth_event_type_id' => AuthEventType::FailedLogin,
            'ip' => $ip,
        ]);
        
        $user->authEventLogs()->save($log);
    }
}
