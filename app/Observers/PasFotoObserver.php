<?php

namespace App\Observers;

use App\Models\biodata;
use Illuminate\Support\Facades\Storage;

class PasFotoObserver
{
    /**
     * Handle the biodata "created" event.
     */

    public $afterCommit = true;

    public function created(biodata $biodata): void
    {
    }

    /**
     * Handle the biodata "updated" event.
     */
    public function updated(biodata $biodata): void
    {
        if ($biodata->isDirty('file_foto')) {
            !is_null($biodata->getOriginal('file_foto')) && Storage::disk('public')->delete($biodata->getOriginal('file_foto'));
        }
    }

    /**
     * Handle the biodata "deleted" event.
     */
    public function deleted(biodata $biodata): void
    {
    }

    /**
     * Handle the biodata "restored" event.
     */
    public function restored(biodata $biodata): void
    {
        //
    }

    /**
     * Handle the biodata "force deleted" event.
     */
    public function forceDeleted(biodata $biodata): void
    {
        //
    }
}
