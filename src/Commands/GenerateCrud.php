<?php

namespace Payal\CrudGenerator\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenerateCrud extends Command
{
    protected $signature = 'make:crud {name} {--fields=}';
    protected $description = 'Generate CRUD operations for a specified model';

    public function handle()
    {
        $name = ucfirst($this->argument('name'));
        $fields = $this->option('fields');

        $this->generateMigration($name, $fields);
        $this->generateModel($name);
        $this->generateController($name);
        $this->generateViews($name);
        $this->updateRoutes($name);

        $this->info("CRUD for {$name} created successfully.");
    }

    protected function generateMigration($name, $fields)
    {
        // Generates a migration and includes fields if provided
        Artisan::call('make:migration', [
            'name' => "create_{$name}_table"
        ]);

        if ($fields) {
            $this->addFieldsToMigration($name, $fields);
        }
    }

    protected function generateModel($name)
    {
        Artisan::call('make:model', ['name' => $name]);
    }

    protected function generateController($name)
    {
        Artisan::call('make:controller', [
            'name' => "{$name}Controller",
            '--resource' => true
        ]);
    }

    protected function generateViews($name)
    {
        $viewsPath = resource_path("views/{$name}");
        if (!file_exists($viewsPath)) {
            mkdir($viewsPath, 0755, true);
        }
        
        // Create index, create, edit, and show views
        $views = ['index', 'create', 'edit', 'show'];
        foreach ($views as $view) {
            file_put_contents("{$viewsPath}/{$view}.blade.php", "<!-- {$view} view for {$name} -->");
        }
    }

    protected function updateRoutes($name)
    {
        $routeDefinition = "Route::resource('" . strtolower($name) . "', '{$name}Controller');\n";
        file_put_contents(base_path('routes/web.php'), $routeDefinition, FILE_APPEND);
    }

    protected function addFieldsToMigration($name, $fields)
    {
        // Logic to add fields to migration file based on parsed fields option
    }
}
