<?php

namespace Tests\Feature;

use Tests\TestCase;

class PlateauTest extends TestCase
{
    public function providePlateauData(): array
    {
        return [
            [
                'x' => mt_rand(10, 200),
                'y' => mt_rand(10, 200),
            ],
        ];
    }

    /**
     * @dataProvider providePlateauData
     * @covers       \App\Http\Controllers\PlateauController::store
     */
    public function test_createPlateauSuccessful($x, $y)
    {
        $response = $this->postJson('/api/plateau', ['x' => $x, 'y' => $y,]);

        $response->assertStatus(200);
        $this->assertNotEmpty($response->json('id'));
    }

    /**
     * @covers \App\Http\Controllers\PlateauController::store
     */
    public function test_createPlateauMissingCoordinates()
    {
        $response = $this->postJson('/api/plateau', []);
        $response->assertStatus(422);
        $response->assertJsonMissing(['id']);
    }

    /** @covers \App\Http\Controllers\PlateauController::show */
    public function test_getPlateau()
    {
        $response = $this->getJson(sprintf('/api/plateau/%s', "1"));

        $response->assertStatus(200);
    }

    /** @covers \App\Http\Controllers\PlateauController::show */
    public function test_getPlateauNotFound()
    {
        $response = $this->getJson(sprintf('/api/plateau/%s', "0"));

        $response->assertStatus(404);
    }

    /** @covers \App\Http\Controllers\PlateauController::all */
    public function test_getPlateauList()
    {
        $response = $this->get('/api/plateau');

        $response->assertStatus(200);

        $this->assertIsArray($response->json(), 'response body is array');
        $this->assertNotEmpty($response->json(), 'response body isn\'t empty');
    }
}
