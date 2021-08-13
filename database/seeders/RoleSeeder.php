<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [   
            ['id' => 1, 'description' => 'Founder & CEO' ],         
			['id' => 2, 'description' => 'Web Developer' ],
            ['id' => 3, 'description' => 'UI/UX Designer' ],
			['id' => 4, 'description' => 'Marketing Specialist' ],
		];

		foreach ($items as $item) {
			Role::updateOrCreate(['id' => $item['id']], $item);
		}
    }
}
