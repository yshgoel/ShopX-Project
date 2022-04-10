<?php include('components/header.php'); ?>

<head>
    <title>Home</title>
    <!-- <style>
      .adjustImg{
            width: 100%;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;
        }
    </style> -->
</head>
    <section id = "home">
        <div class="container">
        </div>
        <div class="container">
            <h5>GRAB LATEST OFFERS</h5>
            <h1><span>Flat 50% OFF</span> This Summer !</h1>
            <p>Shop now with shopx to grab the latest and best deals.</p>
            <a href="shop.php"><button>EXPLORE</button></a>
        </div>

    </section>

    <section id = "brand" class = "container">
        <div class = "row" style = "justify-content:center;">
            <img  class = "img-fluid col-lg-3 col-md-6 col-sm-12 brandImg" src="assets/img/brand1.png" alt="">
            <img  class = "img-fluid col-lg-3 col-md-6 col-sm-12 brandImg" src="assets/img/brand2.png" alt="">
            <img  class = "img-fluid col-lg-3 col-md-6 col-sm-12 brandImg" src="assets/img/brand3.png" alt="">
            <img  class = "img-fluid col-lg-3 col-md-6 col-sm-12 brandImg" src="assets/img/brand4.png" alt="">
        </div>
    </section>

    <section id = "new" class = "w-100">
        <div class = "row p-0 m-0">
            <div class = "one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class = "img-fluid" src="assets/img/one.jpg" alt="">
                <div class = "details">
                    <h2>25% OFF On Shoes</h2>
                    <a href="shop.php?filter=shoes"><button class = "text-uppercase">SHOP NOW</button></a>
                </div>
            </div>
            <div class = "one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class = "img-fluid" src="assets/img/two.jpg" alt="">
                <div class = "details">
                    <h2>Mens Wear and Glasses</h2>
                    <a href="shop.php?filter=mens"><button class = "text-uppercase">SHOP NOW</button></a>
                </div>
            </div>
            <div class = "one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class = "img-fluid" src="assets/img/three.jpg" alt="">
                <div class = "details">
                    <h2>50% OFF on Womens Wear</h2>
                    <a href="shop.php?filter=women"><button class = "text-uppercase">SHOP NOW</button></a>
                </div>
            </div>
        </div>
    </section>

    <section id = "featured" class = "my-5 pb-5">
        <div class = "container text-center mt-5 py-5">
            <h3>Latest Featuring!</h3>
            <hr class = "mx-auto">
            <p>Latest Products are featured here ! Do check them out.</p>
        </div>
        <div class="row mx-auto container-fluid">
          <?php
            include('connection/featured_products.php'); 
          ?>
          <?php
            while($row=$featured_products_data->fetch_assoc()){?>
              <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="adjustImg img-fluid mb-3" src="assets/img/<?php echo $row['product_image']; ?>" alt="">
                <h5 class = "p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class = "p-price">₹ <?php echo $row['product_price']; ?></h4>
                <a href = "product.php?product_id=<?php echo $row['product_id']; ?>"><button class = "buy-btn">Buy Now</button></a>
            </div>
            <?php } ?>
        </div>
    </section>

    <section id = "banner" class = "my-5 py-5">
      <div class="container">
        <h4>SEASONAL SALE IS HERE!</h4>
        <h1>Latest Collection <br> Flat 25% OFF </h1>
        <button class = "text-uppercase">SHOP NOW</button>
      </div>
    </section>

    <section id = "featured" class = "my-5">
      <div class = "container text-center mt-5 py-5">
          <h3>All Listed Mens Shirts</h3>
          <hr class = "mx-auto">
          <p>Sales on greatest brand is here! Grab your need ASAP</p>
      </div>
      <div class="row mx-auto container-fluid">
        <?php
            include('connection/featured_mens_shirt.php'); 
        ?>
        <?php while($row=$featured_mens_shirt_data->fetch_assoc()){?>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="adjustImg img-fluid mb-3" src="assets/img/<?php echo $row['product_image']; ?>" alt="">
          <h5 class = "p-name"><?php echo $row['product_name']; ?></h5>
          <h4 class = "p-price">₹ <?php echo $row['product_price']; ?></h4>
          <a href = "product.php?product_id=<?php echo $row['product_id']; ?>"><button class = "buy-btn">Buy Now</button></a>
        </div>
       <?php } ?>
      </div>
    </section>

    <section id = "shoes" class = "my-5">
      <div class = "container text-center mt-5 py-5">
          <h3>35% OFF Valid for 3 days</h3>
          <hr class = "mx-auto">
          <p>Sales on Shoes! So what are you waiting for! Grab it out</p>
      </div>
      <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/img/shoes1.jpeg" alt="">
          <h5 class = "p-name">Nike Shoes</h5>
          <h4 class = "p-price">₹1999</h4>
          <button class = "buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/img/shoes2.jpeg" alt="">
          <h5 class = "p-name">Casual Shirt</h5>
          <h4 class = "p-price">₹1299</h4>
          <button class = "buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/img/shoes3.jpeg" alt="">
          <h5 class = "p-name">Funky Bag</h5>
          <h4 class = "p-price">₹999</h4>
          <button class = "buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/img/shoes4.jpeg" alt="">
          <h5 class = "p-name">Floral Dress</h5>
          <h4 class = "p-price">₹3999</h4>
          <button class = "buy-btn">Buy Now</button>
        </div>
      </div>
    </section>

    <section id = "watches" class = "my-5">
      <div class = "container text-center mt-5 py-5">
          <h3>Smart Watches On Your Way!</h3>
          <hr class = "mx-auto">
          <p></p>
      </div>
      <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/img/watch1.png" alt="">
          <h5 class = "p-name">Nike Shoes</h5>
          <h4 class = "p-price">₹1999</h4>
          <button class = "buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/img/watch2.jpg" alt="">
          <h5 class = "p-name">Casual Shirt</h5>
          <h4 class = "p-price">₹1299</h4>
          <button class = "buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/img/watch3.jpg" alt="">
          <h5 class = "p-name">Funky Bag</h5>
          <h4 class = "p-price">₹999</h4>
          <button class = "buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/img/watch4.jpg" alt="">
          <h5 class = "p-name">Floral Dress</h5>
          <h4 class = "p-price">₹3999</h4>
          <button class = "buy-btn">Buy Now</button>
        </div>
      </div>
    </section>

<?php include('components/footer.php'); ?>

