<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Setting;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition()
    {
        return [

                'name' => 'Example.com',
                'copyright' => 'Copyright © 2020 All rights reserved',
        ];
    }
}



?>
