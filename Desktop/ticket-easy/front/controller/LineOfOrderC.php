<?php
require_once '../config.php';
include '../model/LineOfOrder.php';
include '../model/movie.php';

class LineC
{
    public function listLine()
    {
        $sql = "SELECT * FROM line_of_order ";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addLine($line)
    {
        $sql = "INSERT INTO line_of_order  
        VALUES (NULL,:quantity,:idMovie,:idClient)";
        $db = config::getConnexion();
        try {

            $query = $db->prepare($sql);
            $query->execute([
                'quantity'  => $line->getquantity(),
                'idMovie' => $line->getidMovie(),
                'idClient' => $line->getidClient()

            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function deleteLine($id)
    {
        $sql = "DELETE FROM line_of_order WHERE idLine = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function updateLine($line, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE line_of_order SET 
                    
                   
                    quantity = :quantity,
                    idMovie = :idMovie,
                    idClient = :idClient
                   
                WHERE idLine= :idLine'
            );
            $query->execute([
                'idLine' => $id,
                'quantity' => $line->getquantity(),
                'idMovie' => $line->getidMovie(),
                'idClient' => $line->getidClient()




            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function listMovie()
    {
        $sql = "SELECT * FROM movie";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }





    function showMovie($id)
    {
        $sql = "SELECT * FROM movie WHERE idMovie = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $menu = $query->fetch();
            return $menu;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    function showLine($id)
    {
        $sql = "SELECT * from line_of_order where idLine = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $menu = $query->fetch();
            return $menu;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showMovieByName($id)
    {
        $sql = "SELECT * from movie where movieName = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $menu = $query->fetch();
            return $menu;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }






    function showLineByIdMovie($id)
    {
        $sql = "SELECT * from line_of_order where idMovie = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $menu = $query->fetch();
            return $menu;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }




    function deleteBasket($id)
    {
        $sql = "DELETE FROM line_of_order WHERE idUser = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


/*
    function updatemovie($movie, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE movie SET 
                    MovieName = :MovieName, 
                    priceTicket = :priceTicket, 
                    moviePoster = :moviePoster,
                    date = :date,
                    idroom = :idroom,
                    quantityTickets = :quantityTickets
                   
                WHERE idMovie= :idMovie'
            );
            $query->execute([
                'idMovie' => $id,
                'movieName' => $movie->getmovieName(),
                'priceTicket' => $movie->getpriceTicket(),
                'moviePoster' => $movie->getmoviePoster(),
                'date' => $movie->getdate(),
                'idroom' => $movie->getidroom(),
                'quantityTickets' => $movie->getquantityTickets()

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
*/

    public function listSnack()
    {
        $sql = "SELECT * FROM snack";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

/*
    public function listLineP()
    {
        $sql = "SELECT * FROM line_of_product ";
        $db = config::getConnexion();
        try {
            $lista = $db->query($sql);
            return $lista;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

*/

    function showsnack($id)
    {
        $sql = "SELECT * from snack where idSnack = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $client = $query->fetch();
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function showUser($id)
    {
        $sql = "SELECT * from user where idUSer = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $product = $query->fetch();
            return $product;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
