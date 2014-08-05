<?php

class QuestionTypeController extends \BaseController {
	
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
	 	$questionTypes = QuestionType::all();
	 	return View::make('question_type_index')->with('questionTypes',$questionTypes);
	 }

	 /**
	 * The method to insert new question types
	 */
	 public function postInsert() {
	 	return $this->store();

	}

	/**
	 * The method to insert new question types
	 */
	 public function postEdit() {
	 	return $this->store();

	}

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function getDelete($id) {

		$questionType = QuestionType::findOrFail($id);
		$questionType->delete();

		return Redirect::action('QuestionTypeController@getIndex')->with('flash_message','Your changes have been saved.');

	}

	/**
	 * Store a newly created question
	 *
	 * @return Redirect to list of Questions Type
	 */
	public function store() {

		# Step 1) Define the rules			
		$rules = array(
			'name' => 'required'
		);			

		# Step 2) 		
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('/questiontype')
				->with('flash_message', 'Validation of Question Type failed; please fix the errors listed below.')
				->withErrors($validator);
		}

		$questionType = new QuestionType;
		$questionType->name    = Input::get('name');


		try {
			$questionType->save();
		}
		catch (Exception $e) {
			return Redirect::to('/questiontype')
				->with('flash_message', 'Creation of Question Type failed; please try again.')
				->withInput();
		}


		return Redirect::action('QuestionTypeController@getIndex')->with('flash_message','Your Question Type been added.');
	}


}