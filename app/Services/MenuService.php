<?php 
namespace App\Services;

class MenuService
{
    public function getMenu(): array
    {
        return [
            [
                "title" => "My Incomes",
                'url' => "/incomes",
                "active" => request()->is("/incomes")
            ],
            [
                "title" => "My Spendings",
                'url' => "/spendings",
                "active" => request()->is("/spendings")
            ],
        ];
    }
}