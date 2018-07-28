<?php
$data = new Database();
if (isset($_POST['submit'])) {

    $insertArr = [
        'title' => $data->validate($_POST['title']),
        'description' => $data->validate($_POST['description']),
        'userid' => $data->validate($_SESSION['user']['id']),
        'price' => $data->validate($_POST['price']),
        'stock' => $data->validate($_POST['stock']),
        'subcategoryid' => $_POST['subcategory'],
        'unitid' => $_POST['unit']
    ];
    $where = array(
        "id" => $_GET['id']
    );



    if ($result = $data->update("product", $insertArr, $where)) {
        echo "Update successfull";
    } else {
        echo $result->Error;
    }
}
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <!-- View -->
            <div class="col-xs-12">
                <a href="index.php?e=seller_view" class="btn btn-success"> View Products</a>
                <a href="index.php?e=seller"><button class="btn btn-info">Add New Product</button></a>
            </div>
            <div class="container">
                <div class="col-xs-12">  <h1 class="title-color">Update Products</h1>
                    <p><?php
                        if (isset($msg))
//                            echo $msg;
                            
                            ?>
                    </p>
                </div>
            </div>
            <div class="container">



                <?php
                if (isset($_GET['add'])) {

                    $array = ["ids" => $_GET['add']];


                    $products = $data->view("seller_my_products", "", "", $array);
                    while ($row = $products->fetch_object()) {
                        echo '<tr>';
                        ?>   


                        <form class="form-group" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group col-xs-12">
                                <label>Product Title</label>
                                <input class="form-control" type="text" name="title" placeholder="Product Title .. " value="<?php echo $row->title ?>">
                            </div>
                            <div class="form-group col-xs-12">
                                <label>Product Description</label>
                                <textarea class="form-control" name="description" placeholder="Product Description"></textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" placeholder="price"  value="<?php echo $row->price ?>">
                            </div>                           
                            <div class="form-group col-md-6">
                                <label>Stock</label>
                                <input type="number" class="form-control" name="stock" placeholder="Stock Available" value="<?php echo $row->stock ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Category</label>
                                <select id="unit" class="form-control" name="unit">
                                    <option value="0">Select Unit</option>
                                    <?php
                                    $units = $data->view('unit', '', ['id', 'ASC']);
                                    while ($rows = $units->fetch_object()) {
                                        ?>
                                        <option value="<?php echo $rows->id; ?>"><?php echo $rows->unit_name; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>


                            </div>
                            <div class="form-group col-md-6">
                                <label>Category</label>
                                <select id="category" class="form-control" name="category">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $categories = $data->view('category', '', ['id', 'ASC']);
                                    while ($rowss = $categories->fetch_object()) {
                                        ?>
                                        ,                         <option value="<?php echo $rowss->id; ?>"><?php echo $rowss->category_name; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Sub-Category</label>
                                <select class="form-control" name="subcategory">
                                    <option value="0">Select a Sub Category First</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Featured Image</label>
                                <input class="form-control" type="file" name="featured">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Picture 1</label>
                                <input class="form-control" type="file" name="upload[]" multiple="">
                            </div>

                            <div class="form-group col-xs-12">
                                <input type="submit" class="btn btn-lg btn-success" name="submit" value="Update Product">
                            </div>

                        </form>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</main>

<script>

    $(function() {

        /* Category and Sub Category */

        $("select[name='subcategory']").prop('disabled', true);


        $("select[name=category]").change(function() {
            category = parseInt($(this).val());
            if (category === 0) {
                $("select[name=subcategory]").prop('disabled', true);
                $("select[name=subcategory]").children().remove();
                $(this).addClass('error');
                $("select[name=category], select[name=subcategory]").addClass('error');
                $("select[name=subcategory]").append("<option value='0' selected>Select a category First</option>");
<?php
$categories2 = $data->view('category');
while ($category = $categories2->fetch_object()) {
    echo "} else if (category == {$category->id}) { \n";
    echo " $(\"select[name=category], select[name=subcategory]\").removeClass('error'); \n";
    echo " $(\"select[name=subcategory]\").children().remove(); \n ";
    echo " $(\"select[name=subcategory]\").prop('disabled', false); \n";
    echo " $(\"select[name=subcategory]\").append(\"<option value='0'>Select subcategory</option>\"); \n ";
    $subcategories2 = $data->view('subcategory', '', '', ["categoryid" => $category->id]);
    while ($subcategory2 = $subcategories2->fetch_object()) {
        echo " $(\"select[name=subcategory]\").append(\"<option value='{$subcategory2->id}'>{$subcategory2->subcategory_name}</option>\"); \n";
    }
}
?>

            }
            ;
        });
        // category and city End

    });</script>

