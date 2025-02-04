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
                "url" => route("incomes"),
                'name' => "incomes",
            ],
            [
                "title" => "My Spendings",
                "url" => route("spendings"),
                'name' => "spendings",
            ],
        ];
    }
    public function isActive($routeName): bool
    {
        return Route::currentRouteName() === $routeName;
    }
}