<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client_forms;
class Agreement_form extends Model
{
    //
    public function client_forms(){
      return $this->BelongsTo(Client_forms::class);
    }

}
