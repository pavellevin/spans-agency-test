<?php

namespace Database\Factories;

use App\Models\ThemeWebinar;
use App\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebinarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Webinar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = $this->faker->dateTimeBetween('-1 years', 'now');
        return [
            'theme_webinar_id' => function () {
                return ThemeWebinar::factory()->create()->id;
            },
            'datetime' => $data,
            'number_month' => $data,
            'name' => $this->faker->sentence(7),
        ];
    }
}
