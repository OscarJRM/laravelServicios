<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class estudianteController extends Controller
{
    protected static $url = 'http://localhost/quinto/controllers/apiRest.php';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Http::GET(static::$url);
        $estudiantesArray = $estudiantes->json();
        return view('estudiante.mostrar',compact('estudiantesArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiante.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::AsForm()->POST(static::$url,[
            'CED_EST' => $request->input('CED_EST'),
            'NOM_EST' => $request->input('NOM_EST'),
            'APE_EST' => $request->input('APE_EST'),
            'DIR_EST' => $request->input('DIR_EST'),
            'TEL_EST' => $request->input('TEL_EST'),
            
        ]);

        return redirect('/estudiantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $response = Http::get(static::$url);
        $estudiantes = $response->json();
        $estudiante = collect($estudiantes)->firstWhere('CED_EST', $id); // obtener el estudiante con la cédula correspondiente
        return view('estudiante.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cedula)
{
    $url = static::$url . "?CED_EST=$cedula";
    $url .= "&NOM_EST=" . urlencode($request->input('NOM_EST'));
    $url .= "&APE_EST=" . urlencode($request->input('APE_EST'));
    $url .= "&DIR_EST=" . urlencode($request->input('DIR_EST'));
    $url .= "&TEL_EST=" . urlencode($request->input('TEL_EST'));

    $response = Http::put($url);

    if ($response->successful()) {
        return redirect('/estudiantes');
    } else {
        die('error');
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete(static::$url."?CED_EST=".$id);
        return redirect ('/estudiantes');
    }
}
