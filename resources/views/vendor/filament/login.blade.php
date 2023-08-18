@if (session('status'))
    <div class="relative mb-12 px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
        <span class="absolute inset-y-0 left-0 flex items-center ml-4">
            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                <path
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                    clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
        </span>
        <p class="ml-6">{{ session('status') }}</p>
    </div>
@endif
<form wire:submit.prevent="authenticate" class="space-y-8">
    {{ $this->form }}

    <x-filament::button type="submit" form="authenticate" class="w-full">
        {{ __('filament::login.buttons.submit.label') }}
    </x-filament::button>
    {{-- <hr> --}}
    {{-- <div class="flex items-center justify-end mt-4">
        <a href="{{ url('authorized/google') }}">
            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                style="margin-left: 3em;">
        </a>
    </div> --}}
</form>
