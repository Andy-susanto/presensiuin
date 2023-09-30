<x-filament::page>
    Catatan : <span class="italic text-red-400">Data yang penting harus di isi adalah identitas diri dan alamat terutama
        foto, Data Pendukung bersifat opsional bisa di inputkan di nanti . Data penelitian di tujukan untuk dosen /
        tenaga pengajar</span>
    <form wire:submit="submit">
        {{ $this->form }}

        <x-filament::button class="mt-10" wire:loading.attr="disabled" :color="'success'" :icon="'heroicon-o-save'" type="submit">
            Simpan Perubahan
        </x-filament::button>
        <div wire:loading wire:target="submit">
            <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
                role="status">
                <span
                    class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Loading...</span>
            </div>
        </div>
    </form>
</x-filament::page>
