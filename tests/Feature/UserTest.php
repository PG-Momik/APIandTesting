<?php

namespace Tests\Feature;

use App\Http\Resources\V1\UserCollection;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;


    public function test_available_routes_are_reachable()
    {


//        $routeList = Route::getRoutes();
//
//        $user = User::find(1);
//
//        foreach ($routeList as $route) {
//            $routeName = (string)$route->getName();
//            if ($routeName != '') {
//                $fullUrl = route($routeName);
//                if (strpos($fullUrl, "localhost:8080/users/") === 0) {
//                    $response = $this->get(url($fullUrl), ['id'=>$user->id, 'user'=>$user->id]);
//                    $response->assertStatus(200);
//                }
//            }
//        }
    }

    public function test_only_guest_user_can_view_login_page()
    {
        $response = $this->get('/login');
        $this->assertRedirectedToRoute('home');

        $user     = User::findOrFail(1);
        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/login');
        $this->assertRedirectedToRoute('home');
    }

    public function test_only_auth_user_can_fetch_all_users() {}

    public function test_only_auth_user_can_fetch_single_user() {}

    public function test_only_auth_user_can_store_user() {}
    public function test_only_auth_user_can_update_user() {}
    public function test_only_auth_user_can_delete_user() {}


}
