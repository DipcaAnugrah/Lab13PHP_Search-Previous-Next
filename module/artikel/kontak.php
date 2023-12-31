
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <!-- Feather icon -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <div class="container">
    <?php 
            require('../../template/header.php'); 
        ?>
    <section class="contact" id="contact">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati minus id doloribus hic dolor?</p>

            <div class="row">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15862.477403841847!2d107.05481792893906!3d-6.313631871099128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699048511923cd%3A0x55c07de5e2ace31d!2sToko%20Perlengkapan%20Satpam%20%22GADA%20CILALANG%22!5e0!3m2!1sid!2sid!4v1692315341556!5m2!1sid!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

                <form action="">
                    <div class="input-group">
                        <label for="nama_user"><i data-feather="user"></i></label>
                        <input type="text" placeholder="Nama" id="nama_user">
                    </div>
                    <div class="input-group">
                        <label for="e-mail"><i data-feather="mail"></i></label>
                        <input type="text" placeholder="E-mail" id="e-mail">
                    </div>
                    <div class="input-group">
                        <label for="phone"><i data-feather="phone"></i></label>
                        <input type="text" placeholder="No hp" id="phone">
                    </div>
                    <div class="input-group">
                        <label for="message"><i data-feather="message-square"></i></label>
                        <input type="text" placeholder="Massage" id="phone">
                    </div>

                    <button class="btn" type="submit">Send</button>
                </form>
            </div>
        </section>
        <?php require('../../template/footer.php')?>
    </div>

        <!-- Feather icon -->
        <script>
        feather.replace();
    </script>

</body>
</html>