<?php

class Question extends Eloquent {
	# The guarded properties specifies which attributes should *not* be mass-assignable
	protected $guarded = array('id', 'created_at', 'updated_at');

	# Relationship method...
    public function questionType() {
    
    	# Question belongs to QuestionType
	    return $this->belongsTo('QuestionType','type_id');
    }

    /**
	* Gets the authors as a id -> name key value pair. Useful for building selects.
	*/
	public static function getIdNamePair() {

		$questions  = Array();

		$collection = Question::all();	

		foreach($collection as $question) {
			$questions[$question->id] = $question->question_name;
		}	

		return $questions;	
	}
}