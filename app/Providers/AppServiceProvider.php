<?php

namespace App\Providers;
use Form;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // first parameter will be used in calling it in the GUI.
        // second parameter will locate the template of that input field.
        // third parameter will give values to the template.
        //when using laravel collective use the format below and not the format from the template.
        Form::component('bsText','components.form.text', ['name','label'=>null,'value'=>null,'attributes'=>[] ]);
        Form::component('bsDate','components.form.date', ['name','label'=>null,'value'=>null,'attributes'=>[] ]);
        Form::component('bsPassword','components.form.password',['name', 'label'=>null,'attributes'=>[] ]);
        Form::component('bsSelect','components.form.select', ['name','label'=>null,'options'=>[],'value'=>null,'attributes'=>[] ]);
        Form::component('bsFile','components.form.file',['name','label'=>null,'value'=>null,'attributes'=>[]]);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
