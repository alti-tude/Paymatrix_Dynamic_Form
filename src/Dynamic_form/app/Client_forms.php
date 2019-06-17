<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agreement_form;
class Client_forms extends Model
{
    //
    protected $fillable = ['template','status','Client_id','form_name'];
    public function template_data(){
      return $this->hasMany(Template_data::class);
    }


    public function agreement_forms(){
      return $this->hasMany(Agreement_form::class);
    }
}
