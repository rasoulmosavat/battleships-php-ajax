<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\ships;
use App\players;
use DB;


class siteController extends Controller
{
    
    public function home()
    { 
        
	   return view('/site/homePage');
  
    }
    
    public function first()
    { 
       ships::truncate();
	   return view('/site/firstPage');
  
    }
        public function second()
    { 
        ships::truncate();
	   return view('/site/secondPage');

        
    }
	


}
