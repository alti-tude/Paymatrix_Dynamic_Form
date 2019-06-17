<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template_data extends Model
{
    //
    protected $fillable = ['Link'];

    public function client_forms(){
      return $this->BelongsTo(Client_forms::class);
    }
}
