
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
            <a class="navbar-brand logo-nav" href="index.php">
                <span class="hidden-xs"><?= $name ?></span>
                <span class="visible-xs"><?= $short_name ?></span>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="#about">Clusters</a></li> -->
                <!-- <li><a href="#services">Training Institute</a></li> -->
                <!-- <li><a href="#services">Service</a></li> -->
                <!-- <li><a href="#contact">Contact</a></li> -->
                <?php
                    $hostname = str_replace(__FILE__, "", $_SERVER["REQUEST_URI"]);
                    if(isset($_SESSION['unity_token'])) {
                ?>
                    <!-- <li><a href="<?=$hostname?>oauth.php?auth_logout=true">Sign Out</a></li> -->
                <?php } else { ?>
                    <!-- <li><a href="<?=$hostname?>oauth.php?auth_redirect=true">Sign In</a></li> -->
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>