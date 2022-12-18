<!DOCTYPE html>

<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>HepsiSurada</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              Hepsisurada
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <?php
              include "config.php";

              $sql_command = "SELECT cName FROM categories";
              $myresult = mysqli_query($db, $sql_command);
              while ($row = mysqli_fetch_assoc($myresult)) {
                $catName = $row['cName'];
                echo "<li class='nav-item'>
                <a class='nav-link' href='$catName.php'> $catName </a>
              </li>";
              }
              ?>
            </ul>
            <div class="user_option-box">
            <a href="userprofile.php">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              <a href="shoppingCart.php">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
              </a>
              <a href="/hepsisurada/orders.php">
                <i class="nav-item">
                  <i class="nav-link" href="/hepsisurada/orders.php">My Orders</i>
                </i>
              </a>
              <a href="/hepsisurada/adminPanel/home.html">
                <i class="nav-item">
                  <i class="nav-link" href="../home.html">Admin Panel</i>
                </i>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

<!-- shop section -->


<style>
    .total-amount-container {
  display: flex;
  flex-direction: column;
}

.total-amount {
  display: flex;
  align-items: center;
  justify-content: flex-end;
  width: 100%;
  font-size: 18px;
  font-weight: bold;
  color: #333;
}

.checkout-button {
  display: block;
  width: 200px;
  height: 50px;
  margin: 20px auto 0;
  background-color: #333;
  color: #fff;
  font-size: 18px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
  </style>

 
<section class="shop_section">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Your Orders
        </h2>
      </div>
      <div class="">
        <?php
        include "config.php";
        $userID = 1;   // Change the value of the userid in order to get that user profile
        $sql_command = "SELECT o.oid, o.oStatus
        FROM orders o
        JOIN give g ON o.oid = g.oid
        JOIN users u ON g.uid = u.uid
        WHERE u.uid = $userID
        ";
        $myresult = mysqli_query($db, $sql_command);
        // First, get all the orders for the user
        $orders = array();
        while ($row = mysqli_fetch_assoc($myresult)) {
            $orders[] = array(
                'orderID' => $row['oid'],
                'orderStatus' => $row['oStatus']
            );
        }
        
        // Now, loop through the orders and display them
        foreach ($orders as $order) {
            // Wrap the order information in a div with a grey background
            echo '<div class="order" style="background-color: #3b4a6b;  border-radius: 10px;">';
            
            // Display the order information
            echo '<h3 style = "color: white; padding-left: 15px; padding-top: 10px" >Order ID: ' . $order['orderID'] . '</h3>';
            echo '<p style = "color: white; padding-left: 25px">Order Status: ' . $order['orderStatus'] . '</p>';
            
            // Now, get the products in the order
            $orderID = $order['orderID'];
            $product_sql_command = "SELECT p.pName, p.pPrice, p.pid, c.amount
                                   FROM products p
                                   JOIN consists_of c ON p.pid = c.pid
                                   WHERE c.oid = $orderID";
            $product_result = mysqli_query($db, $product_sql_command);
            
            // Display the products in a table
            $totalShoppingCart = 0;
            while ($row = mysqli_fetch_assoc($product_result)) {
              $pID = $row['pid'];
              $pName = $row['pName'];
              $pPrice = $row['pPrice']; 
              $amount = $row['amount'];
              $totPrice = floatval($pPrice) * floatval($amount);
              $totalShoppingCart += $totPrice;
              
              // Wrap the product information and details in a div with a white background
              echo "<div class='row' style='border: 15px solid #3b4a6b; border-radius: 20px; background-color: white; margin: 10px 0'>
                <div class='product-container' style='display: flex; align-items: center; width: 70%'>
                  <div class='img-box'>
                    <img src='$pID.jpg' alt='' style='width: 100px; height: 100px;  border-radius: 20px;'>
                  </div>
                  <div class='detail-box'>
                    <div class='type'>
                      <h4 style = 'padding-left: 10px'>
                        $amount x $pName
                      </h4>
                    </div>
                    <div class='price' style = 'padding-left: 25px; color: gray'>
                      <h6>
                        $pPrice$
                      </h6>
                    </div>
                  </div>
                </div>
                <div class='price-container' style='display: flex; align-items: center; width: 30%; justify-content: flex-end'>
                  <div class='price'>
                    <h6>
                      $totPrice$
                    </h6>
                  </div>
                </div>
              </div>";
            }
            
            // Close the div for the order
            echo '</div> <br> <br>';
          }
          
        
        
          
        ?>
        
        
        </div>
      </div>
      
    </div>
  </section>

  <!-- end shop section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="">
          <div class="detail-box">
            <div class="heading_container" style="align-items:center">
              <h2>
                About Us
              </h2>
            </div>
            <h4>
              We are a group of 3 students from Sabanci University. We are taking CS306 Database Systems course. This is our basic E-Commerce website. We are learning HTML, CSS, PHP, MySQL with this project. Hope you enjoy our website! 
    </h4>
            <style>
            html {
              box-sizing: border-box;
            }

            *, *:before, *:after {
              box-sizing: inherit;
            }

            .columnx {
              float: left;
              width: 33.3%;
              margin-bottom: 16px;
              padding: 0 8px;
            }

            .cardx {
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
              margin: 8px;
            }

            .about-sectionx {
              padding: 50px;
              text-align: center;
              background-color: #474e5d;
              color: white;
            }

            .containerx {
              padding: 0 16px;
              background-color: #2F3B55;
            }

            .containerx::after, .row::after {
              content: "";
              clear: both;
              display: table;
            }

            .titlex {
              color: grey;
            }


            @media screen and (max-width: 650px) {
              .columnx {
                width: 100%;
                display: block;
              }
            }
            </style>
            </head>
            <body>


<h2 style="text-align:center; font-weight: bold; padding-top:20px; padding-bottom:4px">Our Team</h2>

<div class="rowx">
  <div class="columnx">
    <div class="cardx">
      <img src="aydinaydemirx.jpg" alt="Aydin Aydemir" style="width:100%">
      <div class="containerx">
        <h2 style="padding-top: 16px; text-align: center">Aydin Aydemir</h2>
        <p class="title" style= "text-align: center">Group Member</p>
        <p style= "text-align: center">28686</p>
        <p style= "text-align: center">aydinaydemir@sabanciuniv.edu</p>
      </div>
    </div>
  </div>

  <div class="rowx">
  <div class="columnx">
    <div class="cardx">
      <img src="aycaataerx.jpg" alt="Ayca Ataer" style="width:100%">
      <div class="containerx">
        <h2 style="padding-top: 16px; text-align: center">Ayca Ataer</h2>
        <p class="title" style= "text-align: center">Group Member</p>
        <p style= "text-align: center">28156</p>
        <p style= "text-align: center">aycaataer@sabanciuniv.edu</p>
      </div>
    </div>
  </div>

  <div class="rowx">
  <div class="columnx">
    <div class="cardx">
      <img src="halilibrahimx.jpg" alt="Halil Ibrahim Deniz" style="width:100%;">
      <div class="containerx">
        <h2 style="padding-top: 16px; text-align: center">Halil Ibrahim Deniz</h2>
        <p class="title" style= "text-align: center">Group Member</p>
        <p style= "text-align: center">28225</p>
        <p style= "text-align: center">halilibrahim@sabanciuniv.edu</p>
      </div>
    </div>
  </div>


            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  

</body>

</html>