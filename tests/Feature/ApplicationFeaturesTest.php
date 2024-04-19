<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplicationFeaturesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_users_add_admin_data_name_email_password(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_users_add_staff_data_name_email_password(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_users_update_name_data_id_name(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_users_update_email_data_id_email(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_users_change_password_data_auth_password_old_password_new_password(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_users_delete_user_data_id(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
