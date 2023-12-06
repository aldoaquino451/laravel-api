<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tecnology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TecnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnologies = Tecnology::orderBy('id', 'desc')->paginate(10);
        $id_edit = null;
        return view('admin.tecnologies.index', compact('tecnologies', 'id_edit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exist = Tecnology::where('name', $request->name)->first();

        if ($exist) {
            return redirect()
                ->route('admin.tecnologies.index')
                ->with('error', "'$exist->name' già presente");
        }
        else {
            $new_tecnology = new Tecnology();

            $new_tecnology->name = $request->name;
            $new_tecnology->slug = Str::slug($new_tecnology->name, '-');
            $new_tecnology->version = $request->version;


            $new_tecnology->save();

            return redirect()
                ->route('admin.tecnologies.index')
                ->with('success', "'$new_tecnology->name' inserito correttamente");
        }
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
    public function edit(Tecnology $tecnology)
    {
        $tecnologies = Tecnology::orderBy('id', 'desc')->paginate(10);

        $id_edit = $tecnology->id;

        return view('admin.tecnologies.index', compact('tecnologies', 'id_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Tecnology $tecnology)
    {
        $data_form = $request->all();

        $tecnology->name = $data_form['name'];
        $tecnology->slug = Tecnology::generateSlug($tecnology->name);
        $tecnology->version = $data_form['version'];

        $tecnology->save();

        return redirect()->route('admin.tecnologies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tecnology $tecnology)
    {
        $tecnology->delete();

        return redirect()->route('admin.tecnologies.index');

    }
}
