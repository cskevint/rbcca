
    <div class="row">
        <div class="col-lg-8">
            <img class="img-responsive img-rounded" src="images/tutor_gathering.jpg">
        </div>
        <div class="col-lg-4">
            <?php if(isset($_SESSION['unity_token'])) { ?>
                <h1>Welcome, <?php echo $_SESSION['first_name']?>!</h1>
            <?php } else { ?>
                <h1>Welcome!</h1>
            <?php } ?>
            <p>Regional Baha’i Councils are elected Baha’i institutions operating within regions under the direction of the National Spiritual Assembly. They oversee regional expansion and consolidation plans, analyze approaches to carry out current Baha’i plans, propose strategies to help clusters move through stages of growth, and promote neighborhood capacity building and learning.</p>
            <a class="btn btn-primary btn-lg" href="#">Call to Action!</a>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-12">
            <div class="well text-center">
                This is a well that is a great spot for a business tagline or phone number for easy access!
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4">
            <h2>Clusters</h2>
            <p>The state has been divided into 66 geographic regions called clusters,  where individuals, communities and institutions work together to implement the goals of the Five Year Plan.</p>
            <a class="btn btn-default" href="#">Learn More</a>
        </div>
        <div class="col-lg-4 col-md-4">
            <h2>Training Institute</h2>
            <p>The Regional Training Institute is composed of a board appointed by the Council and scheme of coordination serving all over the state and the materials of the Ruhi Institute.</p>
            <a class="btn btn-default" href="#">Learn More</a>
        </div>
        <div class="col-lg-4 col-md-4">
            <h2>Period of Service</h2>
            <p>Young people interested in offering of a period of service are invited to fill out this questionaire. Opportunities for service exist in many parts of the state.</p>
            <a class="btn btn-default" href="http://service.rbcca.org">Learn More</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">&nbsp;</div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <?php
            if(isset($_SESSION['notice'])) {
                echo '<div class="alert alert-info">'.$_SESSION['notice'].'</div>';
                unset($_SESSION['notice']);
            }
            ?>
            <h4>Send us a note:</h4>
            <form id="contact_us" action="mail.php" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="" placeholder="Name" required/>
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" value="" placeholder="Email" required/>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                </div>
                <div class="form-group">
                    <div class="col-lg-6 col-sm-6">
                        <input class="form-control" type="reset" value="Reset"/>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <input class="form-control btn-primary" type="submit" value="Send"/>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            <h4>Contact Details</h4>
            <ul>
                <li class="">
                    <span class="glyphicon glyphicon-envelope"></span>
                    <script type="text/javascript">
                        var username = "secretary", hostname = "rbcca.org", linkText = username + "@" + hostname;
                        document.write("<a href='" + "mail" + "to:" + username + "@" + hostname + "'>" + linkText + "</a>");
                    </script>
                </li>
                <li class="">
                    <span class="glyphicon glyphicon-road"></span>

                </li>
                <li class="">
                    <span class="glyphicon glyphicon-thumbs-up"></span>
                    <a href="http://www.facebook.com/pages/Meridian-Foundation/249104004919?ref=nf">Facebook</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-4">
            <blockquote>
                <p>
                    To every generation of young believers comes an opportunity to make a contribution to the fortunes of humanity, unique to their time of life. For the present generation, the moment has come to reflect, to commit, to steel themselves for a life of service from which blessing will flow in abundance.
                </p>
                <small class="text-right">
                    Universal House of Justice, February 8, 2013
                </small>
            </blockquote>
        </div>
    </div>