<?php

namespace Tests\Feature\Models;

use App\Model\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_contains_valid_fillable_properties()
    {
        $fillable = [
            'title', 'content', 'user_id'
        ];
        $model = new Post();

        $this->assertEquals($fillable, $model->getFillable());
    }

    public function test_user_relation(){
        $model = new Post();

        $this->assertInstanceOf(BelongsTo::class, $model);
    }
}
