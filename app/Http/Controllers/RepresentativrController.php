<?php

namespace App\Http\Controllers;

use App\Http\Requests\Representative\CreateRequest;
use App\Http\Requests\Representative\UpdateRequest;
use App\Models\Representative;
use App\Repositories\RepresentativeRepository;
use App\Repositories\RouteRepository;
use Exception;
use Illuminate\Http\Request;

class RepresentativrController extends Controller
{

    public function __construct(
        RepresentativeRepository $representativeRepo,
        RouteRepository $routeRepo
        ){
        $this->representativeRepo = $representativeRepo;
        $this->routeRepo = $routeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('representative.index', ['representatives' => $this->representativeRepo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('representative.create',
        ['routes' => $this->routeRepo->activeRoutes()]
    );
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
            $representative = $this->representativeRepo->create($request->validated());
            if ($request->has('routes')) {
                $representative->routes()->sync($request->routes);
               }

        } catch (\Throwable $th) {
            logger()->error('Store Representative - ' . $th->getMessage());
            return back()->withInput()->withErrors('error',  'There was a problem creating this Represenative. Please try again.');
        }

        return redirect()->route('representative.index')->with('success', 'Representative created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Representative $representative)
    {
        return view('representative.edit', ['model' => $representative, 'routes' => $this->routeRepo->activeRoutes()]);
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

            if ($representative = $this->representativeRepo->show($id)) {
                $this->representativeRepo->update($request->validated(), $id);
               if ($request->has('routes')) {
                $representative->routes()->sync($request->routes);
               }

            }
        } catch (\Throwable $th) {
            dd($th);
            logger()->error('Update Representative - ' . $th->getMessage());
            return back()->with('error',  'There was a problem updating this Represenative. Please try again.');
        }

        return redirect()->route('representative.index')->with('success', 'Representative updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Representative $representative)
    {
        try {
            $this->representativeRepo->delete($representative->id);
        } catch (\Throwable $th) {
            logger()->error('Destroy Representative - ' . $th->getMessage());
            return back()->with('error',  'There was a problem Deleting this Represenative. Please try again.');
        }

        return redirect()->route('representative.index')->with('success', 'Representative Deleted successfully');
    }


    // get specuific representative details by ID
    public function getDetails(Request $request)
    {
        try {
            if ($request->has('id')) {
              $rep =  $this->representativeRepo->show($request->id);
              $view = view('representative.model', ['model' => $rep])->render();


              return ['view' => $view, 'success' => true];
            }
        } catch (\Throwable $th) {
            logger()->error('Get Representative Details- ' . $th->getMessage());
        }

        return ['view' => null, 'success' => false];
    }
}
