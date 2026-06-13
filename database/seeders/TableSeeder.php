<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    public function run(): void
    {
        $tables = [
            ['table_number' => 1, 'capacity' => 2, 'location' => 'Indoor'],
            ['table_number' => 2, 'capacity' => 2, 'location' => 'Indoor'],
            ['table_number' => 3, 'capacity' => 4, 'location' => 'Indoor'],
            ['table_number' => 4, 'capacity' => 4, 'location' => 'Indoor'],
            ['table_number' => 5, 'capacity' => 6, 'location' => 'Indoor'],
            ['table_number' => 6, 'capacity' => 6, 'location' => 'Indoor'],
            ['table_number' => 7, 'capacity' => 8, 'location' => 'Indoor'],
            ['table_number' => 8, 'capacity' => 8, 'location' => 'Outdoor'],
            ['table_number' => 9, 'capacity' => 4, 'location' => 'Outdoor'],
            ['table_number' => 10, 'capacity' => 6, 'location' => 'VIP'],
        ];

        foreach ($tables as $table) {
            Table::create(array_merge($table, [
                'status' => 'available',
                'description' => "Table {$table['table_number']} with {$table['capacity']} seats",
            ]));
        }
    }
}
