<?php

namespace App\Http\Controllers\Cabinet\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
  public function __invoke(): Factory|View|Application
  {
      $data['likes'] = auth()->user()->likedPosts()->count();
      $data['comments'] = auth()->user()->comments()->count();

      return view('cabinet.main.index', compact('data'));
  }
}
