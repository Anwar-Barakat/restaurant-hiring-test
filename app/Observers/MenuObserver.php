<?php

namespace App\Observers;

use App\Models\Menu;

class MenuObserver
{
    public function creating(Menu $menu): void
    {
        $menu->status = 'pending';
    }
}
