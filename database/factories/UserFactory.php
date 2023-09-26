<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\User;


class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $id = rand(300, 900);
        $image = "https://picsum.photos/seed/".$id."/200/300";
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'image' => $image,
            'description' => $this->faker->text(200),
            'remember_token' => Str::random(15),

        ];
    }

    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}





?>
