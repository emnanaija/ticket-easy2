<?php
//include 'C:\xamppp\htdocs\rania panier\back\config.php';
include '../model/movie.php';
include '../model/LineOfOrder.php';
include '../controller/LineOfSnackC.php';


class MovieC
{
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
    function deleteMovie($id)
    {
        $sql = "DELETE FROM movie WHERE idMovie = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function ajouterMovie($Movie)
    {
        $sql = "INSERT INTO movie  
        VALUES (NULL, :movieName,:priceTicket, :moviePoster, :dateMovie, :idroom, :quantityTickets, :descriptionMovie, :trailer, :duration, :dateR, :rate)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'movieName' => $Movie->getmovieName(),
                'priceTicket' => $Movie->getpriceTicket(),
                'moviePoster' => $Movie->getmoviePoster(),
                'dateMovie' => $Movie->getdateMovie()->format('Y/m/d'),
                'idroom' => $Movie->getidroom(),
                'quantityTickets' => $Movie->getquantityTickets(),
                'descriptionMovie' => $Movie->getdescriptionMovie(),
                'trailer' => $Movie->gettrailer(),
                'duration' => $Movie->getduration(),
                'dateR' => $Movie->getdateR(),
                'rate' => $Movie->getrate()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateMovie($Movie, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE movie SET 
                    movieName = :movieName, 
                    priceTicket = :priceTicket, 
                    moviePoster = :moviePoster,
                    dateMovie = :dateMovie,
                    idroom = :idroom,
                    quantityTickets = :quantityTickets,
                    descriptionMovie = :descriptionMovie,
                    trailer = :trailer,
                    duration = :duration,
                    dateR =:dateR,
                    rate = :rate    
                WHERE idMovie= :idMovie'
            );
            $query->execute([
                'idMovie' => $id,
                'movieName' => $Movie->getmovieName(),
                'priceTicket' => $Movie->getpriceTicket(),
                'moviePoster' => $Movie->getmoviePoster(),
                'dateMovie' => $Movie->getdateMovie()->format('Y/m/d'),
                'idroom' => $Movie->getidroom(),
                'quantityTickets' => $Movie->getquantityTickets(),
                'descriptionMovie' => $Movie->getdescriptionMovie(),
                'trailer' => $Movie->gettrailer(),
                'duration' => $Movie->getduration(),
                'dateR' => $Movie->getdateR(),
                'rate' => $Movie->getrate()
                
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showMovie($id)
    {
        $sql = "SELECT * from movie where idMovie = $id";
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

    public function listLineP()
    {
        $sql = "SELECT * FROM line_of_snack ";
        $db = config::getConnexion();
        try {
            $lista = $db->query($sql);
            return $lista;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

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


   

}