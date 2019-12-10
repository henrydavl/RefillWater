<?php


namespace App\Http\View\Composer;


use App\Gallon;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotificationComposer
{
    public function compose(View $view)
    {
        $view->with('tickets', Ticket::all()->where('is_done', '=', '0'))
            ->with('empty_gallons', Gallon::all()->where('is_empty', '1'));
    }
}