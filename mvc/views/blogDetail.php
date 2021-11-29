<div class="page-section"><h1>Details</h1>
    <div class="container">
        <div class="row" >
            <img src="/public/img/blog/aq.jpg" alt="Quảng cáo" id="img-aq1">
        </div>

        <div class="row my-5">
        <?php foreach ($data["blog"] as $key => $blogs) {
        ?>
            <div class="col-lg-6 py-3">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="/public/img/blog/<?= $blogs["thumnail"]?>" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="/<?= $blogs['title']?>"><?= $blogs["title"]?></a></h5>
                        <div class="post-date x51"><?= $blogs["author"]?> - <?= $blogs["post_time"]?></div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>

        <div aria-label="Page Navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </div>

    </div>
</div>
<script 