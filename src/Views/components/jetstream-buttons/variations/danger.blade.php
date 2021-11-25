@if( $livewire )
	<x-jet-danger-button wire:click="{{ $click }}" wire:loading.attr="disabled" wire:target="{{ $disableTarget }}" {{ $attributes }}>
		<div wire:loading.remove wire:target="{{ $target }}">
			@if( $slot->isNotEmpty() )
				{{ $slot }}
			@else
				{{ $copy ?? "Save" }}
			@endif
		</div>
		<div wire:loading wire:target="{{ $target }}">
			<x-buttons::jetstream-buttons.loading-icon />
		</div>
	</x-jet-danger-button>
@else
	<a href="{{ $click }}">
		<x-jet-danger-button>
			@if( $slot->isNotEmpty() )
				{{ $slot }}
			@else
				{{ $copy ?? "Save" }}
			@endif
		</x-jet-danger-button>
	</a>
@endif
