<!DOCTYPE html>
<html>
<style>
    #container {
        width: 400px;
        height: 100px;
        position: relative;
        background: yellow;
        
    }
    
   .hero {
        width: 50px;
        height: 50px;
        position: absolute;
        background-color: green;
         background-image:url("myHead.jpg");
         background-size: cover;
       
    }
  
     .evil {
        width: 50px;
        height: 50px;
        position: absolute;
        left: 350px;
        top: 0px;
         background-image:url("enemy.png");
         background-size: cover;
    }
     
    h1 {
        color: red;
    }

</style>

<body>
   
    
   
   
    <div id="container" >
        <div id="animate"  class="hero"></div>
        <div id="animate_enemy" class='evil'></div>
    </div>
    <br><br>
     <div id="container"  >
        <div id="sanimate" class="hero"> </div>
        <div id="sanimate_enemy" class='evil'></div>
    </div>
   <h1 id="idh1"></h1>
    <div id="loser"></div>
   
   


    <script>
        //onkeydown="keyCode(event)
       
       
        var var_hDiv="animate";
        var var_eDiv='animate_enemy';
        var var_shDiv="sanimate";
        var var_seDiv='sanimate_enemy'; 
        var k_up ='38',k_down='40', q='81', a='65', w='87', s='83', e='69', d='68';
        
        var var_bind ="html";
        var var_sbind ='body';
        var var_speed =1;
           //hero enemy ,key_up key_down listen_object
           startBlockGame(var_hDiv,  var_eDiv,w,s,var_bind,10);
           startBlockGame(var_shDiv,var_seDiv,k_up,k_down,var_sbind,20);
        
     
    
        function startBlockGame(hero,enemy,KeyTop,KeyDown,bind,first_speed)
        {
        var hDiv=hero;
        var eDiv=enemy;
        var up =KeyTop,down=KeyDown;
        
      
        var shift = 50;
        var maxX = 350
        var maxY = 50;
        var speed = first_speed;
        
        var posX = 0;
        var posY = 0;
       
        var lose=false;
            
            simpleGame(eDiv);
            var body = document.querySelector(bind);
            body.onkeydown=function (){keyCode(event,up,down)};
           
        
        function simpleGame(DivEnemy) {
            var el = document.getElementById(DivEnemy);
            var x = 350;//
            var id = setInterval(frame, speed);
            
            var y = Math.random() >= 0.5 ? 0 : 50;
            el.style.top = y + 'px';

            function frame() {
           
                if (x == -50 )  {    
                    clearInterval(id);
                    simpleGame(DivEnemy);
                    
                }
                if (posX == (x - 40) && posY == y)
                    {
                    lose=true;
                    clearInterval(id);
                    loseGame(DivEnemy);
                        
                    }
                
                 x--;
                 
                 el.style.left = x + 'px';
                        }
                        
            }

        function keyCode(e) {
             var elem = document.getElementById(hDiv);

            if (e.keyCode == up ) {
                // up arrow 38
                if (posY > 0) {
                    posY -= shift;
                    elem.style.top = posY + 'px';
                }
            } else if (e.keyCode == down) {
                // down arrow
                
                if (posY < maxY) {
                    posY += shift;
                    elem.style.top = posY + 'px';
                }
                
            }
           }   

 function loseGame(DivEnemy)
            {
                    
              if (confirm("true again") == true) {
               simpleGame(DivEnemy);
            } else  
                 document.getElementById("idh1").innerHTML="LOSE THIS GAME( press F5)";
            
            }
        }
        
    </script>

</body>

</html>
