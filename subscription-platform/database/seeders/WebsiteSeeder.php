<?php
namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    public function run()
    {
        Website::create(['name' => 'Example Website', 'description' => 'This is an example website.']);
    }
}
