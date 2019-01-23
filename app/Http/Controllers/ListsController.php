<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use App\Model\Post;
use App\Model\Refugee;
use App\Model\Organization;
use App\Model\User;

class ListsController extends Controller
{
    public function search(Request $request)
    {
    	$keyword = $request->get('keyword');
    	$filter = $request->get('filter');

    	switch ($filter) {
    		case 'bencana':
    			return $this->eventsList($keyword, $filter);
    			break;
    		
    		case 'posko':
    			return $this->postsList(null, $keyword, $filter);
    			break;
    		
    		case 'pengungsi':
    			return $this->refugeesList($keyword, $filter);
    			break;
    		
    		case 'relawan':
    			return $this->usersList($keyword, $filter);
    			break;
    		
    		case 'organisasi':
    			return $this->organizationsList($keyword, $filter);
    			break;

    		default:
    			return "filter pencarian salah";
    			break;
    	}
    }

    public function eventsList($keyword = null, $filter = null)
    {
    	$events = new Event();

    	if ($keyword) {
    		$events = $events->where('name', 'like', '%'.$keyword.'%');
    	}

    	$events = $events->orderBy('status', 'desc')->orderBy('created_at', 'desc')->paginate(10)->onEachSide(1);
    	
    	return view('lists.events_list', compact('events', 'keyword', 'filter'));
    }

    public function postsList($id = null, $keyword = null, $filter = null)
    {
    	$posts = new Post();

    	if ($keyword) {
    		$posts = $posts->where('name', 'like', '%'.$keyword.'%');
    	} else if ($id) {
    		$posts = $posts->where('event_id', $id);
    	}

    	$posts = $posts->orderBy('status', 'desc')->orderBy('created_at', 'desc')->paginate(10)->onEachSide(1);
    	
    	return view('lists.posts_list', compact('posts', 'keyword', 'filter'));
    }

    public function refugeesList($keyword = null, $filter = null)
    {
    	$refugees = new Refugee();

    	if ($keyword) {
    		$refugees = $refugees->where('name', 'like', '%'.$keyword.'%');
    	} else if ($id) {
    		$refugees = $refugees->where('post_id', $id);
    	}

    	$refugees = $refugees->orderBy('name', 'asc')->paginate(10)->onEachSide(1);
    	
    	return view('lists.refugees_list', compact('refugees', 'keyword', 'filter'));
    }

    public function usersList($keyword = null, $filter = null)
    {
        $users = new User();

        if ($keyword) {
            $users = $users->where('name', 'like', '%'.$keyword.'%');
        } else if ($id) {
            $users = $users->where('organizations_id', $id);
        }

        $users = $users->orderBy('name', 'asc')->paginate(10)->onEachSide(1);
        
        return view('lists.users_list', compact('users', 'keyword', 'filter'));
    }

    public function organizationsList($keyword = null, $filter = null)
    {	
        $organizations = new Organization();

        if ($keyword) {
            $organizations = $organizations->where('name', 'like', '%'.$keyword.'%');
        }

        $organizations = $organizations->orderBy('name', 'asc')->paginate(10)->onEachSide(1);
        
        return view('lists.organizations_list', compact('organizations', 'keyword', 'filter'));
    }
}
