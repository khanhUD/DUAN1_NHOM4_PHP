     <!-- Hero Start -->
     <div class="container-fluid bg-light py-6 mt-0">
         <div class="container text-center animated bounceInDown">
             <h1 class="display-1 mb-4">Bài Viết</h1>
             <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                 <li class="breadcrumb-item"><a href="<?= _WEB_ROOT ?>/ClientHome/">Trang chủ</a></li>
                 <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
                 <li class="breadcrumb-item text-dark" aria-current="page">Bài viết</li>
             </ol>
         </div>
     </div>
     <!-- Hero End -->

     <!-- blogs star -->
     <div class="container-fluid  py-6">
         <div class="container">
             <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                 <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Bài viết</small>
                 <h1 class="display-5 mb-5">
                     Hãy là người đầu tiên đọc tin tức</h1>
             </div>
             <div class="row">
                 <div class="row gx-4 justify-content-center col-md-9">
                     <?php
                        //  print_r($posts);
                        foreach ($posts as $items) :

                            $timestamp = strtotime($items['create_at']);

                            // Lấy ngày, tháng, năm từ timestamp
                            $day = date('d', $timestamp);
                            $month = date('m', $timestamp);
                            $year = date('Y', $timestamp);
                        ?>
                         <div class="col-md-6 col-lg-4 wow bounceInUp mb-3" data-wow-delay="0.1s">
                             <div class="blog-item shadow">
                                 <div class="overflow-hidden rounded-top img-post">
                                     <?php
                                        if ($items['image'] === '') :
                                        ?>
                                         <a href="<?= _WEB_ROOT ?>/ClientPosts/postDetails?id=<?= $items['id'] ?>">
                                             <img src="<?= _WEB_ROOT; ?>/public/uploads/no-img.png" class="img-fluid w-100" alt="">
                                         </a>

                                     <?php else :

                                        ?>
                                         <a href="<?= _WEB_ROOT ?>/ClientPosts/postDetails?id=<?= $items['id'] ?>">
                                             <img src="<?= _WEB_ROOT; ?>/public/uploads/<?= $items['image'] ?>" class="img-fluid w-100" alt="">
                                         </a>
                                     <?php endif; ?>

                                 </div>
                                 <div class="rounded-bottom bg-dark bg-gradient p-3">
                                     <h6 class="title-blog pb-3"><a href="<?= _WEB_ROOT ?>/ClientPosts/postDetails?id=<?= $items['id'] ?>" class="lh-base my-auto"><?= $items['title'] ?></a></h6>
                                     <p class="blog-content m-0 mt-3"><?= html_entity_decode($items['short_description']) ?></p>

                                     <div class="blog-date text-white rounded mt-3 bg-primary">
                                         <span><?= $day ?>/<?= $month ?>/<?= $year ?></span>
                                     </div>

                                     <div class="border-top pt-3">
                                         <a class="pb-3 fw-bold" href="<?= _WEB_ROOT ?>/ClientPosts/postDetails?id=<?= $items['id'] ?>">Xem thêm </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     <?php endforeach; ?>

                 </div>
                 <!-- Phần nav bên phải -->
                 <aside class="col-md-3 wow bounceInRight" data-wow-delay="0.7s">
                     <div class="card">
                         <h6 class="card-title bg-primary p-3 rounded-top">DANH MỤC BÀI VIẾT</h6>
                         <div class="card-body">

                             <ul class="list-group list-group-flush">
                                 <li class="ps-0 list-group-item"><a href="<?= _WEB_ROOT ?>/ClientPosts" class="category-link">Tất cả</a></li>
                                 <?php foreach ($postCategories as $postCategoryItems) : ?>
                                     <li class="ps-0 list-group-item"><a href="<?= _WEB_ROOT ?>/ClientPosts/posts?id=<?= $postCategoryItems['id'] ?>" class="category-link"><?= $postCategoryItems['name'] ?></a></li>
                                 <?php endforeach; ?>

                             </ul>
                         </div>
                     </div>
                 </aside>
                 <!-- Kết thúc phần nav -->

             </div>

         </div>
     </div>
     <!-- blogs End -->