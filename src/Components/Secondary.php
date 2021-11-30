<?php

namespace Jordanbeattie\JetstreamButtons\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Jordanbeattie\JetstreamButtons\Components\Button;

class Secondary extends Button
{
    
    public $copy, $click, $target, $disableTarget;
    
    public function __construct( $click, $target = null, $copy = null, $disableTarget = null )
    {
        parent::__construct( $click, $target, $copy = $copy ?? "Cancel", $disableTarget, "secondary" );
    }
    
}
