<?php

class QuestionType extends Eloquent {
	# The guarded properties specifies which attributes should *not* be mass-assignable
	protected $guarded = array('id', 'created_at', 'updated_at');

	/**
	* Relationship method each type can belong to multiple questions
	*/
	public function questions() {

		# Author has many Question
        return $this->hasMany('Question');
        
    }
	
	/**
	* Gets the authors as a id -> name key value pair. Useful for building selects.
	*/
	public static function getIdNamePair() {

		$types   = Array();

		$collection = QuestionType::all();	

		foreach($collection as $questionType) {
			$types[$questionType->id] = $questionType->name;
		}	

		return $types;	
	}

}