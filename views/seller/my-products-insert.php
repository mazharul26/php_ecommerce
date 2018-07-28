<?php
//echo 'product Insert';

if (isset($_POST['submit']))
{

// When from submit is clicked


    /*
     * Validation Start
     */

    /*
     * Validation End
     */



    /*
     * Validation Passed
     */
    $insertArr = [
        'title' => $data->validate($_POST['title']),
        'description' => $data->validate($_POST['description']),
        'userid' => $data->validate($_SESSION['user']['id']),
        'price' => $data->validate($_POST['price']),
        'sales_price' => $data->validate($_POST['salesprice']),
        'discount' => $data->validate($_POST['discount']),
        'vat' => $data->validate($_POST['vat']),
        'stock' => $data->validate($_POST['stock']),
      'subcategoryid' => $_POST['subcategory'],
        'unitid' => $_POST['unit']
    ];



    /*
     * Multiple file uplaod start
     */


    /*
     * Multiple file uplaod End
     */



    if ($data->insert("product", $insertArr))
    {
        $productid = $data->Id;
        $insertPic = [];

        // description to the text file
        if (isset($_POST['description']))
        {
            $path = 'files/products/';
            $folder1 = 'files/products/' . fileNameSecure($productid, 'description', 'product');
            if (!is_dir($path))
                mkdir($path, 0755, true);
            $content = $_POST['description'];
            $filename = $folder1 . ".txt";
            $fp = fopen($filename, "w");
            fwrite($fp, $content);
            fclose($fp);
//            echo $folder1;
        }



        $total = count($_FILES['upload']['name']) - 1;
        $folder = 'images/products/' . fileNameSecure($productid);
        if (!is_dir($folder))
            mkdir($folder, 0755, true);
        $insertPic['pics'] = '';
        if (extension($_FILES['featured']['name']))
        {
            $tmpFilePath = $_FILES['featured']['tmp_name'];
            $featuredFileName = 'f.' . extension($_FILES['featured']['name']);
            $newFilePath = $folder . '/' . $featuredFileName;
            move_uploaded_file($tmpFilePath, $newFilePath);
            $insertPic['featuredImage'] = $featuredFileName;
        }

        for ($i = 0; $i <= $total; $i++)
        {
            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
            //Make sure we have a file path
            if ($tmpFilePath != "")
            {
                if (!is_dir($folder))
                    mkdir($folder, 0755, true);
                //Setup our new file path
                $picName = ($i + 1) . '.' . extension($_FILES['upload']['name'][$i]);
                $newFilePath = $folder . '/' . $picName;
                //Upload the file into the temp dir
                if (move_uploaded_file($tmpFilePath, $newFilePath))
                {
                    if ($i == $total)
                        $insertPic['pics'] .= $picName;
                    else
                        $insertPic['pics'] .= $picName . '|';
                }
            }
        }
        arrecho($insertPic);
        if ($data->update('product', $insertPic, ['id' => $productid]))
            echo 'iamge uplaoded and inserted';
    }
    else
    {
        echo $data->Error;
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
                <div class="col-xs-12">  <h1 class="title-color">Insert Products</h1>
                    <p><?php
                        if (isset($msg))
//                            echo $msg;
                        ?>
                    </p>
                </div>
            </div>
            <div class="container">
                <form class="form-group" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group col-xs-12">
                        <label>Product Title</label>
                        <input class="form-control" type="text" name="title" placeholder="Product Title .. ">
                    </div>
                    <div class="form-group col-xs-12">
                        <label>Product Description</label>
                        <textarea class="form-control" name="description" placeholder="Product Description"></textarea>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Price</label>
                        <input type="number" class="form-control" name="price" placeholder="price">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Sales Price</label>
                        <input type="number" class="form-control" name="salesprice" placeholder="Sales Price">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Discount</label>
                        <input type="number" class="form-control" name="discount" placeholder="Discount">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Vat</label>
                        <input type="number" class="form-control" name="vat" placeholder="Vat">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Stock</label>
                        <input type="number" class="form-control" name="stock" placeholder="Stock Available">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Category</label>
                        <select id="unit" class="form-control" name="unit">
                            <option value="0">Select Unit</option>
                            <?php
                            $units = $data->view('unit', '', ['id', 'ASC']);
                            while ($row = $units->fetch_object())
                            {
                                ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->unit_name; ?></option>
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
                            while ($row = $categories->fetch_object())
                            {
                                ?>
                                <option value="<?php echo $row->id; ?>"><?php echo $row->category_name; ?></option>
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
                        <input type="submit" class="btn btn-lg btn-success" name="submit" value="Insert Product">
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>

<script>

    $(function () {

        /* Category and Sub Category */

        $("select[name='subcategory']").prop('disabled', true);


        $("select[name=category]").change(function () {
            category = parseInt($(this).val());
            if (category === 0) {
                $("select[name=subcategory]").prop('disabled', true);
                $("select[name=subcategory]").children().remove();
                $(this).addClass('error');
                $("select[name=category], select[name=subcategory]").addClass('error');
                $("select[name=subcategory]").append("<option value='0' selected>Select a category First</option>");
<?php
$categories2 = $data->view('category');
while ($category = $categories2->fetch_object())
{
    echo "} else if (category == {$category->id}) { \n";
    echo " $(\"select[name=category], select[name=subcategory]\").removeClass('error'); \n";
    echo " $(\"select[name=subcategory]\").children().remove(); \n ";
    echo " $(\"select[name=subcategory]\").prop('disabled', false); \n";
    echo " $(\"select[name=subcategory]\").append(\"<option value='0'>Select subcategory</option>\"); \n ";
    $subcategories2 = $data->view('subcategory', '', '', ["categoryid" => $category->id]);
    while ($subcategory2 = $subcategories2->fetch_object())
    {
        echo " $(\"select[name=subcategory]\").append(\"<option value='{$subcategory2->id}'>{$subcategory2->subcategory_name}</option>\"); \n";
    }
}
?>

            }
            ;
        });
        // category and city End

    });</script>


