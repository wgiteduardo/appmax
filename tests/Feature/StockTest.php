<?php

namespace Tests\Feature;

use App\User;
use App\Product;
use App\Stock;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class StockTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if user can see stock page of product
     *
     * @return void
     */
    public function test_user_can_see_stock_page_of_product()
    {
        $user = $this->createUser();

        $product = factory('App\Product')->create();

        $response = $this->actingAs($user)->get("/products/{$product->sku}");

        $response->assertSuccessful();
    }

    /**
     * Tests if the user receives an error message if he withdraws quantities not available
     *
     * @return void
     */
    public function test_user_receive_error_message_withdraw()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $user = $this->createUser();

        $product = factory('App\Product')->create([
            'stock' => 10
        ]);

        $response = $this->actingAs($user)->patch("/products/stock/remove/{$product->sku}", ['stock' => 11]);

        $response->assertSessionHas('error', true);
    }

    /**
     * Tests if the user can remove a quantity from the stock
     *
     * @return void
     */
    public function test_user_can_remove_quantity_from_stock()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $user = $this->createUser();

        $product = factory('App\Product')->create([
            'stock' => 10
        ]);

        $response = $this->actingAs($user)->patch("/products/stock/remove/{$product->sku}", ['stock' => 10]);

        $this->assertEquals(0, Product::where('sku', $product->sku)->first()->stock);
    }

    /**
     * Tests if the user can add a quantity from the stock
     *
     * @return void
     */
    public function test_user_can_add_quantity_from_stock()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        $user = $this->createUser();

        $product = factory('App\Product')->create([
            'stock' => 5
        ]);

        $response = $this->actingAs($user)->patch("/products/stock/add/{$product->sku}", ['stock' => 5]);

        $this->assertEquals(10, Product::where('sku', $product->sku)->first()->stock);
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
