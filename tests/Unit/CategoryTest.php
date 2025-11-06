<?php

namespace Informate\Tests\Unit;

use Informate\Models\Category;
use Informate\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_category_with_auto_generated_slug()
    {
        $category = Category::create([
            'code' => 'tutorials',
            'title' => ['en' => 'Tutorials', 'pt' => 'Tutoriais'],
        ]);

        $this->assertEquals('tutorials', $category->slug);
        $this->assertIsArray($category->title);
    }

    /** @test */
    public function it_creates_hierarchical_categories()
    {
        $parent = Category::create([
            'code' => 'programming',
            'slug' => ['en' => 'programming'],
            'title' => ['en' => 'Programming'],
        ]);

        $child = Category::create([
            'code' => 'php',
            'slug' => ['en' => 'php'],
            'title' => ['en' => 'PHP'],
            'parent_id' => $parent->id,
        ]);

        $this->assertNotNull($child->parent);
        $this->assertEquals($parent->id, $child->parent->id);
    }

    /** @test */
    public function it_supports_soft_deletes()
    {
        $category = Category::create([
            'code' => 'test',
            'slug' => ['en' => 'test'],
            'title' => ['en' => 'Test'],
        ]);

        $category->delete();

        $this->assertSoftDeleted('categories', ['id' => $category->id]);
    }

    /** @test */
    public function it_has_translatable_attributes()
    {
        $category = Category::create([
            'code' => 'test',
            'slug' => ['en' => 'test', 'pt' => 'teste'],
            'title' => ['en' => 'Test', 'pt' => 'Teste'],
        ]);

        $this->assertEquals('test', $category->getTranslation('slug', 'en'));
        $this->assertEquals('teste', $category->getTranslation('slug', 'pt'));
        $this->assertEquals('Test', $category->getTranslation('title', 'en'));
        $this->assertEquals('Teste', $category->getTranslation('title', 'pt'));
    }
}
