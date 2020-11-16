<?php
$language = $_GET['lang'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/logo.png">
    <title>Hello Netaji - Find Your Ward Representative</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div id="languageTableHolder">
    <table id="languageTable">
        <tr>
            <td>
                <a href="?lang=en">English</a>
            </td>
            <td>
                <a href="?lang=mr">मराठी</a>
            </td>
            <td>
                <a href="?lang=hn">हिन्दी</a>
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
                <img src="../images/personwithphone.png" id="heroimage">
            </td>
        </tr>
    </table>
    <table id="wardFinderTable">
        <tr>
            <td>
                <h3>What's your ward code?</h3>
                <form method="GET" action="representatives/">
                    <select name="ward" id="ward">
                        <option value="A">A Ward</option>
                        <option value="B">B Ward</option>
                        <option value="C">C Ward</option>
                        <option value="D">D Ward</option>
                        <option value="E">E Ward</option>
                        <option value="F – South">F - South Ward</option>
                        <option value="F – North">F - North Ward</option>
                        <option value="G – South">G - South Ward</option>
                        <option value="G – North">G - North Ward</option>
                        <option value="H – West">H West Ward</option>
                        <option value="H – East">H East Ward</option>
                        <option value="K – West">K West Ward</option>
                        <option value="K – East">K East Ward</option>
                        <option value="L">L Ward</option>
                        <option value="M – West">M West Ward</option>
                        <option value="M – East">M East Ward</option>
                        <option value="N">N Ward</option>
                        <option value="P – South">P South Ward</option>
                        <option value="P – North">P North Ward</option>
                        <option value="R – South">R South Ward</option>
                        <option value="R – Central">R Central Ward</option>
                        <option value="R – North">R North Ward</option>
                        <option value="S">S Ward</option>
                        <option value="T">T Ward</option>
                    </select>
                    <button type="submit">Find My Representative</button>
                </form>
            </td>
            <td>
                <img src="../images/wardmap.jpg"
                     id="mumbai_wards_map" />
            </td>
        </tr>
    </table>
    <div id="divider"></div>
    <div id="footer">
        <h4></h4>
        <span id="footerText">This site is licensed under the Commons Creative Attribution 3.0</span>
    </div>
</div>
</body>
</html>
