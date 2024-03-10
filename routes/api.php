<?php

// Monthly playtime for each player
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/playtime/{year}/{month}', function ($year, $month) {
        $startOfMonth = Carbon::create($year, $month, 1);
        $endOfMonth = $startOfMonth->copy()->endOfMonth();
    $startOfMonth = $startOfMonth->getTimestampMs();
    $endOfMonth = $endOfMonth->getTimestampMs();


        $playtimes = DB::table('sessions')
            ->select('uuid', DB::raw('SUM(time) as playtime'))
            ->whereBetween('start', [$startOfMonth, $endOfMonth])
            ->groupBy('uuid')
            ->get();

        // Convert playtime from ms to hours

        foreach ($playtimes as $playtime) {
            $playtime->playtime = round($playtime->playtime / 3600000, 2);
        }

        //Check if player is over 35 hours
        foreach ($playtimes as $playtime) {
            if ($playtime->playtime >= 35) {
                //add player Role "Premium" expires in one month
                $testt = \App\Models\Permissions\GroupMember::UpdateOrCreate([
                    'playeruuid' => $playtime->uuid,
                    'groupid' => 12,
                    ],
                    [
                    'server' => '',
                    'expires' => Carbon::now()->addMonth()
                ]);
            }
        }
        dd($testt);

        return response()->json($playtimes);
});

Route::get('/playtime_crafter', function (){
    $playtimes = DB::table('sessions')
        ->select('uuid', DB::raw('SUM(time) as playtime'))
        ->groupBy('uuid')
        ->get();

    // Convert playtime from ms to hours

    foreach ($playtimes as $playtime) {
        $playtime->playtime = round($playtime->playtime / 3600000, 2);
    }

    //Check if player is over 35 hours
    foreach ($playtimes as $playtime) {
        if ($playtime->playtime >= 24) {
            //check if player is in group crafter
            $group = \App\Models\Permissions\GroupMember::where('playeruuid', $playtime->uuid)->where('groupid', 13)->first();
            if ($group == null) {
                //add player Role "Crafter" expires in one month
                \App\Models\Permissions\GroupMember::create([
                    'groupid' => 13,
                    'server' => '',
                    'playeruuid' => $playtime->uuid,
                    'expires_at' => ''
                ]);
            }
        }
    }

    return response()->json($playtimes);
});
