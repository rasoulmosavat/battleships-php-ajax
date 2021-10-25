<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\ships;
use App\players;
use DB;

class autoPassDataController extends Controller
{
//  Fetch and return ships status
     function firstfetch(Request $request)
    {
     if($request->get('shipLastId'))
     {
      if($_GET['isHorizontal']=='true'){
          $isHorizontal=1;
      }else{
          $isHorizontal=0;
      }
      	ships::create([
    		    'shipLastId' => $_GET['shipLastId'],
    		    'selectedShipIndex' => $_GET['selectedShipIndex'],
    		    'draggedShipLength' => $_GET['draggedShipLength'],
    		    'shipClass'=>$_GET['shipClass'],
    		    'playerName'=>$_GET['DefaultplayerName'],
    		    'isHorizontal'=>$isHorizontal,
    		    'lastShipIndex'=>$_GET['lastShipIndex'],
    		    'datasetId'=>$_GET['datasetId'],
    		    ]);
    
      echo 'shipLastId='.$_GET['shipLastId'].'&selectedShipIndex='.$_GET['selectedShipIndex'].'&draggedShipLength='.$_GET['draggedShipLength'].'&shipClass='.$_GET['shipClass'].'&isHorizontal='.$_GET['isHorizontal'];

     }
    }
    
    //  Fetch ships status
    function fetchData(Request $request)
    {
       $data = ships::where('playerName','!=',$_GET['DefaultplayerName'])->get();
      echo $data;
   }
    
    // storing players' data (includes number of selected ships, location of the last selected part and player's turn).
   function storeData(Request $request)
    {
        // $data = players::where('userName','player1')->get();
    
        players::where('userName',$_GET['DefaultplayerName'])->update([
       		    'destroyerCount' => $_GET['destroyerCount'],
       		    'submarineCount'=>$_GET['submarineCount'],
       		    'cruiserCount'=>$_GET['cruiserCount'],
       		    'battleshipCount'=>$_GET['battleshipCount'],
       		    'carrierCount'=>$_GET['carrierCount'],
       		    'takenLocation'=>$_GET['square'],
       		    'turn'=>1,
       		     
            ]);
            
             players::where('userName', '!=' ,$_GET['DefaultplayerName'])->update([
       		    'turn'=>0,
            ]);
    
    }
    
    // Fetching players selected location
       function fetchPlayerData(Request $request)
    {
        $data=players::where('userName', '!=' ,$_GET['DefaultplayerName'])->get();
    
        foreach($data as $row){
            if($row->turn=='1'){
                $newData=$row->takenLocation;
            }else{
              $newData=100;  
            }
        } 
    
        echo $newData; 
        
    }
    
    // Fetching players turn
    function fetchTurnData(Request $request)
    {
        $data=players::where('userName',$_GET['DefaultplayerName'])->get();
    
        foreach($data as $row){
                $newData=$row->turn;
        } 
    
        echo $newData; 
        
    }
    
    // Update player's turn
    function updateTurnData(Request $request)
    {
        players::where('userName',$_GET['DefaultplayerName'])->update([
       		    'turn'=>1,
       		     
            ]);
            
             players::where('userName', '!=' ,$_GET['DefaultplayerName'])->update([
       		    'turn'=>0,
            ]);
            
    }
    
    
}