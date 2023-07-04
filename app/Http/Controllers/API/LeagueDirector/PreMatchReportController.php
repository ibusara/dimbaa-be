<?php

namespace App\Http\Controllers\API\LeagueDirector;

use App\Http\Controllers\Controller;
use App\Http\Resources\PreMatchResource;
use App\Models\MatchRecord;
use App\Models\PreMatchChallenge;
use App\Models\PreMatchColor;
use App\Models\PreMatchCondition;
use App\Models\PreMatchCoOperation;
use App\Models\PreMatchFinal;
use App\Models\PreMatchIssue;
use App\Models\PreMatchOperation;
use App\Models\PreMatchReport;
use Illuminate\Http\Request;

class PreMatchReportController extends Controller
{
    /**
     * storeMatchReport.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function match(Request $request)
    {
        $request->validate([
            'match_id' => 'required|exists:match_records,id',
            'away_team' => 'required|integer|exists:teams,id',
            'city' => 'required',
            'competition' => 'required',
            'home_team' => 'required|integer|exists:teams,id',
            'kick_off_time' => 'required',
            'match_commissionar' => 'required',
            'match_date' => 'required',
            'match_number' => 'required|exists:match_records,id',
            'stadium' => 'required'
        ]);

        $prematchReport = PreMatchReport::create([
            'match_id' => $request->match_id,
            'away_team' => $request->away_team,
            'city' => $request->city,
            'competition' => $request->competition,
            'home_team' => $request->home_team,
            'kick_off_time' => $request->kick_off_time,
            'match_commissionar' => $request->match_commissionar,
            'match_date' => $request->match_date,
            'match_number' => $request->match_number,
            'stadium' => $request->stadium
        ]);

        return response()->json([
            'success' => true,
            'data' => $prematchReport,
            'message' => 'PreMatch Report created successfully!'
        ], 200);
    }

    /**
     * storeMatchReport Conditions.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCondition(Request $request)
    {
        $request->validate([
            'expected_stadium_attendance' => 'required|numeric',
            'flood_lights' =>  'required',
            'match_balls' =>  'required|numeric',
            'pitch_quality' =>  'required',
            'security' =>  'required',
            'stadium_preparation' =>  'required',
            'weather' =>  'required'
        ]);

        $prematchCondition = PreMatchCondition::create([
            'expected_stadium_attendance' => $request->expected_stadium_attendance,
            'flood_lights' =>  $request->flood_lights,
            'match_balls' =>  $request->match_balls,
            'pitch_quality' =>  $request->pitch_quality,
            'security' =>  $request->security,
            'stadium_preparation' =>  $request->stadium_preparation,
            'weather' =>  $request->weather
        ]);

        return response()->json([
            'success' => true,
            'data' => $prematchCondition,
            'message' => 'PreMatch Report Conditions saved successfully!'
        ], 200);
    }

    /**
     * storeMatchReport Operation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOperation(Request $request)
    {
        $request->validate([
            'cs_email' =>  'required|email',
            'cs_mobile' =>  'required',
            'cs_name' =>  'required',
            'gc_email' =>  'required|email',
            'gc_mobile' =>  'required',
            'gc_name' =>  'required',
            'md_email' =>  'required|email',
            'md_mobile' =>  'required',
            'md_name' =>  'required',
            'mo_email' =>  'required|email',
            'mo_mobile' =>  'required',
            'mo_name' =>  'required',
            'ra_email' =>  'required|email',
            'ra_mobile' =>  'required',
            'ra_name' =>  'required',
            'so_email' =>  'required|email',
            'so_mobile' =>  'required',
            'so_name' =>  'required',
            'ta_email' =>  'required|email',
            'ta_mobile' =>  'required',
            'ta_name' =>  'required'
        ]);

        $prematchOperation = PreMatchOperation::create([
            'cs_email' => $request->cs_email,
            'cs_mobile' =>  $request->cs_mobile,
            'cs_name' =>  $request->cs_name,
            'gc_email' =>  $request->gc_email,
            'gc_mobile' =>  $request->gc_mobile,
            'gc_name' =>  $request->gc_name,
            'md_email' =>  $request->md_email,
            'md_mobile' =>  $request->md_mobile,
            'md_name' =>  $request->md_name,
            'mo_email' =>  $request->mo_email,
            'mo_mobile' =>  $request->mo_mobile,
            'mo_name' =>  $request->mo_name,
            'ra_email' =>  $request->ra_email,
            'ra_mobile' =>  $request->ra_mobile,
            'ra_name' =>  $request->ra_name,
            'so_email' =>  $request->so_email,
            'so_mobile' =>  $request->so_mobile,
            'so_name' =>  $request->so_name,
            'ta_email' =>  $request->ta_email,
            'ta_mobile' =>  $request->ta_mobile,
            'ta_name' =>  $request->ta_name
        ]);

        return response()->json([
            'success' => true,
            'data' => $prematchOperation,
            'message' => 'PreMatch Report Operation saved successfully!'
        ], 200);
    }

    /**
     * storeMatchReport CoOperation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCooperation(Request $request)
    {
        $request->validate([
            'name' =>  'required',
            'center_supervisor' =>  'required',
            'fa_r' =>  'required',
            'home_team' =>  'required',
            'operation_team' =>  'required',
            'referees' =>  'required',
            'security_authorities' =>  'required',
            'stadium_management' =>  'required',
            'visiting_team' =>  'required'
        ]);

        $prematchCoOperation = PreMatchCoOperation::create([
            'name' => $request->name,
            'center_supervisor' => $request->center_supervisor,
            'fa_r' =>  $request->fa_r,
            'home_team' =>  $request->home_team,
            'operation_team' =>  $request->operation_team,
            'referees' =>  $request->referees,
            'security_authorities' =>  $request->security_authorities,
            'stadium_management' =>  $request->stadium_management,
            'visiting_team' =>  $request->visiting_team
        ]);

        return response()->json([
            'success' => true,
            'data' => $prematchCoOperation,
            'message' => 'PreMatch Report CoOperation saved successfully!'
        ], 200);
    }

    /**
     * storeMatchReport Colors.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeColors(Request $request)
    {
        $request->validate([
            'away_team_fp_jersey' =>  'required',
            'away_team_fp_shorts' =>  'required',
            'away_team_fp_socks' =>  'required',
            'away_team_gk_jersey' =>  'required',
            'away_team_gk_shorts' =>  'required',
            'away_team_gk_socks' =>  'required',
            'home_team_fp_jersey' =>  'required',
            'home_team_fp_shorts' =>  'required',
            'home_team_fp_socks' =>  'required',
            'home_team_gk_jersey' =>  'required',
            'home_team_gk_shorts' =>  'required',
            'home_team_gk_socks' =>  'required'
        ]);

        $prematchColor = PreMatchColor::create([
            'away_team_fp_jersey' =>  $request->away_team_fp_jersey,
            'away_team_fp_shorts' =>  $request->away_team_fp_shorts,
            'away_team_fp_socks' =>  $request->away_team_fp_socks,
            'away_team_gk_jersey' =>  $request->away_team_gk_jersey,
            'away_team_gk_shorts' =>  $request->away_team_gk_shorts,
            'away_team_gk_socks' =>  $request->away_team_gk_socks,
            'home_team_fp_jersey' =>  $request->home_team_fp_jersey,
            'home_team_fp_shorts' =>  $request->home_team_fp_shorts,
            'home_team_fp_socks' =>  $request->home_team_fp_socks,
            'home_team_gk_jersey' =>  $request->home_team_gk_jersey,
            'home_team_gk_shorts' =>  $request->home_team_gk_shorts,
            'home_team_gk_socks' =>  $request->home_team_gk_socks
        ]);

        return response()->json([
            'success' => true,
            'data' => $prematchColor,
            'message' => 'PreMatch Report Color saved successfully!'
        ], 200);
    }

    /**
     * storeMatchReport issues.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeIssues(Request $request)
    {
        $request->validate([
            'issue_one' => 'required',
            'issue_two' => 'required',
            'issue_three' => 'required',
        ]);

        $prematchIssue = PreMatchIssue::create([
            'issue_one' => $request->issue_one,
            'issue_two' =>  $request->issue_two,
            'issue_three' =>  $request->issue_three,
        ]);

        return response()->json([
            'success' => true,
            'data' => $prematchIssue,
            'message' => 'PreMatch Report Issue saved successfully!'
        ], 200);
    }

    /**
     * storeMatchReport challenges.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeChallenges(Request $request)
    {
        $request->validate([
            'one_description' => 'required',
            'one_possible_measure' => 'required',
            'three_description' => 'required',
            'three_possible_measure' => 'required',
            'two_description' => 'required',
            'two_possible_measure' => 'required'
        ]);

        $prematchChallenge = PreMatchChallenge::create([
            'one_description' => $request->one_description,
            'one_possible_measure' => $request->one_possible_measure,
            'three_description' => $request->three_description,
            'three_possible_measure' => $request->three_possible_measure,
            'two_description' => $request->two_description,
            'two_possible_measure' => $request->two_possible_measure
        ]);

        return response()->json([
            'success' => true,
            'data' => $prematchChallenge,
            'message' => 'PreMatch Report Challenge saved successfully!'
        ], 200);
    }

    /**
     * storeMatchReport challenges.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFinal(Request $request)
    {
        $request->validate([
            'additional_remarks' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'signature' => 'required',
            'whatsapp' => 'required'
        ]);

        $prematchFinal = PreMatchFinal::create([
            'additional_remarks' => $request->additional_remarks,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'signature' => $request->signature,
            'whatsapp' => $request->whatsapp
        ]);

        return response()->json([
            'success' => true,
            'data' => $prematchFinal,
            'message' => 'PreMatch Report Final saved successfully!'
        ], 200);
    }
}
