<?php
    // Connect to DB here
    $dbc = mysqli_connect('localhost', 'getboocs_main', 'osvPHM7NGg', 'janneta');
    mysqli_set_charset($dbc, 'utf8mb4');
    $ward = mysqli_real_escape_string($dbc, $_GET['ward']); // Sanitize this
    $language = $_GET['lang'];
    if($language == "") {
        $language = "en";
    }
    $english_wards = array("A", "B", "C", "D", "E", "F – North", "F – South", "G – North", "G – South", "H – East", "H – West", "K – East", "K – West", "L", "M – East", "M – West", "N", "P – North", "P – South", "R – North", "R – Central", "R – South", "S", "T");
    $hindi_marathi_wards = array("ए", "बी", "सी", "डी", "इ", "एफ - उत्तर", "एफ - दक्षिण", "जी - उत्तर", "जी - दक्षिण", "एच - ईस्ट", "एच - वेस्ट", "के - पूर्व", "के - पश्चिम ", "एल", "एम - पूर्व", "एम - पश्चिम ", "एन", "पी - उत्तर", "पी - दक्षिण", "आर - उत्तर", "आर - सेंट्रल", "आर - दक्षिण", "एस", "टी");
    if($language == "en" && in_array($ward, $hindi_marathi_wards)) {
        $position = array_search($ward, $hindi_marathi_wards);
        $ward = $english_wards[$position];
    }
    if(($language == "hn" || $language == "mr") && in_array($ward, $english_wards)) {
        $position = array_search($ward, $english_wards);
        $ward = $hindi_marathi_wards[$position];
    }
    if($language == "en") {
        $query = "SELECT * FROM mumbai_wards WHERE ward = '" . $ward . "'";
    }
    if($language == "mr") {
        $query = "SELECT * FROM mumbai_wards_marathi WHERE ward = '" . $ward . "'";
    }
    if($language == "hn") {
        $query = "SELECT * FROM mumbai_wards_hindi WHERE ward = '" . $ward . "'";
    }
    $rquery = mysqli_query($dbc, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="../images/icon.png">
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
    <?php
    if($language == "en") {
        ?>
        <img src="../images/logo.png" id="logo" />
        <?php
    }
    ?>
    <?php
    if($language == "mr" || $language == "hn") {
        ?>
        <img src="../images/logomrhn.png" id="logo" />
        <?php
    }
    ?>
    <?php
    if($language == "en") {
        ?>
        <h1>Here are the Netas for <?php echo $ward; ?> Ward</h1>
        <?php
    }
    ?>
    <?php
    if($language == "mr") {
        ?>
        <h1><?php echo $ward; ?> वार्ड चे नेता</h1>
        <?php
    }
    ?>
    <?php
    if($language == "hn") {
        ?>
        <h1><?php echo $ward; ?> वार्ड के नेता</h1>
        <?php
    }
    ?>
    <table id="prabhagTable">
        <?php
        $item = 0;
        $buttonTitle = "That's my Neta!";
        $constituencyTitle = "Constituency";
        if($language == "mr") {
            $buttonTitle = "हाच माझा नेता!";
        }
        if($language == "hn") {
            $buttonTitle = "यही है मेरा नेता!";
        }
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
                    <b><span id="prabhagName"><?php echo $constituencyTitle; ?> <?php echo $prabhag_number; ?></span></b><br><br>
                    <b><?php echo $name; ?></b><br><br>
                    <b>Area:</b> <?php echo $area; ?><br>
                    <b>Phone:</b> <?php echo $phone; ?>
                </span>
                <a id="sampleCallText" href="../samplecall/?lang=<?php echo $language; ?>&ward=<?php echo $ward; ?>&prabhag=<?php echo $prabhag_number; ?>"><?php echo $buttonTitle; ?></a>
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

