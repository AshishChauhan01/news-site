  <header>
      <div class="top-header">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-md-6">
                      <div class="logo">
                          <a href="post.php"><img class="logo" src="../assets/images/logo.jpg"></a>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div class="logout">
                          Hello <b><?= $_SESSION['login_user_name']; ?></b> <a href="logout.php" class="admin-logout btn btn-sm btn-danger">logout&nbsp;<i class="fa-solid fa-right-from-bracket"></i>

                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div id="admin-menubar">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <ul class="admin-menu">
                          <li>
                              <a href="index.php">Dashboard</a>
                          </li>
                          <li>
                              <a href="posts.php">Post</a>
                          </li>
                          <li>
                              <a href="categories.php">Category</a>
                          </li>
                          <li>
                              <a href="users.php" class="<?= $activePage === 'users' ? 'active' : ''; ?>">Users</a>
                          </li>
                          <li>
                              <a href="settings.php">Settings</a>
                          </li>

                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </header>
  <div class="blank-space"></div>