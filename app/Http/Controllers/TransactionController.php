<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Transaction\EloquentTransaction;

class TransactionController extends Controller
{
    private $transaction;

    function __construct(EloquentTransaction $transaction){
        $this->transaction = $transaction;
    }


    public function index(){

        return $this->transaction->getAll();
    }


    public function store(Request $request){

        $attributes['subject'] = $request->subject;
        $attributes['amount'] = $request->amount;
        $attributes['tot'] = $request->tot;
        $attributes['category_id'] = $request->category_id;
        $this->transaction->create($attributes);

        return response()->json(['msg' => 'Transaccion guardada exitosamente'], 200);
    }


    public function show($id){
         return $this->transaction->getById($id);
    }

    public function update(Request $request, $id){
        $attributes['subject'] = $request->subject;
        $attributes['amount'] = $request->amount;
        $attributes['tot'] = $request->tot;
        $attributes['category_id'] = $request->category_id;
        $this->transaction->update($id, $attributes);

        return response()->json(['msg' => 'Transaccion guardada exitosamente'], 200);
    }

    public function destroy($id){
        $this->transaction->delete($id);
        return response()->json(['msg'=>'Transaccion eliminada exitosamente'], 200);
    }
}