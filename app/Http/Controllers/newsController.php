<?php

namespace App\Http\Controllers;

use App\Models\newsitems;
use Clockwork\Request\Request;
use Illuminate\Validation\Rule;
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
	//show create news item
	public function create() {
		return view('news.create', [
			'pagetitle' => 'Post Newsitem',
			'heading' => 'Post Newsitem'
		]);
	}
	//store news item
	public function store(Request $request) {
		$newsitemsFormFields = request()->validate([
			'title' => ['required', Rule::unique('newsitems', 'title')],
			'content' => 'required',
			'tags' => 'required',
		 	'email' => ['required', 'email'],
			'image' => 'required'
		]);
		newsitems::create($newsitemsFormFields);
		return redirect('/');
	}
}
