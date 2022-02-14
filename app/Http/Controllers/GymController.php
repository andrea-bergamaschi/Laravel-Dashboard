<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Gym;
use App\Models\Service;
use App\Models\GymService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class GymController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index() {
        $gyms = Gym::with('service')->paginate(3);
        return view('crud.read', compact('gyms'));
    }

    public function checkboxes() {
        $services = Service::orderBy('id', 'ASC')->get();
        return view('crud.create', compact('services'));
    }
    
    public function create(Request $request) {
        $gym = new Gym;
        $gym->name = $request->name;
        $gym->city = $request->city;
        $gym->save();
       
        
        $services = $request->input('service');
        foreach($services as $service) {
            $gymService = new GymService;
            $gymService->gym_id = $gym->id;
            $gymService->service_id = $service;
            $gymService->save();
        }      
        
        $services = Service::orderBy('id', 'ASC')->get();
        return view('crud.create', compact('services'));
    }

    public function edit(Request $request) {
        if(Auth::user()->role != 2) {
            return redirect('/dashboard');
        } else {
            /*$gym = Gym::find($request->id);
            $services = Service::orderBy('id', 'ASC')->get();
            $gymServices = GymService::where('gym_id', $request->id)->get();*/
            
            $query = Gym::with('service')->where('id', $request->id)->get();
            $gym = $query->first();
            $services = Service::orderBy('id', 'ASC')->get();
            $gymServices = $gym->service;
    
            return view('crud.update', compact('gym', 'services', 'gymServices'));
        }
    }

    public function update(Request $request) {
        if(Auth::user()->role != 2) {
            return redirect('/dashboard');
        } else {
            $gym = Gym::find($request->id);

            $gym->name = $request->name;
            $gym->city = $request->city;
            $gym->save();
    
            $toDelete = GymService::where('gym_id', $request->id);
            $toDelete->delete();
    
            $services = $request->input('service');
            foreach($services as $service) {
                $gymService = new GymService;
                $gymService->gym_id = $gym->id;
                $gymService->service_id = $service;
                $gymService->save();
            }      
            
            return redirect('/dashboard');
        }

    }

    public function destroy(Request $request) {
        if(Auth::user()->role != 2) {
            return redirect('/dashboard');
        } else {
            $gym = Gym::find($request->id);
            $gym->delete();
            return redirect('/dashboard');
        }
    }
}

