<div>
    @if ($getRecord()->type == 'text' || $getRecord()->type == 'boolean')
        {{$getState()}}
    @elseif($getRecord()->type == 'image')
        <x-filament::avatar
            src="{{Storage::disk('public')->url($getState())}}"
        />
    @elseif($getRecord()->type == 'file')
        <a href="http://">{{Storage::disk()->url($getState())}}</a>
    @endif
</div>
