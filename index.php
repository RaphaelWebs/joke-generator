<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Joke Generator - Raphael Duran</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <link rel="apple-touch-icon" sizes="180x180" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/favicon-16x16.png">
  <link rel="mask-icon" href="https://www.raphaelduran.com//wp-content/uploads/fbrfg/safari-pinned-tab.svg" color="#1f487e">
</head>

<body>
  <div class="wrapper">
    <span><lottie-player src="https://assets10.lottiefiles.com/packages/lf20_RfD6Lb.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player></span>
    <p id="joke"> <?php require_once 'inc/joke-api.php'; ?> </p>
    <div id="loading"></div>
    <button id="btn">Get Random Joke</button>
  </div>

  <script>
    $('#btn').click(function() {
      $.ajax({
        url: 'inc/joke-api.php',
        type: 'GET',
        success: function(response) {
          $('p#joke').html(response);
        },
        error: function() {
          $('p#joke').html('Error occurred while retrieving the joke.');
        }
      });
    });


    $(document).ajaxStart(function() {
      $('#loading').show(); // Show the loading animation when an AJAX request starts
    });

    $(document).ajaxStop(function() {
      $('#loading').hide(); // Hide the loading animation when all AJAX requests are complete
      $('#content').show(); // Show the content after the AJAX requests are complete
    });
  </script>
</body>

</html>