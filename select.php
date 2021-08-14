 <?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "carrental");  
      $query = "SELECT * FROM tblusers WHERE id = '".$_POST["employee_id"]."' OR EmailId = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
     
      while($row = mysqli_fetch_array($result))  
      {  ?>
           <div class="table-responsive">  
           <table class="table table-bordered">   
               
                 
                 
                <tr>  
                    <td> <img src="img/ID Proof/<?php echo $row['lic']; ?>" width="550" height="400"> </td> 
                </tr>  
                  
          
       
      
           </table>  
      </div>  
       <?php
      } 
 }  
 ?>