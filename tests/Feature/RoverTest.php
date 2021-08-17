<?php

namespace Tests\Feature;

use Tests\TestCase;

class RoverTest extends TestCase
{
    public function provideRoverCoordinates(): array
    {
        $compass = ['W', 'N', 'E', 'S'];

        return [
            'valid rover coordinates' => [
                'plateauId' => 1,
                'x' => mt_rand(5, 10),
                'y' => mt_rand(5, 10),
                'face' => $compass[array_rand($compass)],
                'expectedStatus' => 200,
            ],
            'rover coordinates outside of plateau' => [
                'plateauId' => 1,
                'x' => mt_rand(20, 29),
                'y' => mt_rand(20, 29),
                'face' => $compass[array_rand($compass)],
                'expectedStatus' => 422,
            ],
            'plateau not found' => [
                'plateauId' => 0,
                'x' => mt_rand(5, 10),
                'y' => mt_rand(5, 10),
                'face' => $compass[array_rand($compass)],
                'expectedStatus' => 404,
            ],
        ];
    }

    /**
     * @dataProvider provideRoverCoordinates
     * @covers       \App\Http\Controllers\RoverController::store
     */
    public function test_createRoverSuccessful($plateauId, $x, $y, $face, $expectedStatus)
    {
        $this
            ->postJson(
                sprintf('/api/plateau/%s/rover', $plateauId),
                ['x' => $x, 'y' => $y, 'face' => $face]
            )
            ->assertStatus($expectedStatus);
    }

    /**
     * @covers \App\Http\Controllers\RoverController::store
     */
    public function test_createRoverMissingCoordinates()
    {
        $this
            ->postJson(sprintf('/api/plateau/%s/rover', "1"), [])
            ->assertStatus(422);
    }

    /** @covers \App\Http\Controllers\RoverController::show */
    public function test_getRover()
    {
        $this
            ->getJson(sprintf('/api/rover/%s', "1"))
            ->assertStatus(200);
    }

    /** @covers \App\Http\Controllers\RoverController::show */
    public function test_getRoverNotFound()
    {
        $this
            ->getJson(sprintf('/api/rover/%s', "0"))
            ->assertStatus(404);
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
