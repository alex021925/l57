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
    public function testExample()
    {
        $this->test1([
            "sentence" => "A list of words (words)"
        ],
            [
                "A"=> 1,
                "list" => 1,
                "of"=> 1,
                "words" => 2
            ]);
    }

    protected function test1($request, $responseValue ){
        $response = $this->json('POST', 'api/v1/countwords', $request);

        $response
            ->assertStatus(200)
            ->assertJson( $responseValue);
    }
}
