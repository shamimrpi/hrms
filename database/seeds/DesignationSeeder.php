<?php

use Illuminate\Database\Seeder;
use App\Designation;
class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::create([
            'name' => 'AGM' 
        ]);

        Designation::create([
            'name' => 'Manager'
            
        ]);
         Designation::create([
            'name' => 'Trainee Excecutive' 
        ]);

        Designation::create([
            'name' => 'Sr. Manager'
            
        ]);
         Designation::create([
            'name' => 'DGM' 
        ]);

        Designation::create([
            'name' => 'GM'
            
        ]);
         Designation::create([
            'name' => 'Assistant Manager' 
        ]);

        Designation::create([
            'name' => 'Computer Operator'
            
        ]);
         Designation::create([
            'name' => 'Web Developer' 
        ]);

        Designation::create([
            'name' => 'Graphics Designer'
            
        ]);
         Designation::create([
            'name' => 'Sr. Developer' 
        ]);

        Designation::create([
            'name' => 'Jr. Develoer'
            
        ]);
         Designation::create([
            'name' => 'Full Stack Developer ' 
        ]);

        Designation::create([
            'name' => 'Engineer'
            
        ]);
         Designation::create([
            'name' => 'Sr. Engineer' 
        ]);

        Designation::create([
            'name' => 'Jr. Engineer'
            
        ]);
    }
}
