<?php

namespace App\Repositories;
use App\Interfaces\MallDirectoryInterface;
use App\Models\CreditCollectionAnalyst;
use App\Models\MallDirectory;
use Illuminate\Support\Facades\DB;

use App\Traits\ResponseApi;
use Throwable;


class MallDirectoryRepository implements MallDirectoryInterface
{
    use ResponseApi;
    public function viewMalls()
    {
        $data = MallDirectory::with('creditCollectionAnalysts','posAdmin');
        $colorClasses = ['primary','secondary','success','danger','warning','info','light','dark'];
        return view('pages.malldirectory.view_malls',['mallDirectories' => $data->get(),
                                                      'count' => $data->count(),
                                                      'colorClasses' => $colorClasses]);
    }

    public function storeMallDirectory($request)
    {
        try{
            DB::beginTransaction();

            $mall = MallDirectory::create($request->only('mall_name','mall_hours','mall_address'));
            $creditCollectionAnalyst = $mall->creditCollectionAnalysts()->create($request->only('analyst_name','analyst_email','analyst_contact'));

            $posAdmin = $mall->posAdmin()->create($request->only('pos_name','pos_email','pos_contact'));
            $data = [$mall, $creditCollectionAnalyst, $posAdmin];

            DB::commit();
            $this->success('User created successfully',$data,201);
        }catch(Throwable $e)
        {
            DB::rollBack();
            return $this->error($e->getMessage(),$e->getCode());
        }
    }

    public function storeMallAnalyst($request, $mallID)
    {
        try{
            DB::beginTransaction();

            $analyst = CreditCollectionAnalyst::create($request->only('analyst_name','analyst_email','analyst_contact')+['mall_directory_id'=> $mallID]);

            DB::commit();
            $this->success('Analyst created successfully', $analyst, 201);
        }catch(Throwable $e)
        {
            DB::rollBack();
            return $this->error($e->getMessage(),$e->getCode());
        }
    }

    public function removeAnalyst($id)
    {
        CreditCollectionAnalyst::where('id', $id)->update(['status' => 0]);

        return 'inserted';
    }

    public function getAnalyst($id)
    {
        return CreditCollectionAnalyst::findOrFail($id);
    }

    public function updateAnalystInfo($request,$id)
    {
        $analystInformation = CreditCollectionAnalyst::findOrFail($id);
        $analystInformation->update($request->only('analyst_name','analyst_email','analyst_contact'));

        return $analystInformation;
    }
}
