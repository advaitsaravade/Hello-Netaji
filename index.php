<?php
$language = $_GET['lang'];
if($language == "") {
    $language = "en";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="images/icon.png">
    <?php
    if($language == "en") {
        ?>
        <title>Hello Netaji - Find Your Ward Representative</title>
        <?php
    }
    ?>
    <?php
    if($language == "mr") {
        ?>
        <title>नमस्कार नेताजी - तुमचा प्रभाग प्रतिनिधी शोधा</title>
        <?php
    }
    ?>
    <?php
    if($language == "hn") {
        ?>
        <title>नमस्कार नेताजी - अपने वार्ड प्रतिनिधि का पता लगाएं</title>
        <?php
    }
    ?>
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
    <?php
    if($language == "en") {
        ?>
        <img src="images/logo.png" id="logo" />
        <?php
    }
    ?>
    <?php
    if($language == "mr" || $language == "hn") {
        ?>
        <img src="images/logomrhn.png" id="logo" />
        <?php
    }
    ?>
    <table id="introductoryTable">
        <tr>
            <td>
                <?php
                if($language == "en") {
                    ?>
                    <p>How can you help the fight against COVID19 while sitting at home?<br><br>
                        Call your corporator.<br><br>
                        As we enter the first week of a 21 day lockdown, Mumbaikars need to come together to hold
                        our elected officials accountable.<br><br>
                        We know that MPs are donating salaries, MLAs are holding meetings - but what are our
                        corporators doing? Why don’t we ask them directly?<br><br>
                        Use this map to find your ward, choose your corporator from the list given, and then use our
                        sample call to see if your local neta has a plan to fight back against COVID19.<br><br>
                        Because accountability begins at home.
                    </p>
                    <?php
                }
                if($language == "mr") {
                    ?>
                    <p>आपण घरी बसून COVID19 विरूद्ध लढ्यात कशी मदत करू शकता?<br><br>
                        आपल्या कॉर्पोरेटरला फोन करा.<br><br>
                        २१ दिवसाचा लॉकडाऊन सुरु आहे. कोरोना महामारी विरुद्ध सगळ्यांनीच एकत्र येण्याची गरज आहे.
                        आणि ह्या परिस्थितीत आपल्या स्थानिक नेत्यांनी एकजूट होऊन काम करण्याची तर् महत्त्वाची गरज
                        आहे.<br><br>
                        आपल्याला माहिती आहे कि काही खासदारांनी पगार दान केले आहेत, आमदारांनी खाण्याचे पॅकेट
                        वाटणे सुरु केले आहेत. पण आपले नगरसेवक काय करत आहेत? त्यांनाच विचारून पहा!<br><br>
                        हा नकाशा पाहून वार्ड सिलेक्ट करा, दिलेल्या यादी मधून आपला नगरसेवक निवडा, आणि मग त्यांना
                        फोन करून त्यांचा कोरोना महामारीविरुद्ध लढण्यासाठी साठी त्यांचा “प्लॅन” जाणून घ्या!<br><br>
                        कारण जबाबदारीची सुरुवात घरातून होते.
                    </p>
                <?php
                }
                if($language == "hn") {
                    ?>
                    <p>आप घर बैठे COVID19 से लड़ने में कैसे मदद कर सकते हैं?<br><br>
                        अपने नगरसेवक को फोन लगाकर।<br><br>
                        २१ दिन का लॉकडाऊन जारी है। कोरोना महामारी के खिलाफ सभी को एक साथ आने की जरूरत है।
                        और इस स्थिति में, हमारे स्थानीय नेताओं को एक साथ काम करने की तत्काल आवश्यकता है।<br><br>
                        हम जानते हैं कि कुछ सांसदों ने वेतन दान किया है, विधायकों ने भोजन के पैकेट बाँटना शुरू कर दिया
                        है। लेकिन आप कॉर्पोरेटर क्या कर रहे हैं? बस उनसे पूछो!<br><br>
                        इस नक्शे को देखें, वार्ड को चुने, लिस्ट से अपने कॉर्पोरेटर को पहचाने, और फिर कोरोना महामारी से
                        लड़ने के लिए उनकी योजन जानने के लिए उन्हें कॉल करें!<br><br>
                        क्योंकि जिम्मेदारी की शुरुवात होती है घर से।
                    </p>
                    <?php
                }
                ?>
            </td>
        </tr>
    </table>
    <table id="wardFinderTable">
        <tr>
            <td>
                <?php
                if($language == "en") {
                    ?>
                    <h3>What's your ward?</h3>
                    <?php
                }
                if($language == "mr") {
                    ?>
                    <h3>तुमचा वार्ड कोणता?</h3>
                    <?php
                }
                if($language == "hn") {
                    ?>
                    <h3>आपका वार्ड</h3>
                    <?php
                }
                ?>
                <form method="GET" action="representatives/">
                    <input type="hidden" name="lang" value="<?php echo $language; ?>" />
                    <select name="ward" id="ward">
                        <?php
                        if($language == "en") {
                            ?>
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
                        <?php
                        }
                        if($language == "mr") {
                            ?>
                            <option value="ए">ए वार्ड</option>
                            <option value="बी">बी वार्ड</option>
                            <option value="सी">सी वार्ड</option>
                            <option value="डी">डी वार्ड</option>
                            <option value="इ">इ वार्ड</option>
                            <option value="एफ - उत्तर">एफ - उत्तर वार्ड</option>
                            <option value="एफ - दक्षिण">एफ - दक्षिण वार्ड</option>
                            <option value="जी - उत्तर">जी - उत्तर वार्ड</option>
                            <option value="जी - दक्षिण">जी - दक्षिण वार्ड</option>
                            <option value="एच - ईस्ट">एच - ईस्ट वार्ड</option>
                            <option value="एच - वेस्ट">एच - वेस्ट वार्ड</option>
                            <option value="के - पूर्व">के - पूर्व वार्ड</option>
                            <option value="के - पश्चिम ">के - पश्चिम वार्ड</option>
                            <option value="एल">एल वार्ड</option>
                            <option value="एम - पूर्व">एम - पूर्व वार्ड</option>
                            <option value="एम - पश्चिम ">एम - पश्चिम वार्ड</option>
                            <option value="एन">एन वार्ड</option>
                            <option value="पी - उत्तर">पी - उत्तर वार्ड</option>
                            <option value="पी - दक्षिण">पी - दक्षिण वार्ड</option>
                            <option value="आर - उत्तर">आर - उत्तर वार्ड</option>
                            <option value="आर - सेंट्रल">आर - सेंट्रल वार्ड</option>
                            <option value="आर - दक्षिण">आर - दक्षिण वार्ड</option>
                            <option value="एस">एस वार्ड</option>
                            <option value="टी">टी वार्ड</option>
                            <?php
                        }
                        if($language == "hn") {
                            ?>
                            <option value="ए">ए वार्ड</option>
                            <option value="बी">बी वार्ड</option>
                            <option value="सी">सी वार्ड</option>
                            <option value="डी">डी वार्ड</option>
                            <option value="इ">इ वार्ड</option>
                            <option value="एफ - उत्तर">एफ - उत्तर वार्ड</option>
                            <option value="एफ - दक्षिण">एफ - दक्षिण वार्ड</option>
                            <option value="जी - उत्तर">जी - उत्तर वार्ड</option>
                            <option value="जी - दक्षिण">जी - दक्षिण वार्ड</option>
                            <option value="एच - ईस्ट">एच - ईस्ट वार्ड</option>
                            <option value="एच - वेस्ट">एच - वेस्ट वार्ड</option>
                            <option value="के - पूर्व">के - पूर्व वार्ड</option>
                            <option value="के - पश्चिम ">के - पश्चिम वार्ड</option>
                            <option value="एल">एल वार्ड</option>
                            <option value="एम - पूर्व">एम - पूर्व वार्ड</option>
                            <option value="एम - पश्चिम ">एम - पश्चिम वार्ड</option>
                            <option value="एन">एन वार्ड</option>
                            <option value="पी - उत्तर">पी - उत्तर वार्ड</option>
                            <option value="पी - दक्षिण">पी - दक्षिण वार्ड</option>
                            <option value="आर - उत्तर">आर - उत्तर वार्ड</option>
                            <option value="आर - सेंट्रल">आर - सेंट्रल वार्ड</option>
                            <option value="आर - दक्षिण">आर - दक्षिण वार्ड</option>
                            <option value="एस">एस वार्ड</option>
                            <option value="टी">टी वार्ड</option>
                            <?php
                        }
                        ?>
                    </select>
                    <?php
                    if($language == "en") {
                        ?>
                        <button type="submit">Find My Neta</button>
                        <?php
                    }
                    if($language == "mr") {
                        ?>
                        <button type="submit">माझा नेता शोधा</button>
                        <?php
                    }
                    if($language == "hn") {
                        ?>
                        <button type="submit">मेरा नेता ढूंढो</button>
                        <?php
                    }
                    ?>
                </form>
            </td>
            <td>
                <img src="images/wardmap.jpg"
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
