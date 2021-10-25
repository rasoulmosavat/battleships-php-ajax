@extends('layouts.mainPage')

@section('body')
<main class="" style="text-align:center;">

  <label id="playerName" style="font-size:23px;">Player1</label><br>
  
  <div class="hidden-info">
    <button id="start" style="font-size:20px;" class="btn btn-success">Start Game</button>
    <h3 id="whose-go">Start the Game</h3>
    <h3 id="winer"></h3>
</div>
<label style="font-size:20px;">Drag and Drop the ships on Your Base</label>
<div>
  <label style="font-size:23px;"> Your Score: </label>
  <label id="yourScore" style="font-size:23px;"></label>
</div>  
<!--Bases -->
<div class="container">
    <div>
         <label style="font-size:20px;">Your Base</label> 
    <div class="grid grid-user"></div>
   
    </div>
    <div>
    <label style="font-size:20px;">Enemy Base</label> 
    <div class="grid grid-enemy"></div>
   
    </div>
</div>

<!--Ships-->
    <div class="grid-display">
        <div class="ship destroyer-container" draggable="true" style="border-radius:0px 0px 25px 25px;"><div id="destroyer-0"></div><div id="destroyer-1"></div></div>
        <div class="ship submarine-container" draggable="true" style="border-radius:0px 0px 25px 25px;"><div id="submarine-0"></div><div id="submarine-1"></div><div id="submarine-2"></div></div>
        <div class="ship cruiser-container" draggable="true" style="border-radius:0px 0px 25px 25px;"><div id="cruiser-0"></div><div id="cruiser-1"></div><div id="cruiser-2"></div></div>
        <div class="ship battleship-container" draggable="true" style="border-radius:0px 0px 25px 25px;"><div id="battleship-0"></div><div id="battleship-1"></div><div id="battleship-2"></div><div id="battleship-3"></div></div>
        <div class="ship carrier-container" draggable="true" style="border-radius:0px 0px 25px 25px;"><div id="carrier-0"></div><div id="carrier-1"></div><div id="carrier-2"></div><div id="carrier-3"></div><div id="carrier-4"></div></div>
    </div>
 
 
</main> 
@endsection