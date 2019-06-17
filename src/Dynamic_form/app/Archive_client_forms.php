<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive_client_forms extends Model
{
    //
    public function agreement_forms(){
      return $this->hasMany(Archive_agreement_forms::class);
    }

}
