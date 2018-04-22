<?php

    include "MySQL_Functions.php";

    $connection = getMySQLConnection();

    if($_GET["min"] != "") {
        $minPrice = $_GET["min"];
    } else {
        $minPrice = 0;
    }

    if($_GET["max"] != "") {
        $maxPrice = $_GET["max"];
    } else {
        $maxPrice = 100000000;
    }

    $sql = "SELECT * FROM property WHERE price >= ".$minPrice." AND price <= ".$maxPrice;
    $propertyInfo = $connection -> query($sql);


    $propertyList = "
            <div id='propertyContainer'>
              <section class='wrapper style1'>
                  <div class='container'>
                      <div class='row'>";
    if($propertyInfo -> num_rows > 0) {
        while($row = $propertyInfo -> fetch_assoc()) {
            $userID = $row['userID'];
            $propertyID = $row['propertyID'];
            $directory = "uploads/" . $userID . "/" . $propertyID . "/";
            $pictures = scandir($directory);

            if (sizeof($pictures) == 2) {
                $html = "<img src='images/noImage.jpg' alt='' />";
            } else {
                $path = $directory . $pictures[2];
                $html = "<img src='" . $path . "' alt='' />";
            }

            $propertyList .= "
                          <section class='6u 12u(narrower)'>
                              <div class='box post'>
                                  <a href='listing.php?address=" . $row['address'] . "&propertyID=" . $row['propertyID'] . "' class='image left'>" . $html . "</a>
                                  <div class='right' style='float: right;'>
                                    <span class='flag' value=" . $row['propertyID'] . "><img src='images/flag.png' alt='Flag'></span>
                                  </div>
                                  <div class='inner' style = 'float: left; margin-left: 5%;'>
                                      <strong>$" . $row['price'] . "</strong></br>
                                      " . $row['bedroom'] . " Bedrooms</br>
                                      " . $row['address'] . "</br>
                                      " . $row['city'] . ", " . $row['state'] . " " . $row['zipcode'] . "</br>
                                  </div>
                                  
                              </div>
                          </section>";
        }
        $propertyList .= "
                      </div>
                  </div>
              </section>
             </div>";

    } else {
        $propertyList .= "
            <div id='propertyContainer'>
              <section class='wrapper style1'>
                  <div class='container'>
                      <div class='row'>
                          <section class='6u 12u(narrower)'>
                              <div class='box post'>
                                  <div class ='inner'>
                                      <h3>There are no properties to be seen</h3>
                                   </div>
                              </div>
                          </section>
                      </div>
                  </div>
              </section>
            </div>";
    }

    $data = array('html' => $propertyList);

    echo json_encode($data);







?>
