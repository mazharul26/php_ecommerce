

  <?php
    $data = new Database();

      if (isset($_GET['id'])) {
    $arr = array(
        "id" => $_GET['id']
    );

    if ($result = $data->delete("size", $arr)) {
        echo 'Yes';
    } else {
        echo $data->Error;
    }
}
    ?>




<div class="container">
    <div class="row">
  
         <div class="col-sm-10">
              <a  href="index.php?e=size"  class="btn btn-success" name="">Size</a>
                          <a  href="index.php?e=size-view"  class="btn btn-info" name="">View</a>
             <br/><br/>
  <h2>Product Size Information</h2>
             
             <br/><br/><br/><br/>
             <table border="1" width="100%">
                 <tr style="background-color: #9933ff; color: #33ff33">
                 
                     <th style="text-align: center">Size Name</th>
                      <th  style="text-align: center">Edit</th>
                      <th  style="text-align: center">Delete</th>
                 </tr>
                 <?php
            
                 $sql=$data->view("size");
                 
                 
                 while($d=$sql->fetch_object()){
                    echo"<tr>"; 
                    
                       echo"<td>$d->size_name</td>"; 
                        echo"<td  style='text-align: center'><a href='index.php?e=update_size&id={$d->id}' class='btn btn-info'>Edit</a></td>";
                        
                        echo"<td  style='text-align: center'><a href='index.php?e=Delete_size&id={$d->id}' class='btn btn-info '>Delete</a></td>";
                    
                    
                    echo"<tr>"; 
                 }
                 
                 
                 
                 ?>
                 
                
             </table>
             
             
         </div>
          <div class="col-sm-2"></div>
    </div>
    
</div>

<br/><br/>


