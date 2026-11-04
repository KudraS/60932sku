<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CulinarySeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $categoryId = function (string $name) {
                DB::table('categories')->updateOrInsert(
                    ['name' => $name],
                    ['created_at' => now(), 'updated_at' => now()]
                );

                return DB::table('categories')
                    ->where('name', $name)->value('id');
            };

            $soups = $categoryId('Супы');
            $main = $categoryId('Основные блюда');

            $ingredients = [];

            foreach ([
                ['Картофель', 'г'],
                ['Морковь', 'г'],
                ['Куриное филе', 'г'],
                ['Соль', 'г'],
                ['Молоко', 'мл'],
            ] as [$name, $unit]) {
                DB::table('ingredients')->updateOrInsert(
                    ['name' => $name, 'unit' => $unit],
                    ['created_at' => now(), 'updated_at' => now()]
                );

                $ingredients[$name] = DB::table('ingredients')
                    ->where('name', $name)
                    ->where('unit', $unit)
                    ->value('id');
            }

            $dishes = [
                [
                    'name' => 'Куриный суп',
                    'category_id' => $soups,
                    'cooking_method' =>
                        'Отварить куриное филе, добавить нарезанные '
                        . 'картофель и морковь. Варить до готовности, посолить.',
                    'cooking_time' => 40,
                    'ingredients' => [
                        'Картофель' => 200,
                        'Морковь' => 100,
                        'Куриное филе' => 300,
                        'Соль' => 5,
                    ],
                ],
                [
                    'name' => 'Картофельное пюре',
                    'category_id' => $main,
                    'cooking_method' =>
                        'Отварить картофель, слить воду. '
                        . 'Добавить тёплое молоко и соль, размять.',
                    'cooking_time' => 30,
                    'ingredients' => [
                        'Картофель' => 500,
                        'Молоко' => 150,
                        'Соль' => 5,
                    ],
                ],
            ];

            foreach ($dishes as $dish) {
                $composition = $dish['ingredients'];
                unset($dish['ingredients']);

                DB::table('dishes')->updateOrInsert(
                    ['name' => $dish['name']],
                    array_merge($dish, [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ])
                );

                $dishId = DB::table('dishes')
                    ->where('name', $dish['name'])->value('id');

                foreach ($composition as $name => $quantity) {
                    DB::table('recipes')->updateOrInsert(
                        [
                            'dish_id' => $dishId,
                            'ingredient_id' => $ingredients[$name],
                        ],
                        [
                            'quantity' => $quantity,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
                }
            }
        });
    }
}