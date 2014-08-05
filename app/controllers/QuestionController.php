<?php

class QuestionController extends \BaseController {
	
	/*
	 * Constructor
	 */
	public function __construct() {
		$this->beforeFilter('auth');
	}
	/**
	 * index  question page
	 */
	 public function getIndex() {
	 	$questions = Question::with('QuestionType')->get();
	 	$questionTypes = QuestionType::getIdNamePair();
	 	return View::make('question_index')
	 		->with('questions',$questions)
	 		->with('questionTypes', $questionTypes);
	 }


	 /**
	 * Show the form for creating a new question.
	 *
	 * @return Response
	 */
	public function getList() {
		$questionTypes = QuestionType::getIdNamePair();

		return View::make('question_create')->with('questionTypes', $questionTypes);

	}

	/**
	 * The method to insert new question
	 */
	 public function postInsert() {
	 	return $this->store();

	}

	/**
	 * The method to update question
	 */
	 public function postEdit() {
	 	return $this->store();

	}

	/**
	 * Store a newly created question
	 *
	 * @return Redirect to list of Questions Type
	 */
	public function store() {

		# Step 1) Define the rules			
		$rules = array(
			'question_name' => 'required'
		);			

		# Step 2) 		
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('/question')
				->with('flash_message', 'Validation of Question failed; please fix the errors listed below.')
				->withErrors($validator);
		}
		$id = Input::get('id');

		if (isset($id)) {
			$question = Question::findOrFail($id);
		}
		else {
			$question = new Question;	
			$question->type_id = Input::get('type_id');
		}
		
		$question->question_name = Input::get('question_name');
		


		try {
			$question->save();
		}
		catch (Exception $e) {
			return Redirect::to('/question/create')
				->with('flash_message', 'Creation of Question failed; please try again.' . $e)
				->withInput();
		}


		return Redirect::to('/question/')->with('status_message','Your Question been added.');
	}
}