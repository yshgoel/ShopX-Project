<?php include('components/header.php'); ?>

<?php 
  include('connection/server.php');
  if(isset($_POST['search'])){

    $category = $_POST['category'];

    $price = $_POST['price'];

    $stmt = $connection->prepare("SELECT * FROM products where product_category = ? and product_price between 100 and ?");
    $stmt->bind_param('si', $category, $price);
    $stmt->execute();
    $products = $stmt->get_result();
  }else{
    if(isset($_GET['filter'])){
      // echo $_GET['filter'];
      $stmt = $connection->prepare("SELECT * FROM products where product_category = ? ");
      $stmt->bind_param('s', $_GET['filter']);
      $stmt->execute();
      $products = $stmt->get_result();
    }else{
      $stmt = $connection->prepare("SELECT * FROM products");
      $stmt->execute();
      $products = $stmt->get_result();
    }
    
  } 
?>

<head>
    <style>
      /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
        .product img{
            width: 100%;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;
        }

        .pagination a{
            color: black;
        }
        .pagination l1:hover a{
           color: #fff;
           background-color: rgb(112, 232, 253); 
        }
        #smsearch{
          display : none;
        }
        @media only screen and (max-width: 990px){
            #search{
              display : none;
            }
            #shop{
              width:90%;
              display: inline-block;
            }
            #smsearch{
            display : inline-block;
          }

        }
            
        }
    </style>
    <title>Shop</title>
</head>
    <!--Search-->

  <div id = "smsearch" class = "container mt-5 pt-5">
      <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Filter Your Search 
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <section id="smsearch" class="ms-2">
            <div class="container mt-5 py-5">
              <p>Search Products</p>
              <hr>
            </div>

              <form action="shop.php" method="POST">
              <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  

                  <p>Category</p>
                    <div class="form-check">
                      <input class="form-check-input" value="mens" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='mens'){echo 'checked';}?> >
                      <label class="form-check-label" for="flexRadioDefault1">
                        Men
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" value="women" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=='women'){echo 'checked';}?>>
                      <label class="form-check-label" for="flexRadioDefault2">
                        Women
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" value="shoes" type="radio" name="category" id="category_three" <?php if(isset($category) && $category=='shoes'){echo 'checked';}?>>
                      <label class="form-check-label" for="flexRadioDefault2">
                        Shoes
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" value="bag" type="radio" name="category" id="category_four" <?php if(isset($category) && $category=='bag'){echo 'checked';}?>>
                      <label class="form-check-label" for="flexRadioDefault2">
                        Bags
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" value="others" type="radio" name="category" id="category_five" <?php if(isset($category) && $category=='others'){echo 'checked';}?>>
                      <label class="form-check-label" for="flexRadioDefault2">
                        Others
                      </label>
                    </div>

                </div>
              </div>


              <div class="row mx-auto container mt-5">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <p>Price</p>
                    
                    <input min="100" max="9999" class = "btn btn-primary" type = "number" name="price" value = "1000" style = "width : 90px; clip-path: polygon(50% 0%, 100% 0, 100% 35%, 100% 86%, 36% 86%, 25% 100%, 18% 86%, 0 86%, 0% 35%, 0 0);"/>
                    <input type="range" class="form-range w-100" name="price" value="<?php if(isset($price)){echo $price;}else{ echo "1000";} ?>" min="100" max="9999" id="customRange2" oninput="this.previousElementSibling.value = this.value">
                    <div class="w-100">
                      <span style="float: left;">100</span>
                      <span style="float:right;">9999</span>
                    </div>
                    
                  </div>
                </div>    


                <div class="form-group my-3 mx-3">
                  <input type="submit" name="search" value="Search" class="btn btn-secondary">
                  <button class = "btn btn-primary">Reset</button>
                </div> 

              <form>

              </section>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
  <section id="search" style = "border-radius : 20px; " class="mt-4 pt-4 ms-2 bg-white">
      <div class="container mt-5 py-5">
        <p>Search Products</p>
        <hr>
      </div>

        <form action="shop.php" method="POST">
         <div class="row mx-auto container">
           <div class="col-lg-12 col-md-12 col-sm-12">
            

            <p>Category</p>
             
               <div class="form-check">
                <input class="form-check-input" value="mens" type="radio" name="category" id="category_one" <?php if(isset($category) && $category=='mens'){echo 'checked';}?> >
                <label class="form-check-label" for="flexRadioDefault1">
                  Men
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" value="women" type="radio" name="category" id="category_two" <?php if(isset($category) && $category=='women'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  Women
                </label>
              </div>

               <div class="form-check">
                <input class="form-check-input" value="shoes" type="radio" name="category" id="category_three" <?php if(isset($category) && $category=='shoes'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  Shoes
                </label>
              </div>

               <div class="form-check">
                <input class="form-check-input" value="bag" type="radio" name="category" id="category_four" <?php if(isset($category) && $category=='bag'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  Bags
                </label>
              </div>

               <div class="form-check">
                <input class="form-check-input" value="others" type="radio" name="category" id="category_five" <?php if(isset($category) && $category=='others'){echo 'checked';}?>>
                <label class="form-check-label" for="flexRadioDefault2">
                  Others
                </label>
              </div>

           </div>
         </div>


         <div class="row mx-auto container mt-5">
           
           <div class="col-lg-12 col-md-12 col-sm-12">
               <p>Price</p>
               <div style = "display : flex; justify-content: space-evenly; align-items: center">
                 <input  type="range" class="form-range w-50" name="price" value="<?php if(isset($price)){echo $price;}else{ echo "1000";} ?>" min="100" max="9999" id="customRange2" oninput="this.nextElementSibling.value = this.value">
                 <input min="100" max="9999" class = "btn btn-primary" type = "number" name="price" value = "1000" style = "width : 90px; clip-path: polygon(100% 0%, 100% 50%, 100% 100%, 25% 100%, 0% 50%, 25% 0%);"/>
               </div>
               <div class="w-50">
                 <span style="float: left;">100</span>
                 <span style="float:right;">9999</span>
               </div>
            </div>
          </div>    


          <div class="form-group my-3 mx-3">
            <input type="submit" name="search" value="Search" class="btn btn-secondary">
            <button class = "btn btn-primary">Reset</button>
          </div> 

        <form>

  </section>

    <section id = "shop" class = "mt-2 pt-2">
        <div class = "container  mt-5 pt-5">
            <h3>All Products</h3>
            <hr class = "">
            <p>Latest Products are featured here ! Do check them out.</p>
        </div>

        <!-- <?php if(isset($product) and $product==null) { ?>
          <h1>No Products Found !</h1>
        <?php } ?> -->


        <div class="row mx-auto container">
        <?php while($row = $products->fetch_assoc()) { ?>
          
          <div onclick="window.location.href='product.php?product_id=<?php echo $row['product_id']; ?>';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/img/<?php echo $row['product_image']; ?>" alt="">
            <h5 class = "p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class = "p-price">₹ <?php echo $row['product_price']; ?></h4>
            <!-- <button onclick="window.location.href='product.php?product_id=<?php echo $row['product_id']; ?>';" class = "buy-btn">Buy Now</button> -->
          </div>
        <?php } ?>
          

          <nav area-label="Page navigation example">
              <ul class = "pagination mt-5">
                <li class = "page-item">
                    <a class = "page-link" href="#">Prev</a>
                </li>
                <li class = "page-item">
                    <a class = "page-link" href="#">1</a>
                </li>
                <li class = "page-item">
                    <a class = "page-link" href="#">2</a>
                </li>
                <li class = "page-item">
                    <a class = "page-link" href="#">3</a>
                </li>
                <li class = "page-item">
                    <a class = "page-link" href="#">Last</a>
                </li>
              </ul>
          </nav> 
        </div>
        
    </section>

    <?php include('components/footer.php'); ?>