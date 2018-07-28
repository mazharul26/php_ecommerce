<?php


if (isset($_POST['submit'])){
    $data = new Database();
    $arr=array(
        "color_name" => $data->validate($_POST['Cname'])
         );
    if ($data->update("color", $arr,array("id"=>$_GET['id']))){
        echo 'Insert Successfully';
    }
    else{
        echo 'Anythubg wrong';
    }
}
?>



<?php
$sql=$data->view("color", "", "", array("id"=>$_GET['id']));

while($cor=$sql->fetch_object()){
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=Color-insert" class="btn btn-success">Insert Color</a>
             <a href="index.php?e=Color-view" class="btn btn-danger">View Color</a>
            </div>

            <div class="col-xs-12">
                <section class="section register inner-left-xs">
                    <h1> Insert color</h1>

                    <form action="" method="post" role="form" class="register-form cf-style-1">
                        <div class="field-row">
                            <div class="field-row">
                                <label>Color Name</label>
                                <input name="Cname" type="text" class="le-input" placeholder="Color .. " value="<?php    echo $cor->color_name?>">
                            </div><!-- /.field-row -->

                            <div class="buttons-holder">
                                <button name="submit" type="submit" class="le-button huge">Update Color</button>
                            </div><!-- /.buttons-holder -->

                    </form>
<?php
}

?>

                </section>
            </div>
        </div>
    </div>
</main>

