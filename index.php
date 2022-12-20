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

      <h1 class="text-center">Hotels</h1>

      <table class="table table-dark text-center">
         <thead>
            <tr>
               <th>Name</th>
               <th>Description</th>
               <th>Parking</th>
               <th>Vote</th>
               <th>Distance to center</th>
            </tr>
         </thead>
         <tbody>
            <?php
            foreach ($hotels as $hotel) {
            ?>
               <tr>
                  <td><?php echo $hotel['name'] ?></td>
                  <td><?php echo $hotel['description'] ?></td>
                  <td><?php echo $hotel['parking'] ?></td>
                  <td><?php echo $hotel['vote'] ?></td>
                  <td><?php echo $hotel['distance_to_center'] ?></td>
               </tr>

            <?php
            }
            ?>
         </tbody>
      </table>
   </main>
</body>

</html>