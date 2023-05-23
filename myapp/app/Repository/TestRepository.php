<?php

namespace App\Repository;

use App\Repository\Interface\TestRepositoryInterface;
use App\Models\test;

class TestRepository implements TestRepositoryInterface
{
    public function getAllTests()
    {
        return Test::all();
    }
    public function getTest($id)
    {
        return Test::findOrFail($id);
    }
    public function deleteTest($id)
    {
        Test::destroy($id);
    }
    public function createTest(array $newTest)
    {
        return Test::create($newTest);
    }
    public function updateTest($id, array $newTest)
    {
        return Test::whereId($id)->update($newTest);
    }

}
