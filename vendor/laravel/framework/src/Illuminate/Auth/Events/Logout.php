<?php

namespace Illuminate\Auth\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class Logout
{
    use SerializesModels;

    /**
     * The authentication guard name.
     *
     * @var string
     */
    public $guard;

    /**
     * The authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param  string  $guard
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    public function __construct($guard, $user)
    {
        $this->user = $user;
        $this->guard = $guard;
        User::where('id',Auth::user()->id)->update([
            'actiu'=>0
        ]);
    }
}
