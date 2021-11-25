<?php

namespace Jordanbeattie\JetstreamButtons\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Wrapper extends Component
{
    
    public function render()
    {
        return view('buttons::components.jetstream-buttons.wrapper');
    }
    
}
