<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * List data of grade.
     *
     * @var string
     */
    protected $grade = [];

    /**
     * List data of voting status.
     *
     * @var string
     */
    protected $voting = [];

    /**
     * List data of translate.
     *
     * @var string
     */
    protected $translate = [];
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function init()
    {
        if (empty($this->translate)) {
            $this->translate = config()->get('language.list');
            
            if (empty($this->translate)) {
                throw new \Exception('Error: config/language.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
            }
        }

        if (empty($this->voting)) {
            $this->voting = config()->get('voting.list');
            
            if (empty($this->voting)) {
                throw new \Exception('Error: config/voting.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
            }
        }
        
        if (empty($this->grade)) {
            $this->grade = Grade::get();
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
            'name' => fake()->unique()->name(),
            'nis' => 31031 . rand(1,2) . rand(0000,9999),
            'grade' => $this->grade[rand(0,9)]->name,
            'language' => fake()->randomElement($this->translate),
            'voting_status' => fake()->randomElement($this->voting),
            'password' => 'password'
        ];
    }
}