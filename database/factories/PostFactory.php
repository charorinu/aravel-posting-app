<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first(); // $user変数を定義
        if (!$user) {
            $user = User::factory()->create(); // ユーザーが存在しない場合、新しいユーザーを作成
        }
        return [
            'title' => $this->faker->realText(20), // 日本語のタイトルを生成
            'content' => $this->faker->realText(200), // 日本語の本文を生成
            'user_id' => $user->id, // ユーザーIDを設定
        ];
    }
}
