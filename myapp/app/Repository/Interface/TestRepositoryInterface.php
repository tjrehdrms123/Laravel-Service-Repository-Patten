<?php

namespace App\Repository\Interface;

interface TestRepositoryInterface
{
    public function getAllTests();
    public function getTestById($id);
    public function deleteTestById($id);
    public function createTest(array $newTest);
    public function updateTestById($id, array $newTest);
}
