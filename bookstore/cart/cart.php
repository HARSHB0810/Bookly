<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="cart.css" />
  <title>Document</title>
</head>

<body>
  <nav>
    <h1 class="logo">Bookly</h1>
    <ul class="pages">
      <li><a href="/" class="link">Home</a></li>
      <li><a href="../browse/browse.html" class="link">Browse</a></li>
      <li><a href="/cart/cart.html" class="link">Your Cart</a></li>
      <li><a href="../about.html" class="link">About Us</a></li>
    </ul>
    <i class="fa-solid fa-bars" id="menu" onclick="toggleMenu()"></i>
  </nav>
  <ul class="dropdown">
    <li><a href="/" class="link">Home</a></li>
    <li><a href="../browse/browse.html" class="link">Browse</a></li>
    <li><a href="/cart/cart.php" class="link">Your Cart</a></li>
    <li><a href="../about.html" class="link">About Us</a></li>
  </ul>
  <div class="main">
    <div class="container">



      <h1 class="heading">Your Cart </h1>
      <div class="book-cont">


        <?php
        // Establish database connection
        $conn = mysqli_connect("localhost", "root", "", "bookly");

        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve data from the books table
        $sql = "SELECT * FROM books";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {


            echo '<div class="sub-cont">';
            echo '<h4>' . $row["book_name"] . '</h4>';
            echo '<div class="button-cont">';
            echo '<div><span>Price:$</span > ' .$row["book_price"] . '</div>';
            echo '<div class="buy">buy</div>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo "Your cart is empty.";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
      </div>

    </div>
  </div>
  </div>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="./cart.js"></script>
</body>

</html>