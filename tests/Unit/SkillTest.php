<?php

namespace Informate\Tests\Unit;

use Informate\Models\Entytys\About\Skill;
use Informate\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SkillTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_skill_with_kebab_case_code()
    {
        $skill = Skill::create([
            'code' => 'PHP Programming',
            'name' => 'PHP Programming',
            'description' => 'Programming in PHP language',
        ]);

        $this->assertEquals('php-programming', $skill->code);
        $this->assertEquals('PHP Programming', $skill->name);
    }

    /** @test */
    public function it_creates_hierarchical_skills()
    {
        $parent = Skill::create([
            'code' => 'backend',
            'name' => 'Backend Development',
        ]);

        $child = Skill::create([
            'code' => 'php',
            'name' => 'PHP',
            'skill_code' => 'backend',
        ]);

        $this->assertNotNull($child->parent);
        $this->assertEquals('backend', $child->parent->code);
        $this->assertEquals($parent->id, $child->parent->id);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Skill::create([
            'code' => 'test',
        ]);
    }

    /** @test */
    public function it_has_correct_table_name()
    {
        $skill = new Skill();
        $this->assertEquals('skills', $skill->getTable());
    }

    /** @test */
    public function it_has_correct_primary_key()
    {
        $skill = new Skill();
        $this->assertEquals('code', $skill->getKeyName());
        $this->assertEquals('string', $skill->getKeyType());
        $this->assertFalse($skill->getIncrementing());
    }
}
