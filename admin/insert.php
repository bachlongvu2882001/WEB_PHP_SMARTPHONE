<?php ob_start(); ?>
<?php require_once "../php/echoHTML.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Phone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="lib/Jquery/Jquery.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/topnav.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/trangchu.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/insert.css">




</head>

<body>
<?php addTopNav(); ?>

<section>
		<?php 
			addHeader(); 
			addHome();
		?>
	</section>

    
    
    <?php include_once "../lib/function.php";
    $user = new xuly();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit'])) {

            $error = array();

            //kiểm tra giá và số lượng là số dương
            if ($_POST['product_price'] < 0) {
                $error['product_price'] = 'Nhập > 0';
            }
            if ($_POST['product_quantity'] < 0) {
                $error['product_quantity'] = 'Nhập > 0';
            }

            //kiểm tra các trường
            if (empty($_POST['product_name'])) {
                $error['product_name'] = 'Không đc để trống';
            }
            if (empty($_POST['description'])) {
                $error['description'] = 'Không đc để trống';
            }

            //kiểm tra ảnh
            if (isset($_FILES['image'])) {
                if ($_FILES['image']['error'] > 0) {
                } else {
                    $image = $_FILES['image']['name'];
                    $img_tmp = $_FILES['image']['tmp_name'];
                    move_uploaded_file($img_tmp, '../img/' . $image);
                }
            }

            //nếu không có lỗi thì chèn vào bảng
            if (empty($error)) {
                $user->insert($_POST['product_name'], $_POST['product_price'], $_POST['product_quantity'], $image, $_POST['description']);
            }
        }
    }


    ?>
    <div class="container">

        <form action="" enctype="multipart/form-data" method="post">

            <label for="">Product_Name</label>
            <input type="text" name="product_name" class="form-control">
            <!-- //hiển thị lỗi ra màn hình -->
            <?php if (isset($error['product_name'])) { ?>
                <span style="color: red;"> <?php echo $error['product_name'] ?> </span>
            <?php } ?><br>

            <label for="">Product_Price</label>
            <input type="number" name="product_price" class="form-control">
            <!-- //hiển thị lỗi ra màn hình -->
            <?php if (isset($error['product_price'])) { ?>
                <span style="color: red;"> <?php echo $error['product_price'] ?> </span>
            <?php } ?><br>

            <label for="">Product_Quantity</label>
            <input type="number" name="product_quantity" class="form-control">
            <!-- //hiển thị lỗi ra màn hình -->
            <?php if (isset($error['product_quantity'])) { ?>
                <span style="color: red;"> <?php echo $error['product_quantity'] ?> </span>
            <?php } ?><br>

            <label for="">Product_Image</label>
            <input type="file" name="image" class="form-control">
            <!-- //hiển thị lỗi ra màn hình -->
            <?php  if (isset($_FILES['image']['error']) > 0) { ?>
                <span style="color: red;"> <?php echo "Không đc để trống" ?> </span>
            <?php } ?><br>

            <label for="">Description</label>
            <input type="text" name="description" class="form-control">
            <!-- //hiển thị lỗi ra màn hình -->
            <?php if (isset($error['description'])) { ?>
                <span style="color: red;"> <?php echo $error['description'] ?> </span>
            <?php } ?><br>

            <button type="submit" name="submit" class="btn btn-dark">Insert</button>
        </form>
    </div>
    <div class="footer">
		<!-- <?php 
        addFooter(); 
        addPlc()
        ?> -->
	</div>
</body>

</html>
<?php ob_end_flush(); ?> 