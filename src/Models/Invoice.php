<?php 

namespace Rockitworks\Invoice\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

	// Disable Laravel's mass assignment protection
	  protected $guarded = ['id'];

	  
}