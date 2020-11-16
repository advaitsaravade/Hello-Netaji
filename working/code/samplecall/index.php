<?php
    // Connect to DB here
    $dbc = mysqli_connect('localhost', 'getboocs_main', 'osvPHM7NGg', 'janneta');
    mysqli_set_charset($dbc, 'utf8mb4');
    $ward = mysqli_real_escape_string($dbc, $_GET['ward']); // Sanitize this
    $prabhag = mysqli_real_escape_string($dbc, $_GET['prabhag']); // Sanitize this
    $query = "SELECT * FROM mumbai_wards WHERE ward = '".$ward."' AND prabhag = '".$prabhag."' LIMIT 1";
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
    <h1>Sample call for <?php echo $ward; ?> Ward, Prabhag <?php echo $prabhag; ?></h1>
    <p id="prabhagInformation">
        <?php
        $item = 0;
        $name = "<name of representative>";
        if($rquery && $fetchedrow = mysqli_fetch_assoc($rquery))
        {
            $area = $fetchedrow['constituency_area'];
            $name = $fetchedrow['councillor_name'];
            $phone = $fetchedrow['contact'];
            ?>
                <b>Area:</b> <?php echo $area; ?><br>
                <b>Name:</b> <?php echo $name; ?><br><br>
                <b>Phone:</b> <?php echo $phone; ?>
            <?php
            echo "</tr>";
        }
        ?>
    </p>
    <p id="sampleCallTextFull">
        <?php
        if($language == "mr") {
            ?>
            हॅलो (नगरसेवकांचे नाव) जी!<br>
            <br>
            माझं नाव … आहे आणि मी आपल्या मतदार संघात रहिवासी आहे. आपल्याला माहिती आहेच की कोविड १९ लॉकडाऊनमुळे बर्‍याच लोकांना धक्का बसला आहे. कोरोनाव्हायरस विरूद्ध लढ्यात आपण कोणती पावले उचलत आहात हे मला जाणून घ्यायचे होते.<br>
            <br>
            1. पैसे: आपल्या क्षेत्रात किती कुटुंबांना शासकीय मदतीची गरज आहे? आपण ज्येष्ठ नागरिक, बेघर लोक आणि अपंग लोकांना समर्थन देत आहात का? आणि हातावर पोट असणाऱ्यांचे काय?<br>
            2. अन्न: आपण आपल्या भागातील गरीब लोकांना अन्न पॅकेट देऊ शकता का?<br>
            3. आरोग्य: आरोग्य आणि स्वच्छता सुनिश्चित करण्यासाठी आपण काय पाऊल उठवले आहेत?<br>
            4. सुरक्षितता: रेशन खरेदी करण्याचा प्रयत्न करीत असताना पोलिसांकडून लोकांना अडवले जात असल्याचे आपण ऐकले आहे. हे तुम्ही कसे थांबवाल?<br>
            5. आधारः आपल्या मतदारसंघात तुम्हाला व्हॉलेंटियर्स ची गरज आहे का? आम्ही तुम्हाला कशी मदत करू शकतो?<br>
            <br>
            मदत करण्याचे मार्ग:<br>
            <br>
            1. कनेक्ट करा: आपल्या नगरसेवकांना NGO किंवा मदत करणाऱ्या संस्थांशी जोडा.<br>
            2. कलेक्ट करा: आपल्या क्षेत्रातील गरजू कुटुंबांना खाद्यान्न देण्यासाठी पैशे गोळा करा.<br>
            3. टीका करा: जर तुमच्या नगरसेवकाकडे गरजूंची काळजी घेण्यासाठी योजना नसेल, तर इतरांना गोळा करून त्यांना फोन करा आणि त्यांच्यावर त्वरित ऍक्शन घेण्यासाठी दबाव लावा.<br>
            <br>
            खूप खूप धन्यवाद! कोणतीही मदत लागली, तर मला फोन जरूर करा!<br>
            <?php
        } elseif($language == "hn") {
            ?>
            हॅलो (नगरसेवक का नाम) हाँ!<br>
            <br>
            मेरा नाम … है और मैं आपके BMC क्षेत्र का निवासी हूं। जैसा कि आप जानते हैं, कोविड-19 लॉकडाउन की वजह से कई लोगों को बुरा झटका पड़ा है। मैं जानना चाहता था कि कोरोनोवायरस के खिलाफ लड़ाई में आप क्या कदम उठा रहे हैं।<br>
            <br>
            1. पैसा: आपके क्षेत्र में कितने परिवारों को सरकारी सहायता की आवश्यकता है? क्या आप वरिष्ठ नागरिकों, मज़दूरों, बेघर लोगों और विकलांग लोगों की मदद कर रहे हैं?<br>
            2. भोजन: क्या आप अपने क्षेत्र में ग़रीबों को भोजन के पैकेट दे सकते हैं?<br>
            3. स्वास्थ्य: स्वास्थ्य और स्वच्छता सुनिश्चित करने के लिए आपने क्या कदम उठाए हैं?<br>
            4. सुरक्षा: राशन खरीदने वालों को  को पुलिस द्वारा रोका जा रहा है। आप इसे कैसे रोकेंगे?<br>
            5. समर्थन: क्या आपको वालंटियर्स की आवश्यकता है? हम आपकी कैसे मदद कर सकते हैं?<br>
            <br>
            मदद करने के तरीके:<br>
            1. कनेक्ट कीजिए: अपने कॉरपोरेटर को NGO या सहायता संगठनों से जोड़ें।<br>
            2. कलेक्ट लीजिए: अपने क्षेत्र में ज़रूरतमंद परिवारों को धान्य दिलाने के लिए धन इकट्ठा करें।<br>
            3. जवाब मांगिये: यदि आपके कॉर्पोरेटर के पास ज़रूरतमंदों की देखभाल करने की योजना नहीं है, तो दूसरों को इकट्ठा करें और उन्हें फोन करें और उन पर तत्काल मदद करने के लिए दबाव डालें।<br>
            <br>
            बहुत बहुत धन्यवाद! यदि आपको कोई मदद लगे, तो कृपया मुझे कॉल करें!<br>
            <?php
        } else {
            ?>
            Hello <b><?php echo $name; ?></b> ji,<br>
            <br>
            My name is (XYZ) and I am a resident of your constituency. As you know, the COVID19 lock down has made life incredibly difficult for many sections of society. I wanted to know what steps you are taking in the fight against novel coronavirus.
            <br>
            <br>
            1. Money: How many families need government support in our area? Are you supporting daily wage workers, senior citizens, homeless people and people with disabilities?
            <br>
            2. Food: Will you give food packets to poor people in our area?<br>
            3. Health: What measures are you taking to ensure health and sanitation?<br>
            4. Safety: We have heard that people are being stopped by the police while trying to buy ration. How are you ensuring safety for people seeking essential services in our area?
            <br>
            5. Support: Do you need volunteers from our constituency? How can I help you?<br>
            <br>
            Ways You Can Help:<br>
            <br>
            1. Connect: Connect your corporator to NGOs or companies carrying out relief work.<br>
            2. Collect: Create a small fundraiser to give food supplies to needy families in your area.<br>
            3. Criticise: If your corporator does not have a plan, get others from your area to call them and put pressure on them to act immediately.
            <br>
            <br>
            Thank you very much! Please let me know if I can help in any way possible. I hope that you will not let our area down.
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


