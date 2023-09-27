<?php

use Illuminate\View\View;
use Illuminate\Support\Facades\Request;

class NavigationComposer
{
    public function compose(View $view)
    {
        $currentUrl = Request::url();

        $view->with('activeHome', $currentUrl === route('home'));
        $view->with('activeCatalog', $currentUrl === route('catalog'));
        $view->with('activeNews', $currentUrl === route('news'));
        $view->with('activeContacts', $currentUrl === route('contacts'));
        $view->with('activeAbout', $currentUrl === route('about'));
    }
}
