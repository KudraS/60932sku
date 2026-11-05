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

            $additionalDishes = [
                [
                    'Картофельный суп', $soups, 30,
                    'Нарезать картофель и морковь, залить водой '
                    . 'и варить до готовности.',
                    ['Картофель' => 300, 'Морковь' => 100, 'Соль' => 5],
                ],
                [
                    'Морковный суп', $soups, 35,
                    'Отварить морковь и картофель, '
                    . 'измельчить в пюре и посолить.',
                    ['Морковь' => 300, 'Картофель' => 150, 'Соль' => 4],
                ],
                [
                    'Суп с курицей и молоком', $soups, 45,
                    'Отварить курицу с картофелем, '
                    . 'добавить молоко и прогреть.',
                    [
                        'Куриное филе' => 250,
                        'Картофель' => 200,
                        'Молоко' => 100,
                        'Соль' => 5,
                    ],
                ],
                [
                    'Овощной суп', $soups, 25,
                    'Нарезать картофель и морковь, '
                    . 'отварить в подсоленной воде.',
                    ['Картофель' => 200, 'Морковь' => 200, 'Соль' => 4],
                ],
                [
                    'Куриный суп-пюре', $soups, 50,
                    'Отварить курицу и овощи, измельчить '
                    . 'и добавить тёплое молоко.',
                    [
                        'Куриное филе' => 300,
                        'Картофель' => 200,
                        'Морковь' => 100,
                        'Молоко' => 100,
                        'Соль' => 5,
                    ],
                ],
                [
                    'Молочный картофельный суп', $soups, 30,
                    'Отварить картофель, добавить молоко '
                    . 'и соль, довести до кипения.',
                    ['Картофель' => 250, 'Молоко' => 300, 'Соль' => 3],
                ],
                [
                    'Отварной картофель', $main, 25,
                    'Очистить картофель и отварить в подсоленной воде.',
                    ['Картофель' => 400, 'Соль' => 5],
                ],
                [
                    'Морковное пюре', $main, 30,
                    'Отварить морковь, добавить тёплое молоко '
                    . 'и измельчить.',
                    ['Морковь' => 400, 'Молоко' => 100, 'Соль' => 3],
                ],
                [
                    'Куриное филе с картофелем', $main, 50,
                    'Нарезать курицу и картофель, '
                    . 'посолить и тушить с водой.',
                    [
                        'Куриное филе' => 300,
                        'Картофель' => 300,
                        'Соль' => 5,
                    ],
                ],
                [
                    'Куриное филе с морковью', $main, 40,
                    'Нарезать курицу и морковь, '
                    . 'посолить и тушить до готовности.',
                    [
                        'Куриное филе' => 300,
                        'Морковь' => 200,
                        'Соль' => 4,
                    ],
                ],
                [
                    'Картофельно-морковное пюре', $main, 35,
                    'Отварить картофель и морковь, '
                    . 'добавить молоко и размять.',
                    [
                        'Картофель' => 300,
                        'Морковь' => 200,
                        'Молоко' => 100,
                        'Соль' => 5,
                    ],
                ],
                [
                    'Курица в молоке', $main, 45,
                    'Нарезать куриное филе, залить молоком, '
                    . 'посолить и тушить.',
                    [
                        'Куриное филе' => 400,
                        'Молоко' => 200,
                        'Соль' => 4,
                    ],
                ],
                [
                    'Тушёные овощи с курицей', $main, 55,
                    'Нарезать курицу, картофель и морковь, '
                    . 'тушить с водой и солью.',
                    [
                        'Куриное филе' => 250,
                        'Картофель' => 250,
                        'Морковь' => 150,
                        'Соль' => 5,
                    ],
                ],
            ];

            foreach ($additionalDishes as [
                $name, $category, $time, $method, $composition
            ]) {
                $dishes[] = [
                    'name' => $name,
                    'category_id' => $category,
                    'cooking_method' => $method,
                    'cooking_time' => $time,
                    'ingredients' => $composition,
                ];
            }

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