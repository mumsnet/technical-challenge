<?php

declare(strict_types=1);

arch('Models')
    ->expect('App\Models')
    ->toHaveMethod('casts')
    ->ignoring('App\Models\Concerns')
    ->toExtend('Illuminate\Database\Eloquent\Model')
    ->ignoring('App\Models\Concerns')
    ->toOnlyBeUsedIn([
        'App\Concerns',
        'App\Console',
        'App\Http',
        'App\Jobs',
        'App\Livewire',
        'App\Observers',
        'App\Mail',
        'App\Models',
        'App\Notifications',
        'App\Policies',
        'App\Providers',
        'App\Queries',
        'App\Rules',
        'App\Services',
        'Database\Factories',
        'Database\Seeders',
    ])
    ->ignoring('App\Models\Concerns');

arch('Ensure factories', function () {
    foreach (getModels() as $model) {
        /* @var \Illuminate\Database\Eloquent\Factories\HasFactory $model */
        expect($model::factory())
            ->toBeInstanceOf(Illuminate\Database\Eloquent\Factories\Factory::class);
    }
});

arch('Ensure DateTime Casts', function () {
    foreach (getModels() as $model) {
        /* @var \Illuminate\Database\Eloquent\Factories\HasFactory $model */
        $instance = $model::factory()->create();

        $dates = collect($instance->getAttributes())
            ->filter(fn ($_, $key) => str_ends_with($key, '_at'));

        foreach ($dates as $key => $value) {
            expect($instance->getCasts())->toHaveKey($key, 'datetime');
        }
    }
});

/**
 * Get all models in the app/Models directory.
 *
 * @return array<int, class-string<\Illuminate\Database\Eloquent\Model>>
 */
function getModels(): array
{
    $models = glob(__DIR__ . '/../../app/Models/*.php') ?? [];

    return collect($models)
        ->map(function ($file) {
            return 'App\Models\\' . basename($file, '.php');
        })->toArray();
}
