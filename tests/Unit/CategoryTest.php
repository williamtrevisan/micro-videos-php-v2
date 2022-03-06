<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    public function testIfUseTraits(): void
    {
        $categoryTraits = array_keys(class_uses(Category::class));
        $traits = [
            SoftDeletes::class,
            Uuid::class,
        ];

        $this->assertEquals($traits, $categoryTraits);
    }

    public function testFillableAttribute(): void
    {
        $category = new Category();
        $fillable = ['name', 'description', 'is_active'];

        $this->assertEquals($fillable, $category->getFillable());
    }

    public function testDatesAttribute(): void
    {
        $category = new Category();
        $dates = ['deleted_at', 'created_at', 'updated_at'];

        $categoryDates = array_values($category->getDates());

        $this->assertEquals($dates, $categoryDates);
        $this->assertCount(count($dates), $categoryDates);
    }

    public function testCastsAttribute(): void
    {
        $casts = ['id' => 'string'];
        $category = new Category();

        $this->assertEquals($casts, $category->getCasts());
    }

    public function testIncrementingAttribute(): void
    {
        $category = new Category();

        $this->assertFalse($category->incrementing);
    }
}
