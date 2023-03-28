<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Uwla\Ltags\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::createMany([
            'aws', 'backend', 'carrier', 'cloud', 'devops', 'database', 'docker', 'java',
            'laravel', 'mysql', 'php', 'postgre', 'phpunit', 'public', 'sail', 'sail', 'sanctum', 'testing',
        ]);

        // nested tags
        $nested = [
            'aws'     => ['devops'],
            'backend' => ['carrier'],
            'devops'  => ['carrier'],
            'docker'  => ['devops'],
            'java'    => ['backend'],
            'laravel' => ['php'],
            'mysql'   => ['backend', 'database'],
            'php'     => ['backend'],
            'postgre' => ['backend', 'database'],
            'phpunit' => ['php', 'testing'],
            'sail'    => ['laravel'],
            'sanctum' => ['laravel'],
        ];

        foreach ($nested as $tag => $parent_tags)
            Tag::findByName($tag)->addTags($parent_tags);
    }
}
