<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountWordsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test1(){
        $request = [
            "sentence" => "A list of words (words)"
        ];
        $responseValue =    [
                "A"=> 1,
                "list" => 1,
                "of"=> 1,
                "words" => 2
            ];
        $response = $this->json('POST', 'api/v1/countwords', $request);
        $response
            ->assertStatus(200)
            ->assertJson( $responseValue);
    }
    public function test2(){
        $request = [
            "sentence" => "a question? a assertion."
        ];
        $responseValue =    [
            "a"=> 2,"question" => 1,"assertion" =>1
        ];
        $response = $this->json('POST', 'api/v1/countwords', $request);
        $response
            ->assertStatus(200)
            ->assertJson( $responseValue);
    }
    public function test3(){
        $request = [
            "sentence" => "test / test"
        ];
        $responseValue =    [
                "test"=> 2,
            ];
        $response = $this->json('POST', 'api/v1/countwords', $request);
        $response
            ->assertStatus(200)
            ->assertJson( $responseValue);
    }
    public function test4(){
        $request = [
            "sentence" => "Hello (world)!"
        ];
        $responseValue =    [
            "Hello"=>1,"world"=>1
            ];
        $response = $this->json('POST', 'api/v1/countwords', $request);
        $response
            ->assertStatus(200)
            ->assertJson( $responseValue);
    }
    public function test5(){
        $request = [
            "sentence" => ""
        ];
        $responseValue =    [

            ];
        $response = $this->json('POST', 'api/v1/countwords', $request);
        $response
            ->assertStatus(200)
            ->assertJson( $responseValue);
    }

}
