<?php 
namespace App\Services;
use Illuminate\Support\Facades\Route;

class MenuService
{
    public function getMenu(): array
    {
        return [
            [
                "title" => "My Incomes",
                "url" => "/incomes",
                'name' => "incomes",
            ],
            [
                "title" => "My Spendings",
                "url" => "/spendings",
                'name' => "spendings",
            ],
            [
                "title" => "Categories",
                "url" => "/categories",
                'name' => "categories",
            ],
        ];
    }
    public function isActive($route): bool
    {
        return str_starts_with(Route::currentRouteName(), $route);
    }
}