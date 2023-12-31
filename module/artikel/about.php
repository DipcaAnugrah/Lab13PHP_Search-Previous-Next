<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <div class="container">
        <?php 
            require('../../template/header.php'); 
        ?> 
        <section id="about" class="about">
            <h2>About</h2>

            <div class="row">
                <div class="about-img">
                    <img src="gambar/Dipca.jpg" alt="tentangdipca">
                </div>
                <div class="content">
                    <h3>Kenapa, ada apa , mengapa ?</h3>
                    <p>"Greetings, I am Doni, an Information Technology student at Pelita Bangsa University. I have a
                        strong determination to become a reliable software engineer. In my educational journey, I deeply
                        reflected on the complex aspects of the world of technology and developed a deep passion for
                        overcoming existing challenges."</p>
                    <video src="videos/Activity Diagram Android.mp4" preload="metadata" controls></video>
                    <video src="videos/Tugas Android Studio.mp4" preload="metadata" controls></video>
                </div>
            </div>

        </section>
        <?php require('../../template/footer.php'); ?>
    </div>
</body>

</html>