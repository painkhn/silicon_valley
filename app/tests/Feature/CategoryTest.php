<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_upload_success()
    {
        $data = [
            'name' => 'Test Category',
            'description' => 'Description for test category'
        ];

        $response = $this->post(route('category.upload'), $data);

        $response->assertRedirect();

        $this->assertDatabaseHas('categories', [
            'name' => 'Test Category',
            'description' => 'Description for test category'
        ]);
    }

    public function test_category_upload_failure()
    {
        $data = [
            'description' => 'Description without a name'
        ];
        $response = $this->post(route('category.upload'), $data);
        $response->assertSessionHasErrors('name');
    }
}
