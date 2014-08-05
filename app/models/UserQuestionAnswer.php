<?php

class UserQuestionAnswer extends Eloquent {
	# The guarded properties specifies which attributes should *not* be mass-assignable
	protected $guarded = array('id', 'created_at', 'updated_at');

	/**
	* Relationship method each type can belong to multiple questions
	*/
	public function questions() {

		return $this->belongsToMany('Question');
        
    }
	
	/**
	* Relationship method each type can belong to multiple questions
	*/
	public function users() {

		return $this->belongsToMany('User');
        
    }

	

}