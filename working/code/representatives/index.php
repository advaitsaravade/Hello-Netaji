<?php
    // Connect to DB here
    $dbc = mysqli_connect('localhost', 'getboocs_main', 'osvPHM7NGg', 'janneta');
    mysqli_set_charset($dbc, 'utf8mb4');
    $ward = mysqli_real_escape_string($dbc, $_GET['ward']); // Sanitize this
    $query = "SELECT * FROM mumbai_wards WHERE ward = '".$ward."'";
    $rquery = mysqli_query($dbc, $query);
    $language = $_GET['lang'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/logo.png">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../index.css">
</head>
<body>
<div id="languageTableHolder">
    <table id="languageTable">
        <tr>
            <td>
                <a href="?ward=<?php echo $ward; ?>&lang=en">English</a>
            </td>
            <td>
                <a href="?ward=<?php echo $ward; ?>&lang=mr">मराठी</a>
            </td>
            <td>
                <a href="?ward=<?php echo $ward; ?>&lang=hn">हिन्दी</a>
            </td>
        </tr>
    </table>
</div>
<div id="main">
    <h1>Hello Netaji</h1>
    <table id="introductoryTable">
        <tr>
            <td>
                <p>This tool can help you find your ward's representative during COVID-19. We are currently supporting only Mumbai city.<br><br>
                    To get started, simply find your ward in the adjacent map and select it in the dropdown menu.<br><br>
                    You will be presented with your ward's prabhags and respective councilors' contact information and what to say on a call to request their assistance with COVID-19.</p>
            </td>
            <td>
                <img src="../../images/personwithphone.png" id="heroimage">
            </td>
        </tr>
    </table>
    <br>
    <h1><?php echo $ward; ?> Ward</h1>
    <table id="prabhagTable">
        <?php
        $item = 0;
        while($rquery && $fetchedrow = mysqli_fetch_assoc($rquery))
        {
            if($item % 3 == 0) {
                echo "<tr>";
            }
            $prabhag_number = $fetchedrow['prabhag'];
            $area = $fetchedrow['constituency_area'];
            $name = $fetchedrow['councillor_name'];
            $phone = $fetchedrow['contact'];
            ?>
            <td>
                <span id="prabhagInformation">
                    <b>Prabhag <?php echo $prabhag_number; ?></b><br><br>
                    <b>Area:</b> <?php echo $area; ?><br>
                    <b>Name:</b> <?php echo $name; ?><br><br>
                    <b>Phone:</b> <?php echo $phone; ?>
                </span>
                <a id="sampleCallText" href="../samplecall/?ward=<?php echo $ward; ?>&prabhag=<?php echo $prabhag_number; ?>">What to ask on a call?</a>
            </td>
            <?php
            if(($item + 1) % 3 == 0) {
                echo "</tr>";
            }
            $item++;
        }
        ?>
    </table>
    <div id="divider"></div>
    <div id="footer">
        <h4></h4>
        <span id="footerText">This site is licensed under the Commons Creative Attribution 3.0</span>
    </div>
</div>
</body>
</html>

