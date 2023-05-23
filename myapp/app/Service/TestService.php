<?php

namespace App\Http\Controllers;

use App\Repository\Interface;
use Illuminate\Http\Request;

class TestService extends Controller
{
    private TestRepositoryInterface $testRepository;

    public function __construct(TestRepositoryInterface $testRepository)
    {
        $this->$testRepository = $testRepository;
    }

    public function index()
    {
        return $this->testRepository->getAllTest();
    }

    public function create()
    {
        return view('tests.create');
    }

    public function edit(Request $request)
    {
        $testId = $request->route('testId');

        $test = $this->testRepository->getTaskById($testId);

        if (empty($test)) {
            return back();
        }

        return view('tests.edit', ['test' => $test]);
    }

    public function store(Request $request)
    {
        $testDetails = [
            'title' => $request->title,
            'description' => $request->description
        ];

        $this->testRepository->createTask($testDetails);

        return redirect()->Route('tests');
    }

    public function show(Request $request)
    {
        $testId = $request->route('testId');

        $test = $this->testRepository->getTaskById($testId);

        if (empty($test)) {
            return back();
        }

        return view('tests.show', ['test' => $test]);
    }
    public function update(Request $request)
    {
        $testId = $request->route('testId');

        $testDetails = [
            'title' => $request->title,
            'description' => $request->description
        ];

        if (isset($request->is_completed)) {
            $testDetails['is_completed'] = true;
        } else {
            $testDetails['is_completed'] = false;
        }

        $this->testRepository->updateTask($testId, $testDetails);

        return redirect()->Route('tests');
    }

    public function destroy(Request $request)
    {
        $testId = $request->route('testId');

        $this->testRepository->deleteTask($testId);

        return back();
    }
}
