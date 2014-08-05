<?php

class UserQuestionAnswerController extends \BaseController {
	
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
	 	$userAnswers = DB::select('SELECT uqa.`id`, uqa.`question_id`, uqa.`user_id`, uqa.`answer`, q.question_name FROM `user_question_answers` uqa, questions q WHERE q.id = uqa.question_id'); ##UserQuestionAnswer::all();
	 	$questions = Question::getIdNamePair();
	 	return View::make('question_answer_index')
	 		->with('questions',$questions)
	 		->with('userAnswers', $userAnswers);
	 }


	/**
	 * The method to insert new question
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
	
	/**
	 * Store a newly created question
	 *
	 * @return Redirect to list of Questions Type
	 */
	public function store() {

		# Step 1) Define the rules			
		$rules = array(
			'answer' => 'required'
		);			

		# Step 2) 		
		$validator = Validator::make(Input::all(), $rules);

		# Step 3
		if($validator->fails()) {

			return Redirect::to('/answer')
				->with('flash_message', 'Validation of Answer failed; please fix the errors listed below.')
				->withErrors($validator);
		}
		$id = Input::get('id');

		if (isset($id)) {
			$userAnswer = UserQuestionAnswer::findOrFail($id);
		}
		else {
			$userAnswer = new UserQuestionAnswer;	
			$userAnswer->user_id = Auth::user()->id;
			$userAnswer->question_id= Input::get('question_id');
		}
		
		$userAnswer->answer = Input::get('answer');
		


		try {
			$userAnswer->save();
		}
		catch (Exception $e) {
			return Redirect::to('/answer/')
				->with('flash_message', 'Creation of Answer failed; please try again.' . $e)
				->withInput();
		}


		return Redirect::to('/answer/')->with('status_message','Your Answer been added.');
	}

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function getDelete($id) {

		$userAnswer = UserQuestionAnswer::findOrFail($id);
		$userAnswer->delete();

		return Redirect::action('UserQuestionAnswerController@getIndex')->with('status_message','Your changes have been saved.');

	}
}