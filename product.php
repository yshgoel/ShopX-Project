<?php include('components/header.php'); ?>
<?php
  include('connection/server.php');
  if(isset($_GET['product_id'])){
    $pr_id = $_GET['product_id'];
    $getResult = $connection->prepare(
        "SELECT * FROM products WHERE product_id = ?"
    );
    $getResult->bind_param("i",$pr_id);
    $getResult->execute();
    $product = $getResult->get_result();
  }else{
    header('location: index.php');
  }
?>

<head>
    <title>Product</title>
</head>

    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">
          <?php while ($row = $product->fetch_assoc()){?>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid rounded w-100 pb-1" src="assets/img/<?php echo $row['product_image']; ?>" id="mainImg"/>
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="assets/img/<?php echo $row['product_image']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/img/<?php echo $row['product_image2']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/img/<?php echo $row['product_image3']; ?>" width="100%" class="small-img"/>
                    </div>
                    <div class="small-img-col">
                        <img src="assets/img/<?php echo $row['product_image4']; ?>" width="100%" class="small-img"/>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 col-md-12 col-12">
                <h6>> <?php echo $row['product_category']; ?></h6>
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2>₹ <?php echo $row['product_price']; ?></h2>

                <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
                  <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>"/>  
                  <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>"/>
                  <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>"/>
                      <input type="number" min="1" name="product_quantity" value="1"/>
                      <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
                </form>
                <h4 class="mt-5 mb-5">Product details</h4>
                <span><?php echo $row['product_description']; ?>
                </span>
                <img class = "img-fluid mt-4 sizeChart" src="assets/img/size_chart.png" alt="">
            </div>
            <?php } ?>

        </div>
      </section>

      <script>
        var mainImg = document.getElementById("mainImg");
        var smallImg = document.getElementsByClassName("small-img"); 
        for(let i=0; i<4; i++){
            smallImg[i].onclick = function(){
                mainImg.src = smallImg[i].src;
            }
        }
       </script>


      <?php include('components/footer.php'); ?>