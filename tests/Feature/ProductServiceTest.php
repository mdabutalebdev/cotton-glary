<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::create(['name' => 'Admin', 'email' => 'a@test.test', 'role' => 'admin', 'password' => bcrypt('x')]);
    }

    private function customer(): User
    {
        return User::create(['name' => 'User', 'email' => 'u@test.test', 'role' => 'user', 'password' => bcrypt('x')]);
    }

    private function category(array $o = []): Category
    {
        return Category::create(array_merge(['name' => 'Chefwear', 'slug' => 'chefwear', 'sort_order' => 0, 'is_active' => true], $o));
    }

    public function test_products_page_shows_active_categories_and_products(): void
    {
        $cat = $this->category();
        Product::create(['category_id' => $cat->id, 'name' => 'Chef Shirt', 'design_code' => 'CG_1', 'is_active' => true, 'sort_order' => 1]);

        $this->get(route('products'))
            ->assertOk()
            ->assertSee('Chefwear')
            ->assertSee('Chef Shirt')
            ->assertDontSee('Add to cart');
    }

    public function test_products_page_hides_categories_with_no_products(): void
    {
        $this->category(['name' => 'Empty Cat', 'slug' => 'empty-cat']);

        $this->get(route('products'))->assertOk()->assertDontSee('Empty Cat');
    }

    public function test_guests_cannot_manage_products(): void
    {
        $this->get(route('admin.categories.index'))->assertRedirect(route('login'));
        $this->get(route('admin.products.index'))->assertRedirect(route('login'));
    }

    public function test_non_admins_are_forbidden(): void
    {
        $this->actingAs($this->customer())->get(route('admin.products.index'))->assertForbidden();
    }

    public function test_admin_can_view_category_screens(): void
    {
        $cat = $this->category();
        $admin = $this->admin();

        $this->actingAs($admin)->get(route('admin.categories.index'))->assertOk()->assertSee('Chefwear');
        $this->actingAs($admin)->get(route('admin.categories.create'))->assertOk();
        $this->actingAs($admin)->get(route('admin.categories.edit', $cat))->assertOk();
    }

    public function test_admin_can_create_a_category(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.categories.store'), ['name' => 'Foot Wear', 'sort_order' => 1, 'is_active' => 1])
            ->assertRedirect(route('admin.categories.index'));

        $this->assertDatabaseHas('categories', ['name' => 'Foot Wear', 'slug' => 'foot-wear']);
    }

    public function test_admin_can_view_product_screens_and_create(): void
    {
        $cat = $this->category();
        $product = Product::create(['category_id' => $cat->id, 'name' => 'Chef Shirt', 'is_active' => true, 'sort_order' => 1]);
        $admin = $this->admin();

        $this->actingAs($admin)->get(route('admin.products.index'))->assertOk()->assertSee('Chef Shirt');
        $this->actingAs($admin)->get(route('admin.products.create'))->assertOk();
        $this->actingAs($admin)->get(route('admin.products.edit', $product))->assertOk();

        $this->actingAs($admin)
            ->post(route('admin.products.store'), ['category_id' => $cat->id, 'name' => 'Chef Jacket', 'design_code' => 'CG_9', 'sort_order' => 2, 'is_active' => 1])
            ->assertRedirect(route('admin.products.index'));

        $this->assertDatabaseHas('products', ['name' => 'Chef Jacket', 'category_id' => $cat->id]);
    }

    public function test_deleting_a_category_removes_its_products(): void
    {
        $cat = $this->category();
        Product::create(['category_id' => $cat->id, 'name' => 'X', 'is_active' => true, 'sort_order' => 1]);

        $this->actingAs($this->admin())->delete(route('admin.categories.destroy', $cat));

        $this->assertDatabaseCount('products', 0);
        $this->assertDatabaseCount('categories', 0);
    }

    public function test_product_requires_category_and_name(): void
    {
        $this->actingAs($this->admin())
            ->post(route('admin.products.store'), ['name' => ''])
            ->assertSessionHasErrors(['category_id', 'name']);
    }
}
