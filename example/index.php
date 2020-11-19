<?php 
require_once 'config.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Example Payment</title>
  <link href="assets/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://unpkg.com/@globallypaid/js-sdk@latest"></script>
  <script>
      const gpg = new GloballyPaidSDK('<?php echo $config['PublishableApiKey'];?>');
      const cardForm = gpg.createForm('card-extended',
      {
        style: {
            base: {
                width: '560px',
                buttonColor: 'white',
                buttonBackground: '#558b2f',
                inputColor: '#558b2f',
                color: '#558b2f'
            }
        }
      });
  </script>
</head>
<body>
    <h1>GloballyPaid :: Example payment</h1>
    <div>
        <div class="responseContainer"></div>
        <div id="gpg-form-container"></div>
    </div>
    <script src="assets/demo.js"></script>
</body>
</html>
