<?php

namespace App\Http\Controllers;

use App\Models\User;
use AvocetShores\LaravelRewind\Facades\Rewind;

class UsersController extends Controller
{
    private $user;

    /**
     * Instantiate a new UserController instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getVersion() 
    {
        $user = $this->user->firstOrFail();
        echo __('Version number: ') . ($version = $user->current_version) . PHP_EOL;
        echo __('Current user email: ') . $user->email . PHP_EOL;
        echo __('Update user email') . PHP_EOL;
        $user->email = "scarlett.johansson." . $version . "@henryleeworld.com";
        $user->save();
        echo __('Version number: ') . ($version = $user->current_version) . PHP_EOL;
        echo __('Current user email: ') . $user->email . PHP_EOL;
        echo __('Rewind the user version email') . PHP_EOL;
        Rewind::rewind($user);
        echo __('Version number: ') .  ($version = $user->current_version) . PHP_EOL;
        echo __('Current user email: ') . $user->email . PHP_EOL;
    }
}
