<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommandTest extends TestCase
{
    public function provideRoverTurnAroundCommands(): array
    {
        return [
            'LLLL' => [
                'commands' => 'LLLL',
            ],
            'RRRR' => [
                'commands' => 'RRRR',
            ],
            'LRLR' => [
                'commands' => 'LRLR',
            ],
            'RLRL' => [
                'commands' => 'RLRL',
            ],
            'LLRR' => [
                'commands' => 'LLRR',
            ],
            'RRLL' => [
                'commands' => 'RRLL',
            ],
            'LLLLLLLL' => [
                'commands' => 'LLLLLLLL',
            ],
            'RRRRRRRR' => [
                'commands' => 'RRRRRRRR',
            ],
        ];
    }

    /** @covers \App\Http\Controllers\RoverController::command */
    public function provideRoverTurnAroundAndMoveCommands(): array
    {
        return [
            'LMLMLMLMM' => [
                'commands' => 'LMLMLMLMM',
                'roverId' => 1,
                'expected' => [
                    'x' => 10,
                    'y' => 11,
                    'face' => 'N',
                    'plateau_id' => 1,
                ],
            ],
            'RMRMRMM' => [
                'commands' => 'RMRMRMM',
                'roverId' => 2,
                'expected' => [
                    'x' => 9,
                    'y' => 9,
                    'face' => 'W',
                    'plateau_id' => 2,
                ],
            ],
            'LMRMLMRM' => [
                'commands' => 'LMRMLMRM',
                'roverId' => 3,
                'expected' => [
                    'x' => 8,
                    'y' => 12,
                    'face' => 'N',
                    'plateau_id' => 3,
                ],
            ],
            'RMLMRMLM' => [
                'commands' => 'RMLMRMLM',
                'roverId' => 4,
                'expected' => [
                    'x' => 12,
                    'y' => 12,
                    'face' => 'N',
                    'plateau_id' => 4,
                ],
            ],
            'LLMMMMMMMMRMMMMRMMMM' => [
                'commands' => 'LLMMMMMMMMRMMMMRMMMM',
                'roverId' => 5,
                'expected' => [
                    'x' => 6,
                    'y' => 6,
                    'face' => 'N',
                    'plateau_id' => 5,
                ],
            ],
            'RRMMMMMMMMLMMMMLMMMM' => [
                'commands' => 'RRMMMMMMMMLMMMMLMMMM',
                'roverId' => 6,
                'expected' => [
                    'x' => 14,
                    'y' => 6,
                    'face' => 'N',
                    'plateau_id' => 6,
                ],
            ],
            'LLMMLLMMLLMMLLMMR' => [
                'commands' => 'LLMMLLMMLLMMLLMMR',
                'roverId' => 7,
                'expected' => [
                    'x' => 10,
                    'y' => 10,
                    'face' => 'E',
                    'plateau_id' => 7,
                ],
            ],
            'RRMMRRMMRRMMRRMMLL' => [
                'commands' => 'RRMMRRMMRRMMRRMMLL',
                'roverId' => 8,
                'expected' => [
                    'x' => 10,
                    'y' => 10,
                    'face' => 'S',
                    'plateau_id' => 8,
                ],
            ],
            'ML' => [
                'commands' => 'ML',
                'roverId' => 9,
                'expected' => [
                    'x' => 10,
                    'y' => 11,
                    'face' => 'W',
                    'plateau_id' => 9,
                ],
            ],
            'MM' => [
                'commands' => 'MM',
                'roverId' => 10,
                'expected' => [
                    'x' => 10,
                    'y' => 12,
                    'face' => 'N',
                    'plateau_id' => 10,
                ],
            ],
            'MMM' => [
                'commands' => 'MMM',
                'roverId' => 11,
                'expected' => [
                    'x' => 10,
                    'y' => 13,
                    'face' => 'N',
                    'plateau_id' => 11,
                ],
            ],
            'MMMM' => [
                'commands' => 'MMMM',
                'roverId' => 12,
                'expected' => [
                    'x' => 10,
                    'y' => 14,
                    'face' => 'N',
                    'plateau_id' => 12,
                ],
            ],
            'MMMMM' => [
                'commands' => 'MMMMM',
                'roverId' => 13,
                'expected' => [
                    'x' => 10,
                    'y' => 15,
                    'face' => 'N',
                    'plateau_id' => 13,
                ],
            ],
            'MMMMMM' => [
                'commands' => 'MMMMMM',
                'roverId' => 14,
                'expected' => [
                    'x' => 10,
                    'y' => 16,
                    'face' => 'N',
                    'plateau_id' => 14,
                ],
            ],
            'MMMMMMM' => [
                'commands' => 'MMMMMMM',
                'roverId' => 15,
                'expected' => [
                    'x' => 10,
                    'y' => 17,
                    'face' => 'N',
                    'plateau_id' => 15,
                ],
            ],
            'MMMMMMMM' => [
                'commands' => 'MMMMMMMM',
                'roverId' => 16,
                'expected' => [
                    'x' => 10,
                    'y' => 18,
                    'face' => 'N',
                    'plateau_id' => 16,
                ],
            ],
            'MMMMMMMMM' => [
                'commands' => 'MMMMMMMMM',
                'roverId' => 17,
                'expected' => [
                    'x' => 10,
                    'y' => 19,
                    'face' => 'N',
                    'plateau_id' => 17,
                ],
            ],
            'LMMMMMMMMMMMMMMMM' => [
                'commands' => 'LMMMMMMMMMMMMMMMM',
                'roverId' => 18,
                'expected' => [
                    'x' => 0,
                    'y' => 10,
                    'face' => 'W',
                    'plateau_id' => 18,
                ],
            ],
        ];
    }

    /**
     * @dataProvider provideRoverTurnAroundCommands
     * @covers       \App\Http\Controllers\RoverController::command
     */
    public function test_commandTurnAround($commands)
    {
        $roverStatus = $this->get('/api/rover/1');

        $commandResponse = $this->patch('/api/rover/1', ['commands' => $commands]);
        $commandResponse->assertStatus(200);

        $this->assertSame($commandResponse->json(), $roverStatus->json());
    }

    /** @dataProvider provideRoverTurnAroundAndMoveCommands */
    public function test_commandTurnAndMove($commands, $roverId, $expected)
    {
        $commandResponse = $this->patch("/api/rover/{$roverId}", ['commands' => $commands]);
        $commandResponse->assertStatus(200);

        $this->assertSame($commandResponse->json(), $expected);
    }
}
