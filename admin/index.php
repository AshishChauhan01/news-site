<?php
$activePage = 'dashboard';
include "header.php"; ?>
<div class="dashboard-section section-padding min-height">
    <div class="container">
        <h2 class="common-title">Dashboard Overview</h2>
        <p class="welcome">Welcome back <b>Ashish Chauhan</b>! Here's what's happening with your users today.</p>
        <div class="dashboard-elements">
            <div class="row g-3 g-md-4">
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="element-box">
                            <div class="icon">
                                <i class="ri-group-line"></i>
                            </div>
                            <p class="title">Total Users</p>
                            <p class="count">2,543</p>
                            <div class="graph-percentage">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                +12.5% vs last month
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="element-box">
                            <div class="icon bg-green">
                                <i class="ri-user-follow-line"></i>
                            </div>
                            <p class="title">Active Users</p>
                            <p class="count">1,892</p>
                            <div class="graph-percentage">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                +8.2% vs last month
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="element-box">
                            <div class="icon bg-orange">
                                <i class="ri-user-unfollow-line"></i>
                            </div>
                            <p class="title">Inactive Users</p>
                            <p class="count">651</p>
                            <div class="graph-percentage text-red ">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                -3.1% vs last month
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="element-box">
                            <div class="icon">
                                <i class="ri-pulse-line"></i>
                            </div>
                            <p class="title">Recent Activity</p>
                            <p class="count">324</p>
                            <div class="graph-percentage">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                +24.7% vs last month
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="quick-actions-section">
        <div class="container">
            <p class="title">Quick Actions</p>
            <div class="row">
                <div class="col-md-3">
                    <div class="quick-action">
                        <div class="icon bg-green">
                            <i class="ri-user-follow-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>