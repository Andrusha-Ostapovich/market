<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // dd('Зареєст.', $user);
    }
    public function deleted(User $user)
    {
        Cache::forget('client_count');
    }
    public function saved(User $user)
    {
        Cache::forget('client_count');
    }
}
