<?php include 'header.php'; ?>
<div id="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <!-- post-container -->
        <div class="post-container">
          <h2 class="page-heading">Search : </h2>

          <div class="post-content">
            <div class="row">
              <div class="col-md-4">
                <a class="post-img" href="single.php"><img src="admin/upload/image.png" alt="" /></a>
              </div>
              <div class="col-md-8">
                <div class="inner-content clearfix">
                  <h3><a href='single.php'>Title Here</a></h3>
                  <div class="post-information">
                    <span>
                      <i class="fa fa-tags" aria-hidden="true"></i>
                      <a href='category.php'>category name</a>
                    </span>
                    <span>
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <a href='author.php'>User Name</a>
                    </span>
                    <span>
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                      20Aug2025
                    </span>
                  </div>
                  <p class="description">
                    description..
                  </p>
                  <a class='read-more pull-right' href='single.php'>read more</a>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /post-container -->
      </div>
      <?php include 'sidebar.php'; ?>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>