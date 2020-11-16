<?php
    // Connect to DB here
    $dbc = mysqli_connect('localhost', 'getboocs_main', 'osvPHM7NGg', 'janneta');
    mysqli_set_charset($dbc, 'utf8mb4');
    $ward = mysqli_real_escape_string($dbc, $_GET['ward']); // Sanitize this
    $prabhag = mysqli_real_escape_string($dbc, $_GET['prabhag']); // Sanitize this
    $query = "SELECT * FROM mumbai_wards WHERE ward = '".$ward."' ";
    $rquery = mysqli_query($dbc, $query);
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
        $query = "SELECT * FROM mumbai_wards WHERE ward = '" . $ward . "' AND prabhag = '".$prabhag."' LIMIT 1";
    }
    if($language == "mr") {
        $query = "SELECT * FROM mumbai_wards_marathi WHERE ward = '" . $ward . "' AND prabhag = '".$prabhag."' LIMIT 1";
    }
    if($language == "hn") {
        $query = "SELECT * FROM mumbai_wards_hindi WHERE ward = '" . $ward . "' AND prabhag = '".$prabhag."' LIMIT 1";
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
                <a href="?ward=<?php echo $ward; ?>&prabhag=<?php echo $prabhag; ?>&lang=en">English</a>
            </td>
            <td>
                <a href="?ward=<?php echo $ward; ?>&prabhag=<?php echo $prabhag; ?>&lang=mr">मराठी</a>
            </td>
            <td>
                <a href="?ward=<?php echo $ward; ?>&prabhag=<?php echo $prabhag; ?>&lang=hn">हिन्दी</a>
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
    <br>
    <p id="prabhagInformation">
        <?php
        $item = 0;
        $name = "< name of representative >";
        if($rquery && $fetchedrow = mysqli_fetch_assoc($rquery))
        {
            $area = $fetchedrow['constituency_area'];
            $name = $fetchedrow['councillor_name'];
            $phone = $fetchedrow['contact'];
            ?>
                <b>Area:</b> <?php echo $area; ?><br>
                <b>Name:</b> <?php echo $name; ?><br><br>
                <b>Phone:</b> <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                <br><br>
            <a href="https://forms.gle/dEwM5HsfEjWdWneF9" id="button">Wrong number? Let us know!</a>
            <?php
        }
        ?>
    </p>
    <p id="sampleCallTextFull">
        <?php
        if($language == "mr") {
            ?>
            हॅलो <b><?php echo $name; ?></b> जी!<br>
            <br>
            माझं नाव … आहे आणि मी आपल्या मतदार संघात रहिवासी आहे. आपल्याला माहिती आहेच की कोविड १९ लॉकडाऊनमुळे बर्‍याच लोकांना धक्का बसला आहे. कोरोनाव्हायरस विरूद्ध लढ्यात आपण कोणती पावले उचलत आहात हे मला जाणून घ्यायचे होते.<br>
            <br>
            <span id="list">
                <b>1. पैसे:</b> आपल्या क्षेत्रात किती कुटुंबांना शासकीय मदतीची गरज आहे? आपण ज्येष्ठ नागरिक, बेघर लोक आणि अपंग लोकांना समर्थन देत आहात का? आणि हातावर पोट असणाऱ्यांचे काय?<br>
                <b>2. अन्न:</b> आपण आपल्या भागातील गरीब लोकांना अन्न पॅकेट देऊ शकता का?<br>
                <b>3. आरोग्य:</b> आरोग्य आणि स्वच्छता सुनिश्चित करण्यासाठी आपण काय पाऊल उठवले आहेत?<br>
                <b>4. सुरक्षितता:</b> रेशन खरेदी करण्याचा प्रयत्न करीत असताना पोलिसांकडून लोकांना अडवले जात असल्याचे आपण ऐकले आहे. हे तुम्ही कसे थांबवाल?<br>
                <b>5. आधारः</b> आपल्या मतदारसंघात तुम्हाला व्हॉलेंटियर्स ची गरज आहे का? आम्ही तुम्हाला कशी मदत करू शकतो?<br>
            </span>
            <br>
            मदत करण्याचे मार्ग:<br>
            <br>
            <span id="list">
                <b>1. कनेक्ट करा:</b> आपल्या नगरसेवकांना NGO किंवा मदत करणाऱ्या संस्थांशी जोडा.<br>
                <b>2. कलेक्ट करा:</b> आपल्या क्षेत्रातील गरजू कुटुंबांना खाद्यान्न देण्यासाठी पैशे गोळा करा.<br>
                <b>3. टीका करा:</b> जर तुमच्या नगरसेवकाकडे गरजूंची काळजी घेण्यासाठी योजना नसेल, तर इतरांना गोळा करून त्यांना फोन करा आणि त्यांच्यावर त्वरित ऍक्शन घेण्यासाठी दबाव लावा.<br>
            </span>
            <br>
            खूप खूप धन्यवाद! कोणतीही मदत लागली, तर मला फोन जरूर करा!
            <br>
            <br>
            <a href="https://forms.gle/nsGkXVf4BXtAi9Zo6" id="button">नेता काय म्हणाला? आम्हाला सांगा</a>
            <?php
        } elseif($language == "hn") {
            ?>
            हॅलो <b><?php echo $name; ?></b> हाँ!<br>
            <br>
            मेरा नाम … है और मैं आपके BMC क्षेत्र का निवासी हूं। जैसा कि आप जानते हैं, कोविड-19 लॉकडाउन की वजह से कई लोगों को बुरा झटका पड़ा है। मैं जानना चाहता था कि कोरोनोवायरस के खिलाफ लड़ाई में आप क्या कदम उठा रहे हैं।
            <br>
            <br>
            <span id="list">
                <b>1. पैसा:</b> आपके क्षेत्र में कितने परिवारों को सरकारी सहायता की आवश्यकता है? क्या आप वरिष्ठ नागरिकों, मज़दूरों, बेघर लोगों और विकलांग लोगों की मदद कर रहे हैं?<br>
                <b>2. भोजन:</b> क्या आप अपने क्षेत्र में ग़रीबों को भोजन के पैकेट दे सकते हैं?<br>
                <b>3. स्वास्थ्य:</b> स्वास्थ्य और स्वच्छता सुनिश्चित करने के लिए आपने क्या कदम उठाए हैं?<br>
                <b>4. सुरक्षा:</b> राशन खरीदने वालों को  को पुलिस द्वारा रोका जा रहा है। आप इसे कैसे रोकेंगे?<br>
                <b>5. समर्थन:</b> क्या आपको वालंटियर्स की आवश्यकता है? हम आपकी कैसे मदद कर सकते हैं?<br>
            </span>
            <br><br>
            मदद करने के तरीके:
            <br>
            <br>
            <span id="list">
                <b>1. कनेक्ट कीजिए:</b> अपने कॉरपोरेटर को NGO या सहायता संगठनों से जोड़ें।<br>
                <b>2. कलेक्ट लीजिए:</b> अपने क्षेत्र में ज़रूरतमंद परिवारों को धान्य दिलाने के लिए धन इकट्ठा करें।<br>
                <b>3. जवाब मांगिये:</b> यदि आपके कॉर्पोरेटर के पास ज़रूरतमंदों की देखभाल करने की योजना नहीं है, तो दूसरों को इकट्ठा करें और उन्हें फोन करें और उन पर तत्काल मदद करने के लिए दबाव डालें।<br>
            </span>
            <br>
            <br>
            बहुत बहुत धन्यवाद! यदि आपको कोई मदद लगे, तो कृपया मुझे कॉल करें!
            <br>
            <br>
            <a href="https://forms.gle/nsGkXVf4BXtAi9Zo6" id="button">नेताजी क्या बोलें? हमें बताएं!</a>
            <?php
        } else {
            ?>
            Hello <b><?php echo $name; ?></b> ji,<br>
            <br>
            My name is (XYZ) and I am a resident of your constituency. As you know, the COVID19 lock down has made life incredibly difficult for many sections of society. I wanted to know what steps you are taking in the fight against novel coronavirus.
            <br>
            <br>
            <span id="list">
                <b>1. Money:</b> How many families need government support in our area? Are you supporting daily wage workers, senior citizens, homeless people and people with disabilities?<br>
                <b>2. Food:</b> Will you give food packets to poor people in our area?<br>
                <b>3. Health:</b> What measures are you taking to ensure health and sanitation?<br>
                <b>4. Safety:</b> We have heard that people are being stopped by the police while trying to buy ration. How are you ensuring safety for people seeking essential services in our area?<br>
                <b>5. Support:</b> Do you need volunteers from our constituency? How can I help you?<br>
            </span>
            <br><br>
            Ways You Can Help:
            <br>
            <br>
            <span id="list">
                <b>1. Connect:</b> Connect your corporator to NGOs or companies carrying out relief work.<br>
                <b>2. Collect:</b> Create a small fundraiser to give food supplies to needy families in your area.<br>
                <b>3. Criticise:</b> If your corporator does not have a plan, get others from your area to call them and put pressure on them to act immediately.<br>
            </span>
            <br>
            <br>
            Thank you very much! Please let me know if I can help in any way possible. I hope that you will not let our area down.
            <br>
            <br>
            <a href="https://forms.gle/nsGkXVf4BXtAi9Zo6" id="button">Tell us what your Neta said!</a>
            <?php
        }
        ?>
    </p>
    <div id="divider"></div>
    <div id="footer">
        <h4></h4>
        <span id="footerText">This site is licensed under the Commons Creative Attribution 3.0</span>
    </div>
</div>
</body>
</html>


