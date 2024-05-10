<?php
include '../controller/movieC.php';




$db = config::getConnexion();
if (isset($_POST["action"])) {
    $query = $query = "SELECT * FROM movie";


    if (isset($_POST["dateMovie"])) {
        $category_filter = implode("','", $_POST["dateMovie"]);
        $query .= "
	  where dateMovie IN('" . $category_filter . "')
	 ";
    }
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output = '';
    if ($total_row > 0) {
        foreach ($result as $row) {
            $output .= '


            <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./images/' . $row['moviePoster'] . '" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>' . $row['movieName'] . '</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">' . $row['dateR'] . '</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">' . $row['duration'] . '<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">' . $row['rate'] . '</button>
                      </span>
                      <br />
                      <br />
                      </p>

                      <p class="para_i">' . $row['descriptionMovie'] . '</p>

                      <!--<form action="https://youtu.be/YoHD9XEInc0&t=17s"> -->

                      <button class="trailer_i" type="submit" value="" onclick="openWin()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin() {
                          window.open("' . $row['trailer'] . '?autoplay=1&controls=0&showinfo=0&modestbranding=1&loop=1&playlist=YoHD9XEInc0", "_blank", "top=1000,left=10,height=315,width=560,channelmode=no,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");

                        }
                      </script>
                      <!-- </form> -->
                      <br>
                      <br>
                      <button class="btn_i b4_i" type="submit" value="" style=" height: 0.75cm; width:2.5cm; ">

                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                        <a href="addLine.php?idMovie=' . $row['idMovie'] . '">
                      </button>
                      <script type="text/javascript">

                      </script>
                </div>
              </div>
              <div class="flim">
                <b>' . $row['movieName'] . '</b><br>IMDb -' . $row['rate'] . '
              </div>
            </div>
          </div>

                                ';
        }
    } else {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;
}
