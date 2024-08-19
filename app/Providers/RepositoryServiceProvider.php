<?php

namespace App\Providers;

use App\Interfaces\BrandInterface;
use App\Interfaces\CodingInterface;
use App\Interfaces\ProductInterface;
use App\Models\Brand;
use App\Models\Coding;
use App\Models\Product;
use App\Repositories\BrandMockRepo;
use App\Repositories\BrandMySQLRepo;
use App\Repositories\CodingMockRepo;
use App\Repositories\CodingMySQLRepo;
use App\Repositories\ProductMockRepo;
use App\Repositories\ProductMySQLRepo;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BrandInterface::class, function($app){
            if(config('app.env') == 'test'){
                return new BrandMockRepo();
            }
            return new BrandMySQLRepo(new Brand());
        });

        $this->app->bind(CodingInterface::class, function($app){
            if(config('app.env') == 'test'){
                return new CodingMockRepo();
            }
            return new CodingMySQLRepo(new Coding());
        });

        $this->app->bind(ProductInterface::class, function($app){
            if(config('app.env') == 'test'){
                return new ProductMockRepo();
            }
            return new ProductMySQLRepo(new Product());
        });
    }
}