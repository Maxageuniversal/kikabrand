<?php
// app/Http/Controllers/RecommendationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class RecommendationController extends Controller
{
    public function getRecommendations(Request $request)
    {
        $userId = $request->input('user_id');
        $process = new Process(['python3', 'recommendation_model.py', $userId]);
        $process->run();

        // Handle output
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $output = $process->getOutput();
        return response()->json(['recommendations' => json_decode($output)]);
    }
}
