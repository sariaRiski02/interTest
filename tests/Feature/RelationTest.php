<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RelationTest extends TestCase
{
    public function testDivitionAndEmployeeRelation()
    {
        $this->artisan('migrate:fresh --seed');
        $employee = Employee::first();

        // dd($employee->toArray());
        $division = $employee->division()->first();
        $this->assertEquals($division->id, $employee->division_id);
    }
}
