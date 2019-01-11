<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\Post;
use App\Model\Refugee;

class ListsController extends Controller
{
    public function search(Request $request)
    {
    	$keyword = $request->get('keyword');
    	$filter = $request->get('filter');

    	switch ($filter) {
    		case 'bencana':
    			return $this->eventsList($keyword);
    			break;
    		
    		case 'posko':
    			return $this->postsList($keyword);
    			break;
    		
    		case 'pengungsi':
    			return $this->refugeesList($keyword);
    			break;
    		
    		case 'relawan':
    			return $this->volunteersList($keyword);
    			break;
    		
    		case 'organisasi':
    			return $this->organizationsList($keyword);
    			break;

    		default:
    			return "filter pencarian salah";
    			break;
    	}

    	// dd('mengapa');
    }

    public function eventsList($keyword = null)
    {
    	$events = new Event();

    	if ($keyword) {
    		$events = $events->where('name', 'like', '%'.$keyword.'%');
    	}

    	$events = $events->orderBy('status', 'asc')->orderBy('created_at', 'desc')->paginate(10);
    	
    	return view('lists.events_list', compact('events', 'keyword'));
    }

    public function postsList($id = null, $keyword = null)
    {
    	$posts = new Post();

    	if ($keyword) {
    		$posts = $posts->where('name', 'like', '%'.$keyword.'%');
    	} else if ($id) {
    		$posts = $posts->where('event_id', $id);
    	}

    	$posts = $posts->orderBy('status', 'desc')->orderBy('created_at', 'desc')->paginate(10);
    	
    	return view('lists.posts_list', compact('posts', 'keyword'));
    }

    public function refugeesList($id = null, $keyword = null)
    {
    	$refugees = new Refugee();

    	if ($keyword) {
    		$refugees = $refugees->where('name', 'like', '%'.$keyword.'%');
    	} else if ($id) {
    		$refugees = $refugees->where('post_id', $id);
    	}

    	$refugees = $refugees->orderBy('name', 'asc')->paginate(10);
    	
    	return view('lists.refugees_list', compact('refugees', 'keyword'));
    }

    public function volunteersList($id = null, $keyword = null)
    {	
    	dd('fitur belum tersedia');
    	// return view('lists._list', compact('keyword'));
    }

    public function organizationsList($id = null, $keyword = null)
    {	
    	dd('fitur belum tersedia');
    	// return view('lists._list', compact('keyword'));
    }
}
