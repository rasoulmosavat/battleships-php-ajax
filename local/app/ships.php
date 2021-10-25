<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ships extends Model
{
    protected $fillable = ['datasetId','lastShipIndex','shipLastId','selectedShipIndex','draggedShipLength','shipClass','isHorizontal','playerName','updated_at','created_at'];

}
