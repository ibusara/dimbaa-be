<?php

namespace App\Http\Controllers;

use App\Models\Apparel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApparelController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:view-apparel', ['only' => ['index']]);
        $this->middleware('permission:add-apparel', ['only' => ['store']]);
        $this->middleware('permission:edit-apparel', ['only' => ['update']]);
        $this->middleware('permission:delete-apparel', ['only' => ['destory']]);
    }
    
    public function index(Request $request){
        $request->validate([
            'match_id'=>'required|integer|exists:match_records,id'
        ]);
        $apparels = Apparel::query()->with(['home_team:id,name','away_team:id,name','match'])->where('match_id','=',$request->match_id)->get();
        return response()->json([
            'success' => true,
            'message' => 'Apparels fetched successfully',
            'apparels' => $apparels
        ], 200);
    }
    public function store(Request $request){
        $request->validate([
            'match_id'=>'required|exists:match_records,id',
            'team_type'=>'required|in:home,away',
            'home_team_id'=>'required|exists:teams,id|different:away_team_id',
            'away_team_id'=>'required|exists:teams,id|different:home_team_id',
            'start_date'=>'required',
            'end_date'=>'required',
            'home_color'=>'required_if:team_type,home',
            'home_socks_image'=>'required_if:team_type,home',
            'home_shirt_image'=>'required_if:team_type,home|image|mimes:jpg,bmp,png,jpeg',
            'home_full_kit_image'=>'required_if:team_type,home|image|mimes:jpg,bmp,png,jpeg',
            'home_short_image'=>'required_if:team_type,home|image|mimes:jpg,bmp,png,jpeg',
            'away_color'=>'required_if:team_type,away',
            'away_socks_image'=>'required_if:team_type,away',
            'away_shirt_image'=>'required_if:team_type,away|image|mimes:jpg,bmp,png,jpeg',
            'away_full_kit_image'=>'required_if:team_type,away|image|mimes:jpg,bmp,png,jpeg',
            'away_short_image'=>'required_if:team_type,away|image|mimes:jpg,bmp,png,jpeg',
            ]);
        $apparel = Apparel::query()->where('match_id',$request->match_id);
        if ($apparel->exists()){
            $kit_image = null;
            $short_image = null;
            $shirt_image = null;
            $socks_image = null;
            switch ($request->team_type){
                case 'away':
                    $kit_file = $request->file('away_full_kit_image');
                    $kit_file_name = $request->match_id.'-away-kit-'.$request->away_team_id.time().'.'.$kit_file->getClientOriginalExtension();
                    $kit_image ="images/$kit_file_name";
                    Storage::putFileAs('images',$kit_file,$kit_file_name,'public');

                    $short_file = $request->file('away_short_image');
                    $short_file_name = $request->match_id.'-away-short-'.$request->away_team_id.time().'.'.$short_file->getClientOriginalExtension();
                    $short_image ="images/$short_file_name";
                    Storage::putFileAs('images',$short_file,$short_file_name,'public');

                    $shirt_file = $request->file('away_shirt_image');
                    $shirt_file_name = $request->match_id.'-away-shirt-'.$request->away_team_id.time().'.'.$shirt_file->getClientOriginalExtension();
                    $shirt_image ="images/$shirt_file_name";
                    Storage::putFileAs('images',$shirt_file,$shirt_file_name,'public');

                    $socks_file = $request->file('away_socks_image');
                    $socks_file_name = $request->match_id.'-away-socks-'.$request->away_team_id.time().'.'.$socks_file->getClientOriginalExtension();
                    $socks_image ="images/$socks_file_name";
                    Storage::putFileAs('images',$socks_file,$socks_file_name,'public');
                    $data = $request->all();
                    unset($data['team_type']);
                    $data['away_full_kit_image'] = $kit_image;
                    $data['away_socks_image'] = $socks_image;
                    $data['away_shirt_image'] = $shirt_image;
                    $data['away_short_image'] = $short_image;
                    $apparel->update($data);
                break;
                default:
                    $kit_file = $request->file('home_full_kit_image');
                    $kit_file_name = $request->match_id.'-home-kit-'.$request->home_team_id.time().'.'.$kit_file->getClientOriginalExtension();
                    $kit_image ="images/$kit_file_name";
                    Storage::putFileAs('images',$kit_file,$kit_file_name,'public');

                    $short_file = $request->file('home_short_image');
                    $short_file_name = $request->match_id.'-home-short-'.$request->home_team_id.time().'.'.$short_file->getClientOriginalExtension();
                    $short_image ="images/$short_file_name";
                    Storage::putFileAs('images',$short_file,$short_file_name,'public');

                    $shirt_file = $request->file('home_shirt_image');
                    $shirt_file_name = $request->match_id.'-home-shirt-'.$request->home_team_id.time().'.'.$shirt_file->getClientOriginalExtension();
                    $shirt_image ="images/$shirt_file_name";
                    Storage::putFileAs('images',$shirt_file,$shirt_file_name,'public');

                    $socks_file = $request->file('home_socks_image');
                    $socks_file_name = $request->match_id.'-home-socks-'.$request->home_team_id.time().'.'.$socks_file->getClientOriginalExtension();
                    $socks_image ="images/$socks_file_name";
                    Storage::putFileAs('images',$socks_file,$socks_file_name,'public');
                    $data = $request->all();
                    unset($data['team_type']);
                    $data['home_full_kit_image'] = $kit_image;
                    $data['home_socks_image'] = $socks_image;
                    $data['home_shirt_image'] = $shirt_image;
                    $data['home_short_image'] = $short_image;
                    $apparel->update($data);
                    break;
            }
            $datum = $apparel->first();
            $msg = "Apparel updated successfully";
        }else{
            $kit_image = null;
            $short_image = null;
            $shirt_image = null;
            $socks_image = null;
            switch ($request->team_type){
                case 'away':
                    $kit_file = $request->file('away_full_kit_image');
                    $kit_file_name = $request->match_id.'-away-kit-'.$request->away_team_id.time().'.'.$kit_file->getClientOriginalExtension();
                    $kit_image ="images/$kit_file_name";
                    Storage::putFileAs('images',$kit_file,$kit_file_name,'public');

                    $short_file = $request->file('away_short_image');
                    $short_file_name = $request->match_id.'-away-short-'.$request->away_team_id.time().'.'.$short_file->getClientOriginalExtension();
                    $short_image ="images/$short_file_name";
                    Storage::putFileAs('images',$short_file,$short_file_name,'public');

                    $shirt_file = $request->file('away_shirt_image');
                    $shirt_file_name = $request->match_id.'-away-shirt-'.$request->away_team_id.time().'.'.$shirt_file->getClientOriginalExtension();
                    $shirt_image ="images/$shirt_file_name";
                    Storage::putFileAs('images',$shirt_file,$shirt_file_name,'public');

                    $socks_file = $request->file('away_socks_image');
                    $socks_file_name = $request->match_id.'-away-socks-'.$request->away_team_id.time().'.'.$socks_file->getClientOriginalExtension();
                    $socks_image ="images/$socks_file_name";
                    Storage::putFileAs('images',$socks_file,$socks_file_name,'public');
                    $data = $request->all();
                    unset($data['team_type']);
                    $data['away_full_kit_image'] = $kit_image;
                    $data['away_socks_image'] = $socks_image;
                    $data['away_shirt_image'] = $shirt_image;
                    $data['away_short_image'] = $short_image;
                    $datum = Apparel::create($data);
                    break;
                default:
                    $kit_file = $request->file('home_full_kit_image');
                    $kit_file_name = $request->match_id.'-home-kit-'.$request->home_team_id.time().'.'.$kit_file->getClientOriginalExtension();
                    $kit_image ="images/$kit_file_name";
                    Storage::putFileAs('images',$kit_file,$kit_file_name,'public');

                    $short_file = $request->file('home_short_image');
                    $short_file_name = $request->match_id.'-home-short-'.$request->home_team_id.time().'.'.$short_file->getClientOriginalExtension();
                    $short_image ="images/$short_file_name";
                    Storage::putFileAs('images',$short_file,$short_file_name,'public');

                    $shirt_file = $request->file('home_shirt_image');
                    $shirt_file_name = $request->match_id.'-home-shirt-'.$request->home_team_id.time().'.'.$shirt_file->getClientOriginalExtension();
                    $shirt_image ="images/$shirt_file_name";
                    Storage::putFileAs('images',$shirt_file,$shirt_file_name,'public');

                    $socks_file = $request->file('home_socks_image');
                    $socks_file_name = $request->match_id.'-home-socks-'.$request->home_team_id.time().'.'.$socks_file->getClientOriginalExtension();
                    $socks_image ="images/$socks_file_name";
                    Storage::putFileAs('images',$socks_file,$socks_file_name,'public');
                    $data = $request->all();
                    unset($data['team_type']);
                    $data['home_full_kit_image'] = $kit_image;
                    $data['home_socks_image'] = $socks_image;
                    $data['home_shirt_image'] = $shirt_image;
                    $data['home_short_image'] = $short_image;
                    $datum = Apparel::create($data);
                    break;
            }
          $msg =  'Apparels created successfully';
        }
       return response()->json([
           'success' => true,
           'message' => $msg,
           'apparels' => $datum
       ],200) ;
    }
    public function update(Request $request,$id){
        $apparel = $this->store($request);
        return response()->json([
            'success' => true,
            'message' => 'Apparels updated successfully',
            'apparels' => $apparel
        ],200) ;
    }
    public function destroy(Apparel $apparels){
        $apparels->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Apparel deleted successfully',
            'data'=>[],
        ],200);
    }
}
