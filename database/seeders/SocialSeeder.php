<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Social;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [   
            ['id' => 1, 'description' => 'Facebook' ],         
			['id' => 2, 'description' => 'Instagram' ],
            ['id' => 3, 'description' => 'Twitter' ],
            ['id' => 4, 'description' => 'Github' ],
            ['id' => 5, 'description' => 'Discord' ],
            ['id' => 6, 'description' => 'Youtube' ],
			['id' => 7, 'description' => 'Skype' ],
		];

		foreach ($items as $item) {
			Social::updateOrCreate(['id' => $item['id']], $item);
		}
    }
}
