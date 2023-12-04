     <!-- Hero Start -->
     <div class="container-fluid bg-light py-6 my-6 mt-0">
         <div class="container text-center animated bounceInDown">
             <h1 class="display-1 mb-4">Bài viết</h1>
             <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                 <li class="breadcrumb-item"><a href="<?=_WEB_ROOT?>/ClientHome/">Trang chủ</a></li>
                 <li class="breadcrumb-item"><a href="<?=_WEB_ROOT?>/ClientPosts/">Bài viết</a></li>
                 <li class="breadcrumb-item text-dark" aria-current="page"></??></li>
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
                         <!-- Ảnh chi tiết bài viết -->
                         <img src="https://thanhlc.store/wp-content/uploads/2023/09/341369559_1269294430637768_5900285896456377015_n-768x960.jpg" class="img-fluid mb-4" alt="Ảnh minh họa">

                         <!-- Loại bài viết -->
                         <div><small class="text-muted category">Loại bài viết</small></div>

                         <!-- Tiêu đề bài viết -->
                         <h1 class="display-4 mb-4">Dòng tiêu đề bài viết</h1>

                         <!-- Ngày đăng -->
                         <p class="text-muted small mb-4">Ngày đăng: 01 Tháng 01, 2023</p>

                         <!-- Nội dung bài viết -->
                         <p>
                             Nội dung bài viết ở đây. Bạn có thể thêm nhiều đoạn văn bản, hình ảnh, và các phần khác
                             tùy thuộc vào nhu cầu của bạn.
                         </p>

                         <!-- Phần hiển thị bình luận -->
                         <div class="comments mt-5">
                             <h4>Bình luận</h4>

                             <!-- Hiển thị danh sách bình luận -->
                             <div class="row d-flex align-items-center m-3">
                                 <div class="col-md-2">
                                     <img src="https://thanhlc.store/wp-content/uploads/2023/09/341369559_1269294430637768_5900285896456377015_n-768x960.jpg" alt="Avatar 1" class="img-fluid rounded-circle" style="object-fit: cover; height: 100px; width: 100px;">
                                 </div>
                                 <div class="col-md-10">
                                     <p class="comment-meta mb-2"><strong>Người bình luận 1</strong> - Ngày bình luận: 01 Tháng 01, 2023</p>
                                     <p class="comment-text">Nội dung Nội dung bình luận ở đâyNội dung bình luận ở đâyNội dung bình luận ở đâyNội dung bình luận ở đâyNội dung bình luận ở đâyNội dung bình luận ở đâybình luận ở đây.</p>
                                 </div>
                             </div>


                             <!-- Thêm các mục khác tùy vào số lượng bình luận -->

                             <!-- Form nhập bình luận -->
                             <form>
                                 <h4>Để lại bình luận</h4>

                                 <div class="mb-3">
                                     <label for="commentContent" class="form-label">Nội dung bình luận</label>
                                     <textarea class="form-control" id="commentContent" rows="3"></textarea>
                                 </div>
                                 <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                             </form>
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
                                 <li class="list-group-item"><a href="#" class="category-link">Tất cả</a></li>
                                 <li class="list-group-item"><a href="#" class="category-link">Bài viết 2</a></li>
                                 <li class="list-group-item"><a href="#" class="category-link">Bài viết 3</a></li>
                                 <!-- Thêm các mục khác tùy vào số lượng bài viết bạn muốn hiển thị -->
                             </ul>

                         </div>
                     </div>
                     <div class="card mt-4 border-primary">
                         <h6 class="card-title bg-primary p-3 rounded-top">BÀI VIẾT MỚI NHẤT</h6>
                         <div class="card-body">
                             <div class="">
                                 <div class="blog-content  d-flex rounded bg-light">
                                     <div class="text-dark bg-primary rounded-start">
                                         <div class="  d-flex flex-column justify-content-center text-center">
                                             <p class="fw-bold mb-0">16</p>
                                             <p class="fw-bold mb-0">Sep</p>
                                         </div>
                                     </div>
                                     <a href="#" class=" lh-base my-auto  p-1  ">How to get more test in your food from</a>
                                 </div>
                             </div>
                             <div class=" mt-3">
                                 <div class="blog-content  d-flex rounded bg-light">
                                     <div class="text-dark bg-primary rounded-start">
                                         <div class="  d-flex flex-column justify-content-center text-center">
                                             <p class="fw-bold mb-0">16</p>
                                             <p class="fw-bold mb-0">Sep</p>
                                         </div>
                                     </div>
                                     <a href="#" class=" lh-base my-auto  p-1  ">How to get more test in your food from</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </aside>

                 <!-- Kết thúc phần nav -->
             </div>
         </div>
     </div>
     <!-- blogs End -->