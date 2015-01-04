<script type="text/javascript">
    $(function(){
        $(".img-zoom").click(function(event){
            $(".modal")
                .modal('show')
                .find(".modal-body img")
                .attr("src", $(event.currentTarget).attr("src"));
        });
    });
</script>

<style type="text/css">
    .img-zoom {
        cursor: pointer;
    }
    /*.modal-backdrop {*/
        /*position: fixed !important;*/
    /*}*/
</style>

<div class="modal fade">
    <div class="modal-dialog modal-lg" style="left:0">
        <div class="modal-content">
            <div class="modal-body">
                <img src="images/tutor_gathering.jpg" class="img-responsive"/>
            </div>
        </div>
    </div>
</div>

<div class="container">

    <h2>Goal Clusters</h2>

    <blockquote>
        "...we will call upon the community of the Most Great Name at Ridv&aacute;n 2011 to raise over the next five years the total number of clusters in which a programme of growth is under way, at whatever level of intensity, to 5,000, approximately one third of all clusters in the world at present."<br/>
        <i>–Universal House of Justice, 28 Dec. 2010</i>
    </blockquote>

    <p class="lead">These 5 clusters in the region of California have the goal of reaching a program of growth by the end of this current Five Year Plan (April 2016).</p>

    <ul>
        <li>
            <a href="#mendocino">Mendocino County</a>
        </li>
        <li>
            <a href="#lake">Lake County</a>
        </li>
        <li>
            <a href="#delnorte">Del Norte County</a>
        </li>
        <li>
            <a href="#modoc">Modoc/Lassen County</a>
        </li>
        <li>
            <a href="#trinity">Trinity County</a>
        </li>
    </ul>

    <?php require_once('emerging_mendocino.php'); ?>
    <?php require_once('emerging_lake.php'); ?>
    <?php require_once('emerging_delnorte.php'); ?>
    <?php require_once('emerging_modoc.php'); ?>
    <?php require_once('emerging_trinity.php'); ?>

</div>