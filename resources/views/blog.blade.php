<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@700&display=swap" rel="stylesheet">
    <title>FULL TILT - Blog</title>
  </head>
  <body>
    <div id="wrapper">
      <header>
        <a href="index.html">
          <img id="headerlogo" src="images/logo_transparent.png" alt="Full Tilt Main Logo">
        </a>
        <div id="socialmedia">
          <a href="https://www.instagram.com/fulltilt.official/" id="instagramlink" class="socialmedialogo" target="_blank" rel="noopener noreferrer"></a>
          <a href="https://www.tiktok.com/@fulltilt.official" id="tiktoklink" class="socialmedialogo" target="_blank" rel="noopener noreferrer"></a>
          <a href="https://www.youtube.com/channel/UCaaDccPrZFaSdqK8Eanwvcw" id="youtubelink" class="socialmedialogo" target="_blank" rel="noopener noreferrer"></a>
          <div class="socialmedialogo" id="spotify"></div>
        </div>
      </header>
      <main>
        <section id="blog">
        <h1>See the latest from FULL TILT!</h1>
        <article>
          <?php foreach ($posts as $post) : ?>
            <article>
              <?= $post; ?>
            </article>
          <?php endforeach; ?>
        </section>
      </main>
      <footer>
        <a href="about.html">ABOUT US</a>
        <a href="contact.html">CONTACT US</a>
        <p>&#169;Full Tilt</p>
        <p>This website was made by someone who can't make websites</p>
      </footer>
    </div>
  </body>
</html>
