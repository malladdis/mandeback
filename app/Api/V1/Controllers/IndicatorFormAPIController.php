<?php

namespace App\Api\V1\Controllers;

use App\Http\Requests\API\CreateIndicatorFormAPIRequest;
use App\Http\Requests\API\UpdateIndicatorFormAPIRequest;
use App\Models\IndicatorForm;
use App\Repositories\IndicatorFormRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class IndicatorFormController
 * @package App\Api\V1\Controllers
 */

class IndicatorFormAPIController extends AppBaseController
{
    /** @var  IndicatorFormRepository */
    private $indicatorFormRepository;

    public function __construct(IndicatorFormRepository $indicatorFormRepo)
    {
        $this->indicatorFormRepository = $indicatorFormRepo;
    }

    /**
     * Display a listing of the IndicatorForm.
     * GET|HEAD /indicatorForms
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->indicatorFormRepository->pushCriteria(new RequestCriteria($request));
        $this->indicatorFormRepository->pushCriteria(new LimitOffsetCriteria($request));
        $indicatorForms = $this->indicatorFormRepository->all();

        return $this->sendResponse($indicatorForms->toArray(), 'Indicator Forms retrieved successfully');
    }

    /**
     * Store a newly created IndicatorForm in storage.
     * POST /indicatorForms
     *
     * @param CreateIndicatorFormAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIndicatorFormAPIRequest $request)
    {
        $input = $request->all();

        $indicatorForms = $this->indicatorFormRepository->create($input);

        return $this->sendResponse($indicatorForms->toArray(), 'Indicator Form saved successfully');
    }

    /**
     * Display the specified IndicatorForm.
     * GET|HEAD /indicatorForms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var IndicatorForm $indicatorForm */
        $indicatorForm = IndicatorForm::where('indicator_id',$id)->get();

        if (empty($indicatorForm)) {
            return response()->json(['status'=>false,'message'=>'data is retrieved','data'=>$indicatorForm]);
        }
        return response()->json(['status'=>true,'message'=>'data is retrieved','data'=>$indicatorForm]);


    }

    /**
     * Update the specified IndicatorForm in storage.
     * PUT/PATCH /indicatorForms/{id}
     *
     * @param  int $id
     * @param UpdateIndicatorFormAPIRequest $request
     *
     * @return Response
     */
    public function update($id, \Dingo\Api\Http\Request $request)
    {
        $indicatorForm=IndicatorForm::where('indicator_id',$request->indicator_id)->get();
        if(count($indicatorForm)>0){
            $indicator=IndicatorForm::find($indicatorForm[0]['id']);
            $indicator->indicator_id=$request->indicator_id;
            $indicator->form_id=$request->form_id;
            if($indicator->save()){
                return response()->json(['status'=>true,'message'=>'updated Succesffuly','data'=>$indicator]);
            }

        }else{
            return response()->json(['status'=>false,'message'=>'data is not found','data'=>''],404);
        }
    }

    /**
     * Remove the specified IndicatorForm from storage.
     * DELETE /indicatorForms/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var IndicatorForm $indicatorForm */
        $indicatorForm = $this->indicatorFormRepository->findWithoutFail($id);

        if (empty($indicatorForm)) {
            return $this->sendError('Indicator Form not found');
        }

        $indicatorForm->delete();

        return $this->sendResponse($id, 'Indicator Form deleted successfully');
    }
}
