<?php

namespace App\Http\Controllers;

use App\Models\Base;
use App\Models\BaseUser;
use App\Models\TypeBase;
use App\Models\Hopital;
use App\Models\Mission;
use App\Models\Unite;
use App\Models\MissionUser;
use App\Models\Personnel_user;
use App\Models\UniteUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MapUserController extends Controller
{
    public function index()
    {
        $hopitals = Hopital::all();
        $typeDeBase = TypeBase::all();
        $baseUser = BaseUser::all();
        $uniteUser = UniteUser::all();
        $personnel = Personnel_user::query()->join('personnels', 'personnels.id', '=', 'personnel_users.personnel_id')->get();
        $missionUser = DB::select("SELECT m.description_mission, mu.id, mu.is_completed  , m.personnel_id, m.type_unite_id, mu.position_x, mu.position_y, mu.icon, mu.etat, m.nom_mission, m.duree, m.recompense, m.image FROM missions AS m, users AS u, mission_users AS mu WHERE m.id = mu.mission_id AND " . Auth::guard('appuser')->user()->id . " = mu.user_id AND mu.is_completed < 1 ;");
        return view('dashboard.game', compact('hopitals', 'uniteUser', 'missionUser', 'personnel', 'personnel', 'typeDeBase', 'baseUser'));
    }
    public function missionList()
    {
        $missionUser = DB::select("SELECT m.description_mission, mu.id, mu.is_completed , m.personnel_id, m.type_unite_id, mu.position_x, mu.position_y, mu.icon, mu.etat, m.nom_mission, m.duree, m.recompense, m.image FROM missions AS m, users AS u, mission_users AS mu WHERE m.id = mu.mission_id AND " . Auth::guard('appuser')->user()->id . " = mu.user_id AND mu.is_completed < 1 ;");
        return response()->json(['response' => $missionUser], 200);
    }

    public function listHospital()
    {
        $hopitals = Hopital::all();
        // return view('admin.map.index', compact('hopitals'));
        return response()->json(['response' => $hopitals], 200);
    }

    public function getHospitalById($id)
    {
        $hopital = Hopital::find($id);
        return response()->json(['response' => $hopital], 200);
    }

    public function getUniteUserById($id)
    {
        $unite = UniteUser::find($id);
        return response()->json(['response' => $unite], 200);
    }

    public function getUniteById($id)
    {
        $unite = Unite::find($id);
        return response()->json(['response' => $unite], 200);
    }

    public function getBaseById($id)
    {
        $base = BaseUser::find($id);
        return response()->json(['response' => $base], 200);
    }

    public function listBase()
    {
        $hopitals = BaseUser::query()->where('user_id', '=', 1)->get();
        // return view('admin.map.index', compact('hopitals'));
        return response()->json(['response' => $hopitals], 200);
    }

    public function updateUniteUser(Request $request)
    {
        $data = $request->all();
        $uniteUser = UniteUser::find($data['unite_user_id']);
        
        if($uniteUser){
            $sante = $uniteUser->sante - (($uniteUser->sante * $uniteUser->taux_usure)/100);
            $uniteUser->update(['etat_unite' => $data['etat_unite'], 'etat_mouvement_unite' =>'en pause', 'sante' => $sante ]);
            $missionUser = MissionUser::find($data['mission_user_id']);
            if ($missionUser) {
                $missionUser->update(['etat' => '0']);
            }
        }
    }

    public function updateUserMission(Request $request){
        $data = $request->all();
        // $id = 47;
        $missionUser = MissionUser::find($data['mission_user_id']);
        $missionUser->update(['etat' => intVal($data['etat']), 'is_completed' => intVal($data['is_completed']) ]);
        return response()->json(['response' => $missionUser  , ], 200);
        // return response()->json(['response' => true  ], 200);
    }

    public function listMission()
    {
        $mission = Mission::orderByRaw("RAND()")->get();
        $origineX = 51.505;
        $origineY = -1.20;
        $countDown = 1500;
        $rayon = rand(-10,10) / 1000;
        $positionY = $origineY + $rayon;
        $positionX = $origineX + $rayon ;
        // $positive = rand(-1, 1);
        // $positiveBoolValue = false;
        // if($positive > 0)
        // {
        //     $positionY = $origineY - $rayon;
        //     $positionX = $origineX - $rayon;
        //     // $positiveBoolValue = true;
        // }
        $nameArray = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
        $rand_keys = array_rand($nameArray, 2);
        $name = $nameArray[$rand_keys[0]];
        return response()->json(['response' => $mission, 'countDown' => $countDown, 'positionX' =>  $positionX, 'positionY' =>  $positionY, 'patient' => $name  ], 200);
    }

    public function addUserMission(Request $request)
    {
        // 0 e cours
        $data = $request->all();
        $data['user_id'] = Auth::guard('appuser')->user()->id;
        $data['is_completed'] = 0;
        MissionUser::create($data);
        // return view('admin.map.index', compact('hopitals'));
        return response()->json(['message' => true], 200);
    }

    public function storeBase(Request $request)
    {
       // return response()->json($request->all(), 200);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $pathImage = 'images/' . $imageName;
            $data['icon_base'] = $pathImage;
            // return response()->json(['message' => $data['image']], 200);
        }
        $data['user_id'] = Auth::guard('appuser')->user()->id;
        BaseUser::create($data);
        return redirect('/admin/dashboard/map')->with('status', 'Base ajoutée!');
    }

}
