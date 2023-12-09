
<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}


include 'components/save_send.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Reality Tour</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        body {
            font-family: sans-serif;
        }
        h1{
            text-align: center;
            padding: 10px;
        }

        #vr-tour {
            width: 100%;
            height: 500px;
            background-color: #ccc;
        }
    </style>
</head>
<body>
<?php include 'components/user_header.php'; ?>
    <header>
        <h1>Virtual Reality Tour</h1>
    </header>

    <div id="vr-tour">
    <iframe width="100%" height="640" style="width: 100%; height: 640px; border: none; max-width: 100%;" allow="xr-spatial-tracking; vr; gyroscope; accelerometer; fullscreen; autoplay; xr" scrolling="no" allowfullscreen="true"  frameborder="0" src="https://webobook.com/public/65684a12a5c097313c1e3e72,en?ap=true&si=true&sm=false&sp=true&sfr=false&sl=false&sop=false&" allowvr="yes" ></iframe>


        <?php $property_url = $_GET['url'];?>
        <iframe width="100%" height="640" style="width: 100%; height: 640px; border: none; max-width: 100%;" allow="xr-spatial-tracking; vr; gyroscope; accelerometer; fullscreen; autoplay; xr" scrolling="no" allowfullscreen="true"  frameborder="0" src="<?php $property_url ?>" allowvr="yes" ></iframe>
    </div>
</body>
</html>
