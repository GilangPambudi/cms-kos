<?php

use App\Models\Facilities;
use App\Models\Photos;
use App\Models\Section;
use App\Models\Setting;

function get_setting_data($key)
{
    $data = Setting::where('key', $key)->first();
    if (isset($data->value) && isset($data->label)) {
        return [
            'value' => $data->value,
            'label' => $data->label
        ];
    } else {
        return [
            'value' => 'empty',
            'label' => 'empty'
        ];
    }
}

function get_section_data($key)
{
    $data = Section::where('post_as', $key)->first();
    if (isset($data)) {
        return $data;
    }
}

function get_facilities(){
    $data = Facilities::all();
    return $data;
}

function get_photos(){
    $data = Photos::all();
    return $data;
}
