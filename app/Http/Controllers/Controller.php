<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getUsers(): JsonResponse
    {
        $users = User::paginate(5);

        return response()->json(
            [
                'message' => 'Liste des utilisateurs',
                'data' => $users,
            ]
        );
    }

    public function getUserBy($id): JsonResponse
    {
        $user = User::find($id);

        if (! $user) {
            return response()->json([
                'message' => 'Activité non trouvé',
            ], 404);
        }


        return response()->json(
            [
                'message' => 'Utilisateur trouvé',
                'data' => $user,
            ]
        );
    }

    public function getActivities(): JsonResponse
    {
        $activities = Activity::paginate(5);

        return response()->json([
            'message' => 'Liste des activités',
            'data' => $activities,
        ]);
    }

    public function getActivityBy($id): JsonResponse
    {
        $activity = Activity::find($id);

        if (! $activity) {
            return response()->json([
                'message' => 'Activité non trouvé',
            ], 404);
        }

        return response()->json([
            'message' => 'Activité trouvé',
            'data' => $activity,
        ]);
    }

    public function getPerformance($id_user, $id_activity): JsonResponse
    {
        $performance = UserActivity::where([
            'user_id' => $id_user,
            'activity_id' => $id_activity
        ])->first();

        if (! $performance) {
            return response()->json([
                'message' => 'Ressource non trouvée',
            ], 404);
        }

        $speeds = json_decode($performance);
        $speeds->average = DB::table('activity_data')->avg('speed');
        $speeds->speeds = UserActivity::pluck('speed')->toArray();
        return response()->json([
            'message' => 'Performance trouvée',
            'data' => $speeds,
        ]);
    }
}
