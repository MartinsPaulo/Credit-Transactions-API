<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\MCCs;
use Illuminate\Http\Request;

class RequisitionAuthorizerController extends Controller
{
    public function simpleAuthorizer (Request $request){
        //Verify exist Account
        $account = Account::where('acountNumber',$request->account)->first();
        if(!$account){
            return response()->json(["code"=>"07","msg"=>"transaction is rejected because account does not exist"]);
        }

        //Verify exist MCC
        if(!MCCs::where('code',$request->mcc)->first()){
            return response()->json(["code"=>"07","msg"=>"transaction is rejected because mcc does not exist"]);
        }

        //Verify exist credit in Account
        if($account->balance>=$request->totalAmount){
            $account->balance=$account->balance-$request->totalAmount;
            $account->save();
            return response()->json(["code"=>"00","msg"=>"transaction is approved","New Balance"=>$account->balance]);
        }else{
            return response()->json(["code"=>"51","msg"=>"transaction is rejected because the account does not have enough balance"]);
        }
    }

    public function authorizerFallback (Request $request){
        //Verify exist Account
        $account = Account::where('acountNumber',$request->account)->first();
        if(!$account){
            return response()->json(["code"=>"07","msg"=>"transaction is rejected because account does not exist"]);
        }

        //Verify exist MCC or totalAmount that's enough
        if(!(MCCs::where('code',$request->mcc)->first()) || $account->balance<$request->totalAmount){
           if($account->cash>=$request->totalAmount){
                return response()->json(["code"=>"00","msg"=>"transaction is approved in cash"]);
           }else{
                return response()->json(["code"=>"51","msg"=>"transaction is rejected because the account does not have enough balance"]);
           }
        }else{
            $account->balance=$account->balance-$request->totalAmount;
            $account->save();
            return response()->json(["code"=>"00","msg"=>"transaction is approved","New Balance"=>$account->balance]);
        }
    }

}
