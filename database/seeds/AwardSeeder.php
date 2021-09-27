<?php

use App\Models\Award;
use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();


        $awards = [
            [
                'title' => 'Winner',
                'icon' => 'badge_small_winner.svg',
                'icon_big' => 'badge_big_winner.svg',
                'order' => 500,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => '2nd place',
                'icon' => 'badge_small_second.svg',
                'icon_big' => 'badge_big_second.svg',
                'order' => 250,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => '3rd place',
                'icon' => 'badge_small_third.svg',
                'icon_big' => 'badge_big_third.svg',
                'order' => 100,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Runner up',
                'icon' => 'badge_small_runner_up.svg',
                'icon_big' => 'badge_big_runner_up.svg',
                'order' => 50,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Audience award',
                'icon' => 'badge_small_audience_award.svg',
                'icon_big' => 'badge_big_audience_award.svg',
                'order' => 30,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Notable mention',
                'icon' => 'badge_small_notable_mention.svg',
                'icon_big' => 'badge_big_notable_mention.svg',
                'order' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Featured',
                'icon' => 'badge_small_featured.svg',
                'icon_big' => 'badge_big_featured.svg',
                'order' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($awards as $award) {
            Award::updateOrCreate(
                [ 'title' => $award['title']],
                $award
            );
        }
    }
}
