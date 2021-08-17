<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRover;
use App\Http\Requests\SendCommandsToRover;
use App\Models\Plateau;
use App\Models\Rover;

class RoverController extends Controller
{
    protected array $directions = ['W', 'N', 'E', 'S'];

    public function store(int $plateauId, CreateRover $request)
    {
        /** @var Plateau $plateau */
        $plateau = Plateau::find($plateauId);

        if (!$plateau) {
            return response('', 404);
        }

        if ($plateau->x < $request->get('x') || $plateau->y < $request->get('y')) {
            return response('', 422);
        }

        $rover = new Rover([
                               'x' => $request->get('x'),
                               'y' => $request->get('y'),
                               'face' => $request->get('face'),
                           ]);

        $plateau->rovers()->save($rover);

        return response()->json(['id' => $rover->id]);
    }

    public function all(?int $plateauId = null)
    {
        $columns = ['id', 'x', 'y', 'face'];

        if (!$plateauId) {
            $result = Rover::all(array_merge($columns, ['plateau_id']));
        } else {
            $result = Rover::query()->where(['plateau_id' => $plateauId])->get($columns);
        }

        if (!$result) {
            return response('', 404);
        }

        return response()->json($result);
    }

    public function show(int $roverId)
    {
        $result = Rover::find($roverId, ['x', 'y', 'face', 'plateau_id']);

        if (!$result) {
            return response('', 404);
        }

        return response()->json($result);
    }

    public function command(int $roverId, SendCommandsToRover $request)
    {
        /** @var Rover $rover */
        $rover = Rover::query()->with('plateau')->find($roverId);

        if (!$rover) {
            return response('', 404);
        }

        foreach (str_split($request->get('commands')) as $command) {
            if ($command == 'M') {
                $this->move($rover);

                continue;
            }

            $this->turn($rover, $command);
        }

        $rover->save();

        return response()->json(
            [
                'x' => $rover->x,
                'y' => $rover->y,
                'face' => $rover->face,
                'plateau_id' => $rover->plateau_id,
            ]
        );
    }

    /**
     * @param Rover $rover
     * @param string $direction L or R
     */
    protected function turn(Rover &$rover, string $direction)
    {
        $directionIndex = array_search($rover->face, $this->directions);
        $directionIndex = ($directionIndex + ($direction == 'L' ? -1 : +1)) % 4;

        if (0 > $directionIndex) {
            $directionIndex += 4;
        }

        $rover->face = $this->directions[$directionIndex];
    }

    protected function move(Rover &$rover)
    {
        $plateau = $rover->plateau()->first();

        switch (true) {
            case in_array($rover->face, ['W', 'E']):
                $rover->x += 'E' == $rover->face ? +1 : -1;
                $rover->x = max(min($rover->x, $plateau->x), 0);

                return;
            default:
                $rover->y += 'N' == $rover->face ? +1 : -1;
                $rover->y = max(min($rover->y, $plateau->y), 0);
        }
    }
}
