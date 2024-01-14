<?php

namespace App\Http\Controllers;

use App\Models\newsitems;
use Illuminate\Http\Request;
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
			'news' => newsitems::latest()->filter(request(['tag', 'search']))->paginate(2)
		]);
	}
	//show single news item
	public function show(newsitems $newsitems) {
		return view('news.show', [
			'pagetitle' => 'Testwebsite_Loi - News',
			'news' => $newsitems
		]);
	}
	//show create news item
	public function create() {
		return view('news.create', [
			'pagetitle' => 'Testwebsite_Loi - Post',
			'heading' => 'Post Newsitem'
		]);
	}
	//store news item
	public function store(Request $request) {
		$newsitemsFormFields = request()->validate([
			'title' => ['required', 'max:64', Rule::unique('newsitems', 'title')],
			'content' => 'required',
			'tags' => 'required|max:128',
		 	'email' => ['required', 'email'],
			'author' => 'required|max:64',
			'website' => 'required',
			'websiteName' => 'required|max:64'
		]);

		if($request->hasFile('image')) {
			$newsitemsFormFields['image'] = $request->file('image')->store('news-images', 'public');
		}

		$newsitemsFormFields['user_id'] = auth()->id();

		newsitems::create($newsitemsFormFields);

		// session()->flash('success', 'Newsitem has been posted!');

		return redirect('/')->with('message', 'Newsitem has been posted!');
	}

	//edit news item
	public function edit(newsitems $newsitems) {
		return view('news.edit', [
			'pagetitle' => 'Testwebsite_Loi - Edit',
			'heading' => 'Edit Newsitem',
			'news' => $newsitems
		]);
	}

	//update news item
	public function update(Request $request, newsitems $newsitems) {
		// Make sure logined user is the owner of the news item
		if($newsitems->user_id !== auth()->id()) {
			abort(403, 'Unauthorized action.');
		}

		$newsitemsFormFields = request()->validate([
			'title' => ['required'],
			'content' => 'required',
			'tags' => 'required',
		 	'email' => ['required', 'email'],
			'author' => 'required',
			'website' => 'required',
			'websiteName' => 'required'
		]);

		if($request->hasFile('image')) {
			$newsitemsFormFields['image'] = $request->file('image')->store('news-images', 'public');
		}

		$newsitems->update($newsitemsFormFields);

		// session()->flash('message', 'Newsitem has been posted!');

		return back()->with('message', 'Newsitem has been edited!');
	}

	//delete news item
	public function destroy(newsitems $newsitems) {
		// Make sure logined user is the owner of the news item
		if($newsitems->user_id !== auth()->id()) {
			abort(403, 'Unauthorized action.');
		}

		$newsitems->delete();
		return redirect('/news/manage')->with('message', 'Newsitem has been deleted!');
	}

	//manage news items
	public function manage() {
		return view('news.manage', [
			'pagetitle' => 'Testwebsite_Loi - Manage',
			'heading' => 'Manage Newsitems',
			'news' => auth()->user()->newsitems()->get()
		]);
	}
}