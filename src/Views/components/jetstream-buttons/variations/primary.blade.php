@if( $livewire )
	<x-jet-button wire:click="{{ $click }}" wire:loading.attr="disabled" wire:target="{{ $disableTarget }}" {{ $attributes }}>
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
	</x-jet-button>
@else
	<a href="{{ $click }}" {{ $attributes }}>
		<x-jet-button>
			@if( $slot->isNotEmpty() )
				{{ $slot }}
			@else
				{{ $copy ?? "Save" }}
			@endif
		</x-jet-button>
	</a>
@endif
