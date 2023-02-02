<?php 

namespace Rockitworks\Documents\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {

	// Disable Laravel's mass assignment protection
	  protected $guarded = ['id'];

	  protected $tableName = 'rw_invoices';
}