<?php
//use LaravelBook\Ardent\Ardent;
use Zizaco\Confide\ConfideUser;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface{

	/**
	 * The database table used by the model.  (if add the Ardent ,we should replace the Ardent in Eloquent)
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getDropdownCategories(){
		//return $this->hasMany('Categorie');
		//return $this->with('Categorie');
		//return $this->belongsTo('Categorie');
		return $this->hasOne('Categorie');

	}

	
}