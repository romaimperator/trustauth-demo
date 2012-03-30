<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <link href="css/foamicate.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/prettify.css" type="text/css" rel="stylesheet">
  </head>
  <body onload="window.prettyPrint && prettyPrint()">
    <div class="container">
      <input id="foamicate_url" type="hidden" value="http://foamicate.com/foamicate_auth.php"/>
<?php
  include('mysql.php');
  session_start();

  if ( ! isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = false;
  }

  if ($_SESSION['logged_in']):
?>
        <div class="row">
          <div class="span4">
            <p>Welcome!</p>
          </div>
          <div class="span2">
            <a href="logout.php">Logout</a>
          </div>
        </div>
        <div class="row">
          <div class="span6">
            <form class="well" action="add_note.php" method="post">
              <label>Note Text</label>
              <input class="span5" type="text" name="note" placeholder="Create a note...">
              <button class="btn" type="submit">create note</button>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="span4">
  <?php $notes = get_notes($_SESSION['user_id']); ?>
  <?php if (count($notes) > 0): ?>
            <ol>
              <?php foreach ($notes as $note):  ?>
                <li><?php echo $note['note']; ?></li>
              <?php endforeach; ?>
            </ol>
  <?php else: ?>
            <p>You haven't created any notes yet!</p>
  <?php endif; ?>
          </div>
        </div>
<?php else: ?>
      <div class="hero-unit">
        <h1>Hello and welcome to the demo site for Foamicate.</h1>
      </div>
      <div class="row">
        <div class="span4">
          <h3>What is Foamicate?</h3>
          <p>Foamicate is a system for authenticating users without using passwords.
          Instead it uses public key cryptography and RSA authentication. These technologies
          allow users to be authenticated securely and more easily than with
          traditional passwords.</p>
        </div>
        <div class="span4">
          <h3>How do I add Foamicate to a site?</h3>
          <p>Allowing users to authenticate using Foamicate is easy. There are just a few simple steps to
          follow to use the PHP script and get Foamication up and running on your website.</p>
          <p><a class="btn" href="#server">See Details</a></p>
        </div>
        <div class="span4">
          <h3>How can I get Foamicate?</h3>
          <p>Using Foamicate to login to websites is also easy. All you need to do is install the Foamicator
          addon in your browser and you are ready to use the enhanced security provided by Foamicate.</p>
          <p><a class="btn-large btn-success" href="https://addons.mozilla.org/en-US/firefox/addon/foamicator/">Get the addon!</a></p>
        </div>
      </div>
      <div id="info-row-2" class="row">
        <div class="span4">
          <h3>How does Foamicate work?</h3>
          <p>The server authenticates the client and uses the public key to associate the client
          with an account. The addon then takes the user to a url based on success or failure.</p>
          <p><a class="btn" href="#technical">See Details</a></p>
        </div>
        <div class="span4">
        </div>
        <div class="span4">
          <h3>Who Am I?</h3>
          <p>My name is Dan Fox and I'm a graduate student at Southern Illinois University Edwardsville.
          I created Foamicate to help fix the current issues with using passwords for authentication on websites.</p>
          <div class="btn-group">
            <a class="btn" href="mailto:romaimperator@gmail.com"><img src="img/email.png"/></a>
            <a class="btn" href="https://twitter.com/romaimperator"><img src="img/twitter_newbird_blue.png"/></a>
            <a class="btn" href="https://github.com/romaimperator"><img src="img/github.png"/></a>
          </div>
        </div>
        <div class="span4">
          <h3>GitHub Links</h3>
          <p>Here are the links to the source code for the PHP script, this demo site, and the Firefox addon. All
          code written by me is released under the <a class="non-breaking" href="http://opensource.org/licenses/BSD-3-Clause">BSD 3-Clause License</a>.</p>
          <ul class="unstyled">
            <li><a href="http://github.com/romaimperator/Foamicatee-PHP">Get the PHP script</a></li>
            <li><a href="http://github.com/romaimperator/Foamicator">Get the addon source</a></li>
            <li><a href="http://github.com/romaimperator/Foamicate-Demo">Get the demo site source</a></li>
          </ul>
        </div>
      </div>
      <section id="tutorial">
  <?php include('tutorial.php'); ?>
      </section>
      <section id="server">
  <?php include('server_details.php'); ?>
      </section>
      <section id="technical">
  <?php include('technical_details.php'); ?>
      </section>
<?php endif; ?>
      <hr>
      <footer class="footer">
        <p>Dan Fox</p>
      </footer>
    </div>
    <script src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/prettify.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-30392106-1']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
  </body>
</html>
