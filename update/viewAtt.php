<?php  

 $attid = Uri::segment(3);

 $eid = Uri::segment(4); 
   echo "<img height='500' width='500'". "src='"."http://cs.colostate.edu/~" . $eid . "/ct310/index.php/federation/attrimage/". $attid . "'>";
     echo "<br>";

        
    



        $ch = curl_init("http://cs.colostate.edu/~" . $eid . "/ct310/index.php/federation/attraction/". $attid);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);       
        curl_close($ch);
        echo $output;
        
        
     
        
      
        
      
        
        
             ?>
