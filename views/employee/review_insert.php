<?php
$data = new Database();


if (isset($_POST['sub']))
{

    $arr = array(
        "rating" => $_POST['rating'],
        "userid" => $_POST['userid'],
        "productid" => $_POST['productid']
    );

    if ($data->insert("review", $arr))
    {
        echo"Review-Insert-Successful";
    }
    else
    {
        echo $data->Error;
    }
}
?>



<div class="container">
    <h2>Product Review Information</h2><br/><br/>
    <div class="row">
        <a href="index.php?e=review_insert" class="btn btn-success">Review</a>
        <a href="index.php?e=review_view" class="btn btn-warning">View</a>
        <form method="post" >
            <div class="form-group">
                <br/><br/> <br/><br/>
                <label class="control-label col-sm-2" for="rating">Rating:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Enter rating" name="rating">
                </div>

            </div>

            <br/><br/> <br/><br/>
            <div class="form-group">
                <label class="control-label col-sm-2" for="users">Users-Name:</label>
                <div class="col-sm-8">
                    <select name="userid">
                        <option value="0">Choice</option>
                        <?php
                        $sql1 = $data->view("users");

                        while ($fry = $sql1->fetch_object())
                        {

                            echo"<option value='$fry->id'>$fry->name</option>";
                        }
                        ?>
                    </select>
                </div>
            </div> <br/><br/> <br/><br/>
            <div class="form-group">
                <label class="control-label col-sm-2" for="product">Product-Name:</label>
                <div class="col-sm-8">
                    <select name="productid">
                        <option value="0">Choice</option>
                        <?php
                        $sql1 = $data->view("product");

                        while ($fry = $sql1->fetch_object())
                        {

                            echo"<option value='$fry->id'>$fry->title</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>


            <br/><br/>  <br/><br/>

            <button name="sub" class="btn btn-success">Review-Insert</button><br/><br/>






        </form>
    </div>
</div>