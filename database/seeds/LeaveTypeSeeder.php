<?php

use Illuminate\Database\Seeder;
use App\LeaveType;
class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveType::create([
            'name' => 'Casual Leave' 
        ]);

        LeaveType::create([
            'name' => 'Medical Leave'
            
        ]);
         LeaveType::create([
            'name' => 'Earning Leave' 
        ]);

      
    }
}
