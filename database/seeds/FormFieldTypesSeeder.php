<?php

use App\Models\FormFieldType;
use Illuminate\Database\Seeder;

class FormFieldTypesSeeder extends Seeder
{
    public $types = [
        [
            'type' => 'title',
            'description' => 'Idea title'
        ],
        [
            'type' => 'string',
            'description' => 'Short answer'
        ],
        [
            'type' => 'text',
            'description' => 'Paragraph'
        ],
        [
            'type' => 'single_option',
            'description' => 'Single option'
        ],
        [
            'type' => 'multiple_options',
            'description' => 'Multiple options'
        ],
        [
            'type' => 'upload',
            'description' => 'Attachment'
        ],
        [
            'type' => 'video',
            'description' => 'Video link'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->types as $type) {
            FormFieldType::updateOrCreate(
                ['type' => $type['type']],
                ['description' => $type['description'],]
            );
        }
    }
}
