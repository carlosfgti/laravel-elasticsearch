<?php

namespace App\Providers;

use Core\Category\Domain\Repository\CategoryRepositoryInterface;
use Core\Category\Infra\Repositories\CategoryRepository;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Client::class, function () {
            return ClientBuilder::create()
				    ->setBasicAuthentication('elastic', 'password')
                                    ->setHosts(config('elasticsearch.hosts'))
                                    ->build();
        });

        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
