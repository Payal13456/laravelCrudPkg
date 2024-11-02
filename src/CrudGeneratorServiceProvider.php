<?php

namespace Payal\CrudGenerator;

use Illuminate\Support\ServiceProvider;
use Payal\CrudGenerator\Commands\GenerateCrud;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            GenerateCrud::class,
        ]);
    }
}
