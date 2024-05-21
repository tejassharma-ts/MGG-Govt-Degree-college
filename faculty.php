<?php
include "./admin/config/connection.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mahayogi Guru Gorakhnath Govt. degree college bithyani Yamkeshwar, pauri garhwal Uttarakhnd</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <?php include('include/header.php')?>
    <section class="wow fadeIn pre-header222 animated" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row">
                <div class="page-title-wrap2 text-center w-100">
                    <h1 class="page-title-captions2"><b>Faculty & staff</b> </h1>
                    <div class="breadcrumbs2">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index.php">/</a></li>
                            <li><a href="faculty.php">Faculty &amp; staff</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="business">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-7 col-sm-12 col-12">
                    <h3><b>प्राचार्य का संदेश</b></h3>
                    <p>उत्तराखण्ड हिमालय पौराणिक काल से ही अनुपम, प्राकृतिक सौंदर्य धार्मिक एवं आध्यात्मिक उत्कर्ष और
                        ज्ञान-विज्ञान की शिक्षा के प्रमुख केन्द्र के रूप में चर्चित है। अति प्राचीन काल से ही यह क्षेत्र
                        साहित्य में भी अपना विशिष्ट स्थान बनाये हुए हैं। पौराणिक काल के केदारखण्ड के अन्तर्गत ऋषि
                        मार्कण्डेय की तपस्थली नव निर्मित उच्चतर शिक्षा का पावन केन्द्र 'महायोगी गुरू गोरक्षनाथ
                        महाविद्यालय (विध्याणी)' यमकेश्वर पौड़ी गढ़वाल (उत्तराखंड) ज्ञान-विज्ञान की उज्जवल परम्परा के
                        प्रचारक केन्द्र के रूप में संस्थापित हो रहा है। महाविद्यालय की वार्षिक पत्रिका "गोरक्ष-संदेश" का
                        यह प्रथम अंक इसी आलोक में प्रकाशित होने जा रहा है। पत्रिका महाविद्यालय में अध्ययनरत
                        छात्र-छात्राओं की सकारात्मक एवं रचनात्मक अभिव्यक्ति का सशक्त माध्यम होती है। इस अभिव्यक्ति को
                        उजागर करने में महाविद्यालय के शिक्षकों एवं कर्मचारियों का भी जब सक्रिय योगदान होता है तभी
                        छात्र-छात्राओं में सृजनात्मक विचारों का जन्म होकर अभिव्यक्ति के रूप में फलित होता है।</p>
                    <br>
                    <p>मुझे अतिप्रसन्नता है कि हमारे विद्यार्थी सिर्फ किताबी ज्ञान ही नहीं अपितु अतिरिक्त सृजनात्मक
                        क्रियाकलापों में भी अपना योगदान दे रहे हैं।

                        मुझे आशा ही नहीं अपितु पूर्ण विश्वास भी है कि महाविद्यालय की पत्रिका "गोरक्ष-संदेश" का यह अंक
                        छात्र-छात्राओं की सृजनात्मक अभिव्यक्ति का प्रतीक बनकर उभरेगा। मैं 'गोरक्ष- संदेश' के सम्पादक
                        मण्डल को प्रथम अंक के प्रकाशन हेतु हार्दिक बधाई देता हूँ, एवं शुभकामनायें व्यक्त करता हूँ।</p>
                    <br>

                    <br>

                    <ul>
                        <li><a href="">BA PROGRAM</a></li>
                        <li>|</li>
                        <li><a href="">The MGGGDC Group</a></li>

                    </ul>
                </div>
                <div class="col-md-12 col-lg-5 col-sm-12 col-12 d-flex justify-content-center">
                    <div class="speaker-info">
                        <img src="images/Mahayogi Guru Gorakhnath Govt/card/prinj.jpg">
                        <ul>
                            <li class="d-block">Principal</li>
                            <li><b>Prof. Yogesh kumar Sharma</b></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="skill">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Fostering Faculty and Staff Success</h2>
                    <p>Fostering Faculty and Staff Success is at the heart of our college's mission. We recognize that
                        the dedication and expertise of our faculty and staff play a pivotal role in shaping the
                        educational experience and ensuring the smooth functioning of our institution. Through ongoing
                        support, professional development opportunities, and a collaborative work environment, we aim to
                        empower our faculty and staff to excel in their roles.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 ">
                <section class="quick-facts">
                    <div class="container-fluid ">
                        <h3>📓TEACHING STAFF :- Guiding Minds, Igniting Futures</h3>
                        <div class="d-flex justify-content-center flex-wrap">
                            <?php 
                            $query = "SELECT * FROM faculty_members order by id desc";
                            $rs_result = mysqli_query($con, $query);

                            while ($row = mysqli_fetch_array($rs_result)) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $photo = $row['photo'];
                                $position = $row['position'];
                                $cv_path = $row['cv_path'];

                             $photoSrc = !empty($photo) ? "./admin/$photo" : "./admin/upload/teachers/default.jpg";
                            ?>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img style="aspect-ratio: 2/2; object-fit: cover;" src="<?php echo $photoSrc ?>"
                                class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b><?php echo $name?></b></h3>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </section>
                <section class="quick-facts">
                    <div class="container">
                        <div class="skill">
                            <h2 class="ht">🧍‍♂️NON TEACHING STAFF :- Empowering Operational Excellence</h2>
                        </div>
                        <div class="d-flex justify-content-center flex-wrap">
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="quick-facts">
                    <div class="container">
                        <div class="skill">
                            <h2>🙋🏻‍♂️SUPPORTING STAFF :- Empowering Operational Excellence</h2>
                        </div>
                        <div class="d-flex justify-content-center flex-wrap">
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                            <div class="card m-2 custom-card" style="width: 13rem;">
                                <img src="images/Mahayogi Guru Gorakhnath Govt/card/person.png"
                                    class="card-img-top mb-0 custom-card-img" alt="...">
                                <div class="card-body p-1">
                                    <h3 class="card-text"><b>Rakesh Gupta</b></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include('include/footer.php')?>
</body>

</html>
