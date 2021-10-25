<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class players extends Model
{
     protected $fillable = ['takenLocation','turn','userName','destroyerCount','submarineCount','cruiserCount','battleshipCount','carrierCount','cpuDestroyerCount','cpuSubmarineCount','cpuCruiserCount','cpuBattleshipCount','cpuCarrierCount','rivalPlayer','winer','updated_at','created_at'];
}