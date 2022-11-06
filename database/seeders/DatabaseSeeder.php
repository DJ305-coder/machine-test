<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::create(['name' => 'United State']);
  
        $state = State::create(['country_id' => $country->id, 'name' => 'Florida']);
  
        City::create(['state_id' => $state->id, 'name' => 'Miami']);
        City::create(['state_id' => $state->id, 'name' => 'Tampa']);
        
        $country = Country::create(['name' => 'India']);
          
        $state = State::create(['country_id' => $country->id, 'name' => 'Maharashtra']);
        City::create(['state_id' => $state->id, 'name' => 'Pune']);
        City::create(['state_id' => $state->id, 'name' => 'Mumbai']);
        
        $state = State::create(['country_id' => $country->id, 'name' => 'Gujarat']);
        City::create(['state_id' => $state->id, 'name' => 'Rajkot']);
        City::create(['state_id' => $state->id, 'name' => 'Surat']);
    }
}
