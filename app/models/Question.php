<?php

class Question extends Eloquent {
	# The guarded properties specifies which attributes should *not* be mass-assignable
	protected $guarded = array('id', 'created_at', 'updated_at');

	# Relationship method...
    public function questionType() {
    
    	# Question belongs to QuestionType
	    return $this->belongsTo('QuestionType','type_id');
    }
}