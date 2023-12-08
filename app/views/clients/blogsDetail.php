     <!-- Hero Start -->
     <div class="container-fluid bg-light py-6 my-6 mt-0">
         <div class="container text-center animated bounceInDown">
             <h1 class="display-1 mb-4">Bài viết</h1>
             <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                 <li class="breadcrumb-item"><a href="<?= _WEB_ROOT ?>/ClientHome/">Trang chủ</a></li>
                 <li class="breadcrumb-item"><a href="<?= _WEB_ROOT ?>/ClientPosts/">Bài viết</a></li>
                 <li class="breadcrumb-item text-dark" aria-current="page">
                     <?= $postDetails['title'] ?>
                 </li>
             </ol>
         </div>
     </div>
     <!-- Hero End -->


     <!-- blogs star -->
     <div class="container-fluid blog">
         <div class="container">
             <div class="row">
                 <div class="row gx-4 justify-content-center col-md-9">
                     <!-- Hiển thị bài viết chi tiết -->
                     <article class="blog-detail">
                         <?php
                            $timestamp = strtotime($postDetails['create_at']);

                            // Lấy ngày, tháng, năm từ timestamp
                            $day = date('d', $timestamp);
                            $month = date('m', $timestamp);
                            $year = date('Y', $timestamp);
                            ?>
                         <!-- Tiêu đề bài viết -->
                         <h3 class="display-5 mb-4"><?= $postDetails['title'] ?></h3>

                         <!-- Ngày đăng -->
                         <p class="text-muted small mb-4">Ngày đăng: <?= $day ?> Tháng <?= $month ?>, <?= $year ?></p>

                         <!-- Nội dung bài viết -->
                         <p>
                             <?= html_entity_decode($postDetails['content']) ?>
                         </p>

                         <!-- Ảnh chi tiết bài viết -->

                         <!-- <img src="https://thanhlc.store/wp-content/uploads/2023/09/341369559_1269294430637768_5900285896456377015_n-768x960.jpg" class="img-fluid mb-4" alt="Ảnh minh họa"> -->

                         <!-- Loại bài viết -->
                         <div><small class="text-muted category">Được đăng trong mục: <a href="<? _WEB_ROOT ?>/ClientPosts/posts?id=<?= $postDetails['post_category_id'] ?>"><?= $postDetails['name'] ?></a></small></div>

                         <!-- Phần hiển thị bình luận -->
                         <div class="comments mt-5">
                             <h4 class="mb-3">Bình luận</h4>

                             <!-- Hiển thị danh sách bình luận -->
                             <?php foreach ($postComments as $postCommentsItems) :
                                    $timestamp = strtotime($postCommentsItems['create_at']);

                                    // Lấy ngày, tháng, năm từ timestamp
                                    $day = date('d', $timestamp);
                                    $month = date('m', $timestamp);
                                    $year = date('Y', $timestamp);
                                ?>
                                 <div class="row d-flex align-items-center m-3">
                                     <div class="col-md-2">
                                         <?php
                                            if ($postCommentsItems['image'] === '') :
                                            ?>
                                             <img src="<?= _WEB_ROOT; ?>/public/uploads/no-img-user.png" class="img-fluid rounded-circle" style="object-fit: cover; height: 100px; width: 100px;" alt="">
                                         <?php else :

                                            ?>
                                             <img src="<?= _WEB_ROOT; ?>/public/uploads/<?= $postCommentsItems['image'] ?>" class="img-fluid rounded-circle" style="object-fit: cover; height: 100px; width: 100px;" alt="">
                                         <?php endif; ?>
                                     </div>
                                     <div class="col-md-10">
                                         <p class="comment-meta mb-2"><strong><?= $postCommentsItems['full_name'] ?></strong> - Ngày bình luận: <?= $day ?> Tháng <?= $month ?>, <?= $year ?></p>
                                         <p class="comment-text"><?= $postCommentsItems['note'] ?></p>
                                     </div>
                                 </div>
                             <?php endforeach; ?>


                             <!-- Thêm các mục khác tùy vào số lượng bình luận -->

                             <!-- Form nhập bình luận -->
                             <form class="form-comment" action="<?= _WEB_ROOT ?>/ClientPosts/submitPostComments" method="post" onsubmit="return validateForm()">
                                 <h4>Để lại bình luận</h4>

                                 <div class="mb-3">
                                     <label for="commentContent" class="form-label">Nội dung bình luận</label>
                                     <input type="text" name="posts_id" hidden value="<?= $postDetails['posts_id'] ?>">
                                     <input type="text" name="users_id" hidden value="<?= $_SESSION["users"]['id'] ?>">
                                     <input type="text" name="status" hidden value="<?= ($_SESSION["users"]['role'] == 'admin') ? 'on' : 'off'?>">
                                     <textarea class="form-control" id="commentContent" name="note" rows="3"></textarea>

                                     <div id="errorNote" class="text-danger">

                                     </div>
                                 </div>
                                 <?php
                                    if (!empty($_SESSION['users'])) {
                                    ?>
                                     <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                                 <?php
                                    }
                                    ?>

                             </form>
                             <?php
                                if (!isset($_SESSION['users'])) {
                                ?>
                                 <div class="mb-3">
                                     <p class="tex-success">Bạn phải đăng nhập mới có thể bình luận bài viết này!</p> <a class="text-decoration-none text-success fw-bold" href="<?= _WEB_ROOT ?>/Dang-Nhap">Đăng nhập</a>
                                 </div>
                             <?php
                                }
                                ?>
                         </div>
                         <!-- Kết thúc phần hiển thị bình luận -->

                     </article>
                     <!-- Kết thúc hiển thị bài viết chi tiết -->
                 </div>



                 <!-- Phần nav bên phải -->
                 <aside class="col-md-3 wow bounceInRight" data-wow-delay="0.7s">
                     <div class="card border-primary">
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
                     <div class="card mt-4 border-primary">
                         <h6 class="card-title bg-primary p-3 rounded-top">BÀI VIẾT MỚI NHẤT</h6>
                         <div class="card-body">

                             <ul class="list-group list-group-flush">
                                 <?php foreach ($postTop5 as $postTop5Items) : ?>
                                     <li class="list-group-item p-0 p-1">
                                         <a href="<?= _WEB_ROOT ?>/ClientPosts/postDetails?id=<?= $postTop5Items['id'] ?>" class="category-link ">
                                             <div class="d-flex align-items-center">
                                                 <?php
                                                    if ($postTop5Items['image'] === '') :
                                                    ?>
                                                     <img width="70px" src="<?= _WEB_ROOT; ?>/public/uploads/no-img.png" class="me-3" alt="">
                                                 <?php else :

                                                    ?>
                                                     <img width="70px" src="<?= _WEB_ROOT; ?>/public/uploads/<?= $postTop5Items['image'] ?>" class="me-3" alt="">
                                                 <?php endif; ?>
                                                 <p class="blog-content m-0">
                                                     <?= $postTop5Items['title'] ?>
                                                 </p>
                                             </div>
                                         </a>
                                     </li>
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
     <script>
         function validateForm() {
             var note = document.getElementById("commentContent").value;
             var errorNote = document.getElementById("errorNote");
             // Kiểm tra xem nội dung bình luận có được nhập hay không
             if (note.trim() === "") {
                 errorNote.innerText = "Vui lòng nhập nội dung bình luận.";
                 return false;
             } else {
                 errorNote.innerText = "";
                 <?php
                    if ($_SESSION["users"]['role'] == 'user') :
                    ?>
                        alert("Bình luận của bạn đang chờ duyệt.");
                        
                 <?php
                    endif;
                    ?>
                    return true;
             }
         }
     </script>