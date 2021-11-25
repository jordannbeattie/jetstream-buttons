# Jetstream Buttons
Extending _larave/jetstream_ buttons to make using them with _livewire/livewire_ simpler. 

## Variations
All three of Jetstreams integral buttons are available: 
- Primary
- Secondary
- Danger

## Parameters
| Variable | Use |
|---|---|
| Copy | Text to be shown on the button (can be overwritten with slots). Will default to "Save" |
| Click | URL or Livewire function to be called when clicked |
| Target | see wire:target in livewire documentation. Will automatically include the click function if it is not included |
| Disable Target | Functions to be used as a target to disable the button. i.e when should the button be disabled. Will automatically include the click and target functions if included. |

## Wrapper
Buttons containing SVG's often don't align with buttons containing text. To get around this, you can use the wrapper component to ensure consitency. 
```
<x-buttons-wrapper>
    // buttons here
</x-buttons-wrapper>
```

## Example
In the below example, I have three buttons to interact with a model: Save, Cancel and Delete. When one button is clicked, they are all disabled. When each button is clicked, it will show a loading icon.
```
<x-buttons-wrapper>
    <x-buttons-primary click="save" disable-target="cancel, delete" />
    <x-buttons-secondary click="cancel" disable-target="save, delete">Cancel</x-buttons.custom>
    <x-buttons-danger click="delete" disable-target="cancel, save" copy="delete" />
</x-buttons-wrapper>
```

## Styling 
Each button component extends Jetstream's button component. See [jetstream's documentation on customisation](https://jetstream.laravel.com/2.x/stacks/livewire.html#components). 

## Contact 
Jordan Beattie <br />
jordan@jordanbeattie.com <br />
[www.jordanbeattie.com](https://www.jordanbeattie.com)
