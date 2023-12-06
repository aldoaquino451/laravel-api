<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderBy('id', 'desc')->paginate(10);
        $id_edit = null;
        return view('admin.types.index', compact('types', 'id_edit'));
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
        // Prendo il model Type e faccio una ricerca con il metodo 'where' e 'first'
        // Nella ricerca, confronto il 'name' degli elementi già presenti con il 'name' che invio dal form
        // Alla prima corrispondenza che trova, salva l'elemento dentro la variabile exist
        // Se non trova corrispondenza il valore della variabile sarà pari a null
        $exist = Type::where('name', $request->name)->first();

        if ($exist) {
            return redirect()
                ->route('admin.types.index')
                ->with('error', "'$exist->name' già presente");
        }
        else {
            $new_type = new Type();

            $new_type->name = $request->name;
            $new_type->slug = Str::slug($new_type->name, '-');

            $new_type->save();

            return redirect()
                ->route('admin.types.index')
                ->with('success', "'$new_type->name' inserito correttamente");
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
    public function edit(Type $type)
    {
        $types = Type::orderBy('id', 'desc')->paginate(10);

        $id_edit = $type->id;

        return view('admin.types.index', compact('types', 'id_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $data_form = $request->all();

        $type->name = $data_form['name'];
        $type->slug = Type::generateSlug($type->name);

        $type->save();

        return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index');

    }
}
