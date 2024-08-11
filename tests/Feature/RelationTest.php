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
        $divition = $employee->divition()->first();
        $this->assertEquals($divition->id, $employee->id_divition);
    }
}
