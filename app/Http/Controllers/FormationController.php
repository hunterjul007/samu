<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Personnel;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    //
    public function index()
    {
        // abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $personnels = Personnel::all();
        $formations = Formation::all();
        return view('admin.formation.index', compact('personnels', 'formations'));
    }

    public function formation()
    {
        // abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $formations = Formation::all();  
        return view('admin.formation.formationList',  compact('formations'));
    }

    public function detail($id)
    {
        // abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $personnel = Personnel::find($id);
        return view('admin.formation.detail', compact('personnel'));
    }

    public function storePersonnel(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $pathImage = 'images/' . $imageName;
            $data['image'] = $pathImage;
            // return response()->json(['message' => $data['image']], 200);
        }
        // return response()->json(['message' => $data['titre_personnel']], 200);
        Personnel::create($data);
        return redirect('/admin/dashboard/personnels')->with('status', 'Evénement ajouté!', 'color', 'success');
    }
    public function updatePersonnel(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $pathImage = 'images/' . $imageName;
            $data['image'] = $pathImage;
        }
        if (isset($request->publisherToShop)) {
            Personnel::find($request->id)->update(['published' =>  $request->publisherToShop]);
            return redirect('/admin/dashboard/personnels')->with('status', 'Evénement modifié!',  'color', 'success');
        }else{
            Personnel::find($request->id)->update($data);
            return redirect('/admin/dashboard/personnel/' . $request->id)->with('status', 'Evénement modifié!',  'color', 'success');
        }

      
    }

    public function deletePersonnel($id)
    {
        Personnel::destroy($id);
        return redirect('/admin/dashboard/personnels')->with('status', 'Evénement supprimé!',  'color', 'danger');
    }
    public function storeFormation(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image_formation')) {
            $image = $request->image_formation;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $pathImage = 'images/' . $imageName;
            $data['image_formation'] = $pathImage;
            // return response()->json(['message' => $data['image']], 200);
        }
        $data['published'] = 1;
        Formation::create($data);
        return redirect('/admin/dashboard/formations')->with('status', 'Evénement ajouté!', 'color', 'success');
    }
    public function updateFormation(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('image_formation')) {
            $image = $request->image_formation;
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $pathImage = 'images/' . $imageName;
            $data['image_formation'] = $pathImage;
            // return response()->json(['message' => $data['image']], 200);
        }
        Formation::find($request->id)->update($data);
        return redirect('/admin/dashboard/formations')->with('status', 'Evénement modifié!',  'color', 'success');
    }

    public function deleteFormation($id)
    {
        Formation::destroy($id);
        return redirect('/admin/dashboard/formations')->with('status', 'Evénement supprimé!',  'color', 'danger');
    }

}
