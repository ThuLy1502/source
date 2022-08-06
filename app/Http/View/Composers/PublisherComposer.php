<?php

namespace App\Http\View\Composers;
use App\Models\Publisher;
use Illuminate\View\View;

class PublisherComposer
{
    protected $users;

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $publishers = Publisher::select('publisher_id', 'publisher_name')->where('publisher_active', 1)->orderByDesc('publisher_id')->get();

        $view->with('publishers', $publishers);
    }
}
