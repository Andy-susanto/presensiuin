<?php

use IbrahimBedir\FilamentDynamicSettingsPage\Models\Setting;

function setting($key)
{
    return Setting::where('key', $key)->first()->value('value');
}
