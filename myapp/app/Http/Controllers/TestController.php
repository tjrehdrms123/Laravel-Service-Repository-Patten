<?php

namespace App\Http\Controllers;

use App\Service\TestService;
use Exception;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $testService;
    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = '';

        try {
            $result = $this->testService->index();
        } catch (Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = '';

        $data = $request->only([
            'title',
            'content',
            'is_completed'
        ]);

        try {
            $result = $this->testService->store($data);
        } catch (Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = '';

        try {
            $result = $this->testService->show($id);
        } catch (Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Test $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update test.
     *
     * @param Request $request
     * @param id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = '';

        $data = $request->only([
            'title',
            'content',
            'is_completed'
        ]);
        try {
            $result = $this->testService->update($id,$data);
        } catch (Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = '';

        try {
            $result = $this->testService->destroy($id);
        } catch (Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }
}
