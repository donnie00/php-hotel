<?php

$hotels = [

   [
      'name' => 'Hotel Belvedere',
      'description' => 'Hotel Belvedere Descrizione',
      'parking' => true,
      'vote' => 4,
      'distance_to_center' => 10.4
   ],
   [
      'name' => 'Hotel Futuro',
      'description' => 'Hotel Futuro Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 2
   ],
   [
      'name' => 'Hotel Rivamare',
      'description' => 'Hotel Rivamare Descrizione',
      'parking' => false,
      'vote' => 1,
      'distance_to_center' => 1
   ],
   [
      'name' => 'Hotel Bellavista',
      'description' => 'Hotel Bellavista Descrizione',
      'parking' => false,
      'vote' => 5,
      'distance_to_center' => 5.5
   ],
   [
      'name' => 'Hotel Milano',
      'description' => 'Hotel Milano Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 50
   ],

];

$filteredHotels = [];

$name = $_GET['name'];
$vote = $_GET['vote'];
$parking = $_GET['parking'];
$distance = $_GET['distance'];


if (isset($parking) || isset($vote) || isset($name) || isset($distance)) {

   foreach ($hotels as $hotel) {

      $toPush = true;


      if (isset($vote) && strval($hotel['vote']) < strval($vote)) {
         $toPush = false;
      };

      if (isset($parking) && !str_contains(strval($hotel['parking']), $parking)) {
         $toPush = false;
      };

      if (isset($name) && !str_contains(strtolower($hotel['name']), strtolower($name))) {
         $toPush = false;
      };

      if (isset($distance) && strval($hotel['distance_to_center']) >= $distance) {
         $toPush = false;
      };

      if ($toPush) {
         $filteredHotels[] = $hotel;
      }
   }
} else {
   $filteredHotels = $hotels;
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PHP Hotels</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

</head>

<body class="text-bg-dark">
   <main class="container">

      <h1 class="text-center mt-3">Hotels</h1>

      <form class="input-group my-4" method="GET">

         <input class="form-control" type="text" name="name" value="<?php echo $name ?? '' ?>" placeholder="Name">

         <input class="form-control" type="number" name="vote" value="<?php echo $vote ?? '' ?>" min="1" max="5" placeholder="Vote (min)">

         <select class="form-select" name="distance">
            <option selected disabled>Distance to center</option>
            <option value="5">
               < 5 km</option>
            <option value="10">max 10 km</option>
            <option value="inf">10 km ></option>
         </select>

         <div class="input-group-text">
            <input class="form-check-input mt-0" type="checkbox" value="1" name="parking">
            <label class="form-check-label mx-3" for="parking">Park</label>
         </div>

         <button class="btn btn-primary" type="submit">Search</button>
         <button class="btn btn-secondary" type="reset">Clear</button>

      </form>

      <table class="table table-info table-striped">
         <thead>
            <tr class="fs-5">
               <th>Name</th>
               <th>Description</th>
               <th class="text-center">Parking</th>
               <th class="text-center">Vote</th>
               <th class="text-center">Distance to center</th>
            </tr>
         </thead>
         <tbody>
            <?php
            foreach ($filteredHotels as $hotel) {
            ?>
               <tr>
                  <td><?php echo $hotel['name'] ?></td>
                  <td><?php echo $hotel['description'] ?></td>
                  <td class="text-center"><?php echo ($hotel['parking'] ? '&check;' : '&cross;') ?></td>
                  <td class="text-center"><?php echo $hotel['vote'] ?></td>
                  <td class="text-center"><?php echo "{$hotel['distance_to_center']} km" ?></td>
               </tr>

            <?php
            }
            ?>
         </tbody>
      </table>
   </main>
</body>

</html>