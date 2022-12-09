<?php

namespace Database\Factories;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * List data of grade_type.
     *
     * @var string
     */
    protected $grade_type = [];

    /**
     * List data of grade_mayor.
     *
     * @var string
     */
    protected $grade_mayor = [];

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grade::class;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function init()
    {
        if (empty($this->grade_type)) {
            $this->grade_type = config()->get('grade.type');
            
            if (empty($this->grade_type)) {
                throw new \Exception('Error: config/grade.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
            }
        }

        if (empty($this->grade_mayor)) {
            $this->grade_mayor = config()->get('grade.mayor');
            
            if (empty($this->grade_type)) {
                throw new \Exception('Error: config/grade.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
            }
        }
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->init();

        return [
            'name' => fake()->randomElement($this->grade_type) . ' ' .fake()->randomElement($this->grade_mayor) . ' ' . rand(1,9)
        ];
    }
}
