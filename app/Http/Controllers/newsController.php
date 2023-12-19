<?php

namespace App\Http\Controllers;

use App\Models\newsitems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class newsController extends Controller
{
	//get and show all news items
  public function index() {
		return view('news.index', [
			'pagetitle' => 'Testwebsite_Loi - Home',
			'heading' => 'Welcome to my testwebsite',
			'heading2' => 'Latest news',
			'news' => newsitems::latest()->filter(request(['tag', 'search']))->get()
		]);
	}
	//show single news item
	public function show(newsitems $newsitems) {
		return view('news.show', [
			'pagetitle' => 'News',
			'news' => $newsitems
		]);
	}
}
