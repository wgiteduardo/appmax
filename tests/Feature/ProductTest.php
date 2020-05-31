<?php

namespace Tests\Feature;

use App\User;
use App\Product;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if user get redirect if not logged in
     *
     * @return void
     */
    public function test_redirect_when_not_logged_in()
    {
        $response = $this->get('/products');

        $response->assertRedirect('/login');
    }

    /**
     * Test if an authenticated user can see view products
     *
     * @return void
     */
    public function test_user_can_see_view_when_authenticated()
    {
        $user = $this->createUser();

        $response = $this->actingAs($user)->get('/products');

        $response->assertSuccessful();
    }

    /**
     * Test if an authenticated user can see view products
     *
     * @return void
     */
    public function test_user_can_see_a_product()
    {
        $user = $this->createUser();

        $product = factory('App\Product')->create();

        $response = $this->actingAs($user)->get('/products');

        $response->assertSee($product->title);
    }

    /**
     * Test if an authenticated user can create a new product
     *
     * @return void
     */
    public function test_user_can_create_a_new_product()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $user = $this->createUser();

        $product = factory('App\Product')->make();

        $response = $this->actingAs($user)->post('/products', $product->toArray());

        $this->assertEquals(1, Product::all()->count());
    }
    
    /**
     * Test if user can edit an product
     *
     * @return void
     */
    public function test_user_can_edit_a_product()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $user = $this->createUser();

        $product = factory('App\Product')->create();

        $productEdit = factory('App\Product')->make([
            'sku' => $product->sku
        ]);

        $response = $this->actingAs($user)->patch("/products/{$product->sku}", $productEdit->toArray());

        $this->assertEquals($productEdit->title, Product::where('sku', $product->sku)->first()->title);
    }

    /**
     * Tests whether the user receives an error when give a repeated SKU
     *
     * @return void
     */
    public function test_user_receive_error_repeated_sku()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $user = $this->createUser();

        $firstProduct = factory('App\Product')->create();
        $secondProduct = factory('App\Product')->create();

        $productEdit = factory('App\Product')->make([
            'sku' => $secondProduct->sku
        ]);

        $response = $this->actingAs($user)->patch("/products/{$firstProduct->sku}", $productEdit->toArray());

        $response->assertSessionHasErrors('sku');
    }

    /**
     * Test if user can delete a product
     *
     * @return void
     */
    public function test_usar_can_delete_a_product()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $user = $this->createUser();

        $product = factory('App\Product')->create();

        $response = $this->actingAs($user)->delete("/products/{$product->sku}");

        $this->assertEquals(0, Product::where('sku', $product->sku)->count());
    }

    /**
     * Creates a new instance of user model
     *
     * @return void
     */
    private function createUser() {
        return $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@appmax.com.br',
            'password' => Hash::make('appmax')
        ]);
    }
}
