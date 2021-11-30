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
        $this->disableTarget = $this->getDisableTarget( $disableTarget, $target );
        $this->variation = $this->getVariation( $variation );
        $this->livewire = Str::contains( $click, ['/', '#', ':'] ) ? false : true;
    }
    
    public function render()
    {
        return view('buttons::components.jetstream-buttons.variations.' . $this->variation);
    }
    
    public function format( $string )
    {
        // If $string contains $toggle(''), remove those characters to just leave the model that has been passed in.
        // Used when setting targets/disableTargets
        $string_arr = explode(",", $string);
    
        $return_string = [];
    
        foreach($string_arr as $func)
        {
            $func = trim($func);
        
            // get model from $toggle() functions
            if(Str::contains($func, '$toggle'))
            {
                $model = Str::before(Str::after($func, "("), ")");
                $model = Str::remove(["'", '"'], $model);
                array_push($return_string, $model);
            }
            
            //push what was passed
            else
            {
                array_push($return_string, $func);
            }
            
        }
        return implode(", ", array_unique($return_string));
    }
    
    public function getTarget( $target )
    {
        if(is_null( $target ))
        {
            // If no target is set, use the content from $click
            return $this->format( $this->click );
        }
        elseif( !Str::contains($target, $this->click) )
        {
            // If a $target is set and does not include the $click, append the $click without the $toggle function
            return $this->format($target . ", " . $this->click );
        }
        else
        {
            // return the passed in $target
            return $target;
        }
    }
    
    public function getDisableTarget( $disableTarget, $target )
    {
        if(is_null( $disableTarget ))
        {
            // If no $disableTarget is set, use the content from $target
            return $this->target;
        }
        elseif( !(Str::contains($disableTarget, $this->target)) )
        {
            // automaticall include the $target
            return $this->format( $disableTarget . ", " . $this->target);
        }
        return $this->format( $disableTarget );
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
