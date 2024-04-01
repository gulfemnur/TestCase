<?php

namespace App\Http\Controllers;

use App\Models\Testcase;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TestcaseController extends Controller
{
    protected $testcase;

    public function __construct(Testcase $testcase)
    {
        $this->testcase = $testcase;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $testcase = $this->testcase->createTestcase($request->all());

        return response()->json($testcase);
    }

    /**
     * @param $id
     * @param Request #request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        try {
            $testcase = $this->testcase->updateTestcase($id,$request->all());

            return response()->json($testcase);
        }
        catch (ModelNotFoundException $exception) {
            return response()->json(["msg" =>$exception->getMessage()], 404);
        }        
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $testcase = $this->testcase->getTestcase($id);

        if($testcase) {
            return response()->json($testcase);
        }

        return response()->json(["msg" => "Item not found"], 404);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function gets()
    {
        $testcases = $this->testcase->getsTestcase();

        return response()->json($testcases);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        try {
            $testcase = $this->testcase->deleteTestcase($id);

            return response()->json(["msg"=>"delete testcase success"]);
        }
        catch (ModelNotFoundException $exception) {
            return response()->json(["msg"=>$exception->getMessage()], 404);
        }
    }

}
