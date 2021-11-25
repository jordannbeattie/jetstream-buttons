<?php

namespace Jordanbeattie\JetstreamButtons\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Button extends Component
{
    
    public $copy, $click, $target, $variation, $disableTarget, $livewire = null;
    
    public function __construct( $click, $target = null, $copy = null, $disableTarget = null, $variation = "primary" )
    {
        $this->click = $click;
        $this->copy = $copy;
        $this->target = $this->getTarget( $target );
        $this->disableTarget = $this->getDisableTarget( $disableTarget );
        $this->variation = $this->getVariation( $variation );
        $this->livewire = Str::contains( $click, ['/', '#', ':'] ) ? false : true;
    }
    
    public function render()
    {
        return view('buttons::components.jetstream-buttons.variations.' . $this->variation);
    }
    
    public function removeToggle( $string )
    {
        return $string;
        // If $string contains $toggle(''), remove those characters to just leave the model that has been passed in.
        // Used when setting targets/disableTargets
        $characters = [
            "$",
            "toggle",
            "(",
            "'",
            ")"
        ];
        foreach( $characters as $character )
        {
            $string = Str::remove($character, $string);
        }
        return $string;
    }
    
    public function getTarget( $target )
    {
        if(is_null( $target ))
        {
            // If no target is set, use the content from $click
            return $this->removeToggle( $this->click );
        }
        elseif( !Str::contains($target, $this->click) )
        {
            // If a $target is set and does not include the $click, append the $click without the $toggle function
            return $this->removeToggle($target . ", " . $this->click );
        }
        else
        {
            // return the passed in $target
            return $target;
        }
    }
    
    public function getDisableTarget( $disableTarget )
    {
        if(is_null( $disableTarget ))
        {
            // If no $disableTarget is set, use the content from $target
            return $this->target;
        }
        elseif( !Str::contains($disableTarget, $this->target) )
        {
            // If a $disableTarget is set and does not include the $target, append the $target
            return $this->removeToggle($disableTarget . ", " . $this->target);
        }
        else
        {
            // return the passed in $disableTarget without any $toggles
            return $this->removeToggle($disableTarget);
        }
    }
    
    public function getVariation($variation)
    {
        // Set the variation of the button. Default to the first in the below array.
        // There must be a template with the same name for this to render correctly.
        $variations = [
            'primary',
            'secondary',
            'danger'
        ];
        return in_array($variation, $variations) ? $variation : $variations[0];
    }
    
}
