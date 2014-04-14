<?php

class MeetingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$meetings = Meeting::with('players')->orderBy('created_at', 'desc')->get();

		return View::make('meeting.index', compact('meetings'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$players = Player::all();

		return View::make('meeting.create', compact('players'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$meeting = Meeting::create([]);

		$meeting->players()->sync(Input::get('players'));

		return Redirect::route('meeting.index');
	}
}
