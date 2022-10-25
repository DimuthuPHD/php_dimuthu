<?php

namespace App\Http\Controllers;

use App\Http\Requests\Route\CreateRequest;
use App\Http\Requests\Route\UpdateRequest;
use App\Models\Route;
use App\Repositories\RouteRepository;
use Exception;

class RouteController extends Controller
{

    public function __construct(RouteRepository $routeRepo){
        $this->routeRepo = $routeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('routes.index', ['routes' => $this->routeRepo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('routes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try {
            $this->routeRepo->create($request->validated());
        } catch (\Throwable $th) {
            logger()->error('Store Route - ' . $th->getMessage());
            return back()->withInput()->withErrors('error',  'There was a problem creating this Route. Please try again.');
        }

        return redirect()->route('route.index')->with('success', 'Route created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        return view('routes.edit', ['model' => $route]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $this->routeRepo->update($request->validated(), $id);
        } catch (\Throwable $th) {
            logger()->error('Update Route - ' . $th->getMessage());
            return back()->with('error',  'There was a problem updating this Route. Please try again.');
        }

        return redirect()->route('route.index')->with('success', 'Route updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        try {
            $this->routeRepo->delete($route->id);
        } catch (\Throwable $th) {
            dd($th);
            logger()->error('Destroy Route - ' . $th->getMessage());
            return back()->with('error',  'There was a problem Deleting this Route. Please try again.');
        }

        return redirect()->route('route.index')->with('success', 'Route Deleted successfully');
    }
}
