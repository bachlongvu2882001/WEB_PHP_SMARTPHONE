<?php require_once "../php/echoHTML.php"; ?>
<?php include_once "../lib/function.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>

<body>
<?php addTopNav(); ?>
<section>
		<?php 
			addHeader(); 
			addHome();
		?>
	</section>

    
    <div class="container">

        <table class="table table-dark">
            <thead>
                <th>Product_ID</th>
                <th>Product_Name</th>
                <th>Product_Price</th>
                <th>Product_Quantity</th>
                <th>Product_Image</th>
                <th>Description</th>
                <th></th>
                <th></th>

            </thead>
            <tbody>
                <?php
                include_once "../lib/function.php";
                $user = new xuly();
                //xóa
                if (!isset($_GET['id']) || $_GET['id'] == null) {
                } else {
                    $id = $_GET['id'];
                    $user->delete($id);
                }

                $result = $user->getData();
                if (!empty($result)) {
                    foreach ($result as $val) {
                ?>
                        <tr>
                            <td> <?= $val['product_id'] ?> </td>
                            <td> <?= $val['product_name'] ?> </td>
                            <td> <?= $val['product_price'] ?> </td>
                            <td> <?= $val['product_quantity'] ?> </td>
                            <td> <img src="../img/<?= $val['product_image'] ?>" width="150px"> </td>
                            <td> <?= $val['description'] ?> </td>
                            <td> <a href="update.php?id=<?= $val['product_id'] ?>" onclick="return confirm('bạn có muốn sửa')" class="btn btn-success">sửa</a></td>
                            <td> <a href="table.php?id=<?= $val['product_id'] ?>" onclick="return confirm('bạn có muốn xóa')" class="btn btn-success">xóa</a></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
    <div class="footer">
		<?php 
        addFooter(); 
        addPlc();
        ?>
	</div>
</body>

</html>