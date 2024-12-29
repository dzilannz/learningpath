<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sidang;

class SidangController extends Controller
{
    public function markComplete($id, $task)
    {
        $sidang = Sidang::findOrFail($id);
        $sidang->$task = true;
        $sidang->save();

        return redirect()->back()->with('message', ucfirst($task) . ' marked as complete.');
    }
}
