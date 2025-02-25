<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <h1 class="text-primary text-center">Hotel</h1>

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

  // Inizio della tabella
  echo '<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Descrizione</th>
      <th scope="col">Parcheggio</th>
      <th scope="col">Voto</th>
      <th scope="col">Distanza dal centro (km)</th>
    </tr>
  </thead>
  <tbody>';

  // Iterazione attraverso gli hotel per generare le righe della tabella
  foreach ($hotels as $hotel) {
    // Verifica se la checkbox è selezionata
    if (isset($_GET['boolean']) && $_GET['boolean'] == 'on' && !$hotel['parking']) {
      continue; // Salta gli hotel senza parcheggio se il filtro è attivo
    }

    if (isset($_GET['number']) && $_GET['number'] > $hotel['vote']) {
      continue;
    }

    echo '<tr>
      <td>' . htmlspecialchars($hotel['name']) . '</td>
      <td>' . htmlspecialchars($hotel['description']) . '</td>
      <td>' . ($hotel['parking'] ? 'Sì' : 'No') . '</td>
      <td>' . htmlspecialchars($hotel['vote']) . '</td>
      <td>' . htmlspecialchars($hotel['distance_to_center']) . '</td>
    </tr>';
  }

  // Fine della tabella
  echo '</tbody>
  </table>';

  // Form
  echo '
  <form>
    <label> Vuoi il parcheggio?  
      <input type="checkbox" id="boolean" name="boolean" ' . (isset($_GET['boolean']) ? 'checked' : '') . ' />
    </label>

    <label for= "number"> Inserisci il voto minimo
      <input type = "number" id = "number" name= "number" min = 1 max= 5 />
    </label>

    <button type="submit"> Cerca </button>
  </form>';
  ?>

</body>

</html>