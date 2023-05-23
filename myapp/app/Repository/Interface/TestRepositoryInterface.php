<?php

namespace App\Repository\Interface;

interface TestRepositoryInterface
{
    public function getAllTests();
    public function getTest($id);
    public function deleteTest($id);
    public function createTest(array $newTest);
    public function updateTest($id, array $newTest);
}
