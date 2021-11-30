    <div class="container body-blog-detail">
        <!-- <div class="row" >
            <img src="/public/img/blog/aq.jpg" alt="Quảng cáo" id="img-aq1">
        </div> -->
        <div class="row post">
            <?php foreach ($data["blog"] as $key => $blogs) {
                if (!isset($blogs["thumnail"])) continue;
            ?>
                <!-- <div style="background-image:url(public/img/blog/<?= $blogs['thumnail'] ?>);"></div> -->
                
                    <img class="post-img" src="/public/img/blog/<?= $blogs["thumnail"] ?>" alt="">
                
                <div class="post-time post-title1">
                    <h1 class="post-title-detail"><?= $blogs['title'] ?></h1>
                    <div class="post-date x51"><?= $blogs["author"] ?> - <?= $blogs["post_time"] ?></div>
                </div>


            <?php } ?>
        </div>
        <div class="content-blog-detail">
            <?php foreach ($data["blog"] as $key => $blogs) {
            ?>
                <?php if (isset($blogs['type'])) {
                    if ($blogs['type'] == 'title') {
                ?>
                        <p class="post-content-title"><?= $blogs["content"] ?></p>
                    <?php } else if ($blogs['type'] == 'text') { ?>
                        <p class="post-content"><?= $blogs["content"] ?></p>
                    <?php } else if ($blogs['type'] == 'img') { ?>
                        <img class="blog-content-img" src="/public/img/blog/<?= $blogs["content"] ?>" alt=<?= $blogs["content"] ?>>
                    <?php } else if ($blogs['type'] == 'h4') { ?>
                        <p class="post-h4"><?= $blogs["content"] ?></p>
                    <?php } else if ($blogs['type'] == 'list') { ?>
                        <li><?= $blogs["content"] ?></li>
                    <?php } else if ($blogs['type'] == 'link') { ?>
                        <li><a href=<?= $blogs["link"] ?>><?= $blogs["content"] ?></a></li>
                    <?php } else if ($blogs['type'] == 'footer') { ?>
                        <hr class="post-hr">
                        <p class="post-content-footer"><strong><em><?= $blogs["content"] ?></em></strong></p>
                    <?php } ?>

            <?php }
            } ?>
        </div>
    </div>
    </div>