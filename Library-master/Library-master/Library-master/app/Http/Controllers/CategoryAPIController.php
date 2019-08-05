<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use App\Category;

class AccountsAPIController extends Controller
{
    public function index(Request $request)
    {
        $q = $request['q'];
        $gender = $request['gender'];
        $active = $request['active'];
        $accounts = Account::whereRaw('true');

        if($q)
            $accounts->whereRaw('(fullname like ? or email like ? or country_id in (select id from country where name like ?))',["%$q%","%$q%","%$q%"]);
        if($gender)
            $accounts->where('gender',$gender);
        if($active!='')
            $accounts->where('active',$active);

        $accounts = $accounts->paginate(10)
            ->appends(['q'=>$q, 'gender'=>$gender, 'active'=>$active]);

        return  response()->json([
            'accounts' => $accounts
        ]);
    }


    public function store(AccountRequest $request)
    {
        $account = Account::create($request->all());

        return  response()->json([
            'message' => 'Account Created Successfully',
            'account' => $account
        ]);
    }


    public function show($id)
    {
        $account = Account::find($id);
        if(!$account){
            return  response()->json([
                'message' => 'Account Not Exists',
                'errors' => [
                    'message' => 'Account Not Exists',
                ]
            ]);
        }
        return  response()->json([
            'message' => 'Account Get Successfully',
            'account' => $account
        ]);
    }


    public function update($id, AccountRequest $request)
    {
        $account = Account::find($id);
        $account->update($request->all());
        return  response()->json([
            'message' => 'Account Updated Successfully',
            'account' => $account
        ]);
    }
}
