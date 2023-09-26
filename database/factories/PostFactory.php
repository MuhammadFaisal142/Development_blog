<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Category;
use App\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $id = rand(30, 300);
        $image = "https://picsum.photos/seed/".$id."/200/300";
        return [
            'title' => $this->faker->sentence(),
            'slug' => Str::slug($this->faker->sentence()),
            'image' => $image,
            'description' => $this->faker->text(400),
            'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' => 1,
        ];

    }
}



?>
