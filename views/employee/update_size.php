
<?php
$db = new mysqli("localhost", "root", "", "ecommerce");
?>







<?php
$data = new Database();
if (isset($_POST['update'])) {
    $update = array(
        "size_name" => $data->validate($_POST['name'])
    );
    //update size set "name"=>$data->$_POST['name'] where id=10;
    if ($data->update("size", $update, array("id" => $_GET['id']))) {

        echo "Update successful";
        Redirect("index.php?e=size-view");
    } else {
//        echo $data->Error;
    }
}
?>
<?php
$sql=$data->view("size", "", "", array("id"=>$_GET['id']));

while ($size=$sql->fetch_object()){
    


?>

<div class="container">
    <div class="row">

        <div class="col-sm-8">
            <br/><br/>
            <a  href="index.php?e=size"  class="btn btn-success" name="">Size</a>
            <a  href="index.php?e=size-view"  class="btn btn-info" name="">View</a>

            <br/><br/><br/><br/>
            <h2>Product Size Information</h2>
            <form method="post" action="" height="100%" width="100%">
                <label>Name</label>
                <input type="text" class="le-input" name="name" value="<?php echo $size->size_name  ?>">
                <br/><br/><br/>
                <button class="btn-primary" name="update">Update</button>
            </form>

<?php
}
?>

        </div>
        <div class="col-sm-2"></div>
    </div>

</div>
<br/><br/>