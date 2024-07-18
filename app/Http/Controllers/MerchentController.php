<?php

namespace App\Http\Controllers;

use App\Merchent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class MerchentController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merchents.index');
    }

    public function get_data()
    {
        $query = Merchent::query();
        return DataTables::of($query)
            ->addColumn('action', function ($data) {
                return $this->get_buttons($data->id);
            })
            ->addColumn('keys', function ($data) {
                return "
                    <span class='badge bg-tertiary'><b>TOKENIZATION:</b> $data->tokenization</span><br>
                    <span class='badge bg-secondary'><b>API KEY:</b> $data->api_key</span><br>
                    <span class='badge bg-quaternary'><b>PUBLIC KEY:</b> $data->public_checkout</span>
                    ";
            })
            ->addColumn('date', function ($data) {
                return $data->created_at->format('d M,Y');
            })
            ->rawColumns(['action', 'keys'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchents.modal.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => ['required', Rule::unique('merchents')],
                'tokenization' => 'required',
                'api_key' => 'required',
                'public_checkout' => 'required',
            ],
        );
        if ($validate->fails()) {
            return response()->json($validate->errors()->first(), 500);
        }
        $merchent = new Merchent();
        $merchent->name = $request->name;
        $merchent->tokenization = $request->tokenization;
        $merchent->api_key = $request->api_key;
        $merchent->public_checkout = $request->public_checkout;
        $merchent->save();
        return 'Success';
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
    public function edit($id)
    {
        $data = Merchent::find($id);
        return view('merchents.modal.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $merchent = Merchent::find($id);
        $merchent->name = $request->name;
        $merchent->tokenization = $request->tokenization;
        $merchent->api_key = $request->api_key;
        $merchent->public_checkout = $request->public_checkout;
        $merchent->save();
        return 'Merchant Updated Successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Merchent::find($id);
        $agent->delete();
        return 'Merchant Deleted Succesfully';
    }
}
