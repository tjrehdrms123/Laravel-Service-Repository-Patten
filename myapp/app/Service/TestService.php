<?php

namespace App\Service;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use App\Repository\TestRepository;
use App\Repository\Interface\TestRepositoryInterface;

class TestService
{
    private TestRepositoryInterface $testRepository;

    /**
     * TestRepository construct
     * @param TestRepositoryInterface $testRepository
     */
    public function __construct(TestRepositoryInterface $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    /**
     * Get All Test Datas.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return $this->testRepository->getAllTests();
    }
    public function create()
    {
    }

    public function edit(Request $request)
    {
    }

    /**
     * Validate test data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function store($data)
    {
        $validator = Validator::make($data, [
            'title' => 'bail|min:2',
            'content' => 'bail|max:255',
            'is_completed' => 'min:1',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try{
            $result = $this->testRepository->createTest($data);
        } catch (Exception $e){
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to create post data');
        }

        DB::commit();

        return $result;
    }

    /**
     * Get test by id.
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function show($id)
    {

        $result = $this->testRepository->getTestById($id);

        if (empty($id)) {
            return back();
        }

        return $result;
    }

    /**
     * Update post data
     * Store to DB if there are no errors.
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function update($id,$data)
    {
        $validator = Validator::make($data, [
            'title' => 'bail|min:2',
            'content' => 'bail|max:255',
            'is_completed' => 'min:1',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $result = $this->testRepository->updateTestById($id, $data);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to update post data');
        }

        DB::commit();
        return $result;
    }

    /**
     * Delete post by id.
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $result = $this->testRepository->deleteTestById($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to delete post data');
        }

        DB::commit();

        return $result;

    }
}
