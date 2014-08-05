<?php

class UserQuestionAnswer extends Eloquent {
	# The guarded properties specifies which attributes should *not* be mass-assignable
	protected $guarded = array('id', 'created_at', 'updated_at');


	# Relationship method...
    public function user() {
        
	   # this belongs to User
	    return $this->belongsTo('User');
    }

    # Relationship method...
    public function question() {
        
	    # this belongs to Question
	    return $this->belongsTo('Question');
    }

}