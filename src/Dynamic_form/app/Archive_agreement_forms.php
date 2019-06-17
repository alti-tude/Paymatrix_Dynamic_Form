<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive_agreement_forms extends Model
{
    //
    public function client_forms(){
      return $this->BelongsTo(Archive_client_forms::class);
    }

}
