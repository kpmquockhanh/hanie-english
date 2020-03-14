<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{
    public function index() {
        return view('admin.commands.index');
    }
    public function clearCache() {
        Artisan::call('cache:clear');
    }

    public function clearRouteCache() {
        Artisan::call('route:clear');
    }

    public function runSeed() {
        Artisan::call('db:seed');
    }

    public function migrate() {
        Artisan::call('migrate');
    }

    public function freshMigrate() {
        Artisan::call('migrate:fresh');
    }

    public function clearOptimize() {
        Artisan::call('optimize:clear');
    }
}
