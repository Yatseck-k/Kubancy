<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Pages\Posts;
use App\MoonShine\Pages\Users;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\PostResource;
use App\MoonShine\Resources\UserResource;
use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        // $config->authEnable();
        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                UserResource::class,
                PostResource::class,
            ])
            ->pages([
                ...$config->getPages(),
                Users::class,
                Posts::class,
            ]);
    }
}
