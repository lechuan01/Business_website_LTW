<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <form action="#" class="form-search-blog">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <select id="categories" class="custom-select bg-light">
                                <option>All Categories</option>
                                <option value="travel">Travel</option>
                                <option value="lifestyle">LifeStyle</option>
                                <option value="healthy">Healthy</option>
                                <option value="food">Food</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter keyword..">
                    </div>
                </form>
            </div>
            <div class="col-sm-2 text-sm-right">
                <button class="btn btn-secondary">Filter <span class="mai-filter"></span></button>
            </div>
        </div>

        <div class="row my-5">
        <?php foreach ($data["blog"] as $key => $blogs) {
        ?>
            <div class="col-lg-6 py-3">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="./public/img/blog/<?= $blogs["thumnail"]?>" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="blog-details.html"><?= $blogs["title"]?></a></h5>
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