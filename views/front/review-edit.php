
<?php
if (isset($_POST['sub'])) {
    
    $arr= array(
              "description" => $data->validate($_POST['text'])
            );
      $where=array(
      "id"=>$_GET['id']
  );
        if ($data->update("review_insert", $arr,$where)) {
            Redirect("index.php?f=single-product");
//            Redirect("index.php?u=profile");
//        echo"Review-Update-Successful";
    }  else {
        echo $data->Error;
    }
}




?>















<?php 

if(isset($_GET['id'])){
//$update=$_GET['id'];
$update_review=$data->view("review_insert","","",array("id"=>$_GET['id']));
 
while ($update_reviews =$update_review->fetch_object()){
  
?>
<div class="container">
    <div class="row">
        <h1 style="text-align: center">Update comments about this product</h1>
        <div class="col-sm-3"></div>
        <div class="col-sm-6 well">
           
            <form id="contact-form" class="contact-form" method="post" >
               
                <div class="field-row">
                    <label>Your review Update</label>
                    <textarea rows="8" class="le-input" name="text" title="text"  ><?php echo $update_reviews->description ?></textarea>
                </div><!-- /.field-row -->
<br/><br/>
                <div class="buttons-holder">
                    <input type="submit" class="le-button huge" value="Update"  name="sub"/>
                </div><!-- /.buttons-holder -->
            </form><!-- /.contact-form -->
        </div>
    </div>
</div>

<?php 
}
}

?>

