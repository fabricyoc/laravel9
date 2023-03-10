<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $businesses = Business::all();
        // $businesses = Business::find(1);
        // $businesses = Business::where('name', 'Rau-Skiles')->get(); // coleção
        // $businesses = Business::where('name', 'Rau-Skiles')->first(); // 1o que achar
        // dd($businesses);


        // dd($businesses->toArray());
        // dd($businesses->toSql());


        // Paginação
        $businesses = Business::paginate();
        return view('business.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $businesses = Business::all();
        return view('business.create', compact('businesses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $b = Business::create([
        //     'name' => 'VF Variedades',
        //     'email' => "vfvariedades@gmail.com",
        //     'address' => "Rua projetada 1",
        // ]);
        // dd($b);

        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            // 'address' => 'string',
            'logo' => 'file',
        ]);

        // $input['logo']->store('logos'); // salva dentro de storage
        $path = $input['logo']->store('logos', 'public'); // salva dentro de storage/public
        // dd($path);0
        // dd($input['logo']);

        $input['logo'] = $path;
        // dd($input);
        $business = Business::create($input);

        // dd($business->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        $b = Business::find(6);
        // 1a forma
        // $b->name = 'Joãozinho';
        // $b->save();

        // 2a forma
        // $b = Business::find(6)->update([
        //     'name' => 'Roberto Carlos',
        // ]);

        // 3a forma
        $request = [
            'name' => 'Fabricyo Costa',
            'email' => 'fc@gmail.com',
        ];

        $b = Business::find(6);
        $b->fill($request);
        $b->save();

        dd($b);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        $b = Business::find(1);
        $b->delete();
        dd($b);
    }
}
