<?php
$activePage = 'dashboard';
include "header.php"; ?>
<div class="dashboard-section section-padding min-height">
    <div class="container">
        <h2 class="common-title">Dashboard Overview</h2>
        <p class="welcome">Welcome back <b>Ashish Chauhan</b>! Here's what's happening with your users today.</p>
        <h3 class="sm-section-title">User Statistics</h3>
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
                            <div class="icon bg-purple">
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
    <div class="container">
        <h3 class="sm-section-title">Post Analytics</h3>
        <div class="dashboard-elements">
            <div class="row g-3 g-md-4">
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="element-box">
                            <div class="icon">
                                <i class="ri-file-edit-line"></i>
                            </div>
                            <p class="title">Total Posts</p>
                            <p class="count">8,421</p>
                            <div class="graph-percentage">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                +18.3% vs last month
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="element-box">
                            <div class="icon bg-green">
                                <i class="ri-eye-line"></i>
                            </div>
                            <p class="title">Post Views</p>
                            <p class="count">124.5K</p>
                            <div class="graph-percentage">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                +32.1% vs last month
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="element-box">
                            <div class="icon bg-orange">
                                <i class="ri-chat-4-line"></i>
                            </div>
                            <p class="title">Comments</p>
                            <p class="count">3,247</p>
                            <div class="graph-percentage text-red ">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                +15.8% vs last month
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="element-box">
                            <div class="icon bg-purple">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                            </div>
                            <p class="title">Engagement Rate</p>
                            <p class="count">68.2%</p>
                            <div class="graph-percentage">
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                +5.4% vs last month
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="categories-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="sm-section-title m-0">Most Liked Categories</h3>
                <a href="#" class="blue-btn">Total 50+ Categories</a>
            </div>
            <div class="dashboard-elements">
                <div class="row g-3 g-md-4">
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="element-box category">
                                <div class="top-icon-percentage">
                                    <div class="icon">
                                        <i class="ri-macbook-line"></i>
                                    </div>
                                    <div class="percentage">
                                        34%
                                    </div>
                                </div>
                                <p class="count this-is-title">Technology</p>
                                <p class="title this-is-count">2,847 posts</p>
                                <div class="graph-percentage">
                                    <div class="graph">
                                        <div class="graph-line bg-color-1" style="width:34%;"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="element-box category">
                                <div class="top-icon-percentage">
                                    <div class="icon bg-color-5">
                                        <i class="ri-heart-line"></i>
                                    </div>
                                    <div class="percentage">
                                        23%
                                    </div>
                                </div>
                                <p class="count this-is-title">Lifestyle</p>
                                <p class="title this-is-count">1,923 posts</p>
                                <div class="graph-percentage">
                                    <div class="graph">
                                        <div class="graph-line bg-color-5" style="width:23%;"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="element-box category">
                                <div class="top-icon-percentage">
                                    <div class="icon bg-color-6">
                                        <i class="ri-briefcase-line"></i>
                                    </div>
                                    <div class="percentage">
                                        20%
                                    </div>
                                </div>
                                <p class="count this-is-title">Business</p>
                                <p class="title this-is-count">1,654 posts</p>
                                <div class="graph-percentage">
                                    <div class="graph">
                                        <div class="graph-line bg-color-6" style="width:20%;"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="element-box category">
                                <div class="top-icon-percentage">
                                    <div class="icon bg-color-2">
                                        <i class="ri-heart-pulse-line"></i>
                                    </div>
                                    <div class="percentage">
                                        12%
                                    </div>
                                </div>
                                <p class="count this-is-title">Health & Fitness</p>
                                <p class="title this-is-count">987 posts</p>
                                <div class="graph-percentage">
                                    <div class="graph">
                                        <div class="graph-line bg-color-2" style="width:12%;"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="element-box category">
                                <div class="top-icon-percentage">
                                    <div class="icon bg-color-4">
                                        <i class="ri-film-line"></i>
                                    </div>
                                    <div class="percentage">
                                        8%
                                    </div>
                                </div>
                                <p class="count this-is-title">Entertainment</p>
                                <p class="title this-is-count">654 posts</p>
                                <div class="graph-percentage">
                                    <div class="graph">
                                        <div class="graph-line bg-color-4" style="width:8%;"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="element-box category">
                                <div class="top-icon-percentage">
                                    <div class="icon bg-color-3">
                                        <i class="ri-plane-line"></i>
                                    </div>
                                    <div class="percentage">
                                        3%
                                    </div>
                                </div>
                                <p class="count this-is-title">Travel</p>
                                <p class="title this-is-count">356 posts</p>
                                <div class="graph-percentage">
                                    <div class="graph">
                                        <div class="graph-line bg-color-3" style="width:3%;"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="quick-actions-section">
        <div class="container">
            <h3 class="sm-section-title">Quick Actions</h3>
            <div class="row g-3">
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="quick-action box-1">
                            <div class="icon bg-blue-light">
                                <i class="ri-user-follow-line color-blue"></i>
                            </div>
                            <div class="title-box">
                                <p class="title">Add New User</p>
                                <p class="description">Create a new user account</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="quick-action box-2">
                            <div class="icon bg-green-light">
                                <i class="ri-file-text-line color-green"></i>
                            </div>
                            <div class="title-box">
                                <p class="title">Generate Report</p>
                                <p class="description">Create user activity report</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="quick-action box-3">
                            <div class="icon bg-purple-light">
                                <i class="ri-settings-3-line color-purple"></i>
                            </div>
                            <div class="title-box">
                                <p class="title">System Settings</p>
                                <p class="description">Configure application settings</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#">
                        <div class="quick-action box-4">
                            <div class="icon bg-orange-light">
                                <i class="ri-download-2-line color-orange"></i>
                            </div>
                            <div class="title-box">
                                <p class="title">Export Data</p>
                                <p class="description">Download users data as CSV</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="recent-activities-section">
        <div class="container">
            <div class="recent-activities">
                <div class="title-head">
                    <h2>Recent Activities</h2>
                    <a href="#" class="view-all-btn">View All</a>
                </div>
                <div class="activity-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="activity-details">
                                <div class="activity-icon bg-blue-light">
                                    <i class="ri-user-add-line color-blue"></i>
                                </div>
                                <div>
                                    <p class="activity-text">New user account created</p>
                                    <p class="user-name">John Doe</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="activity-time"><i class="ri-time-line"></i>&nbsp;2 minutes ago</p>
                        </div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="activity-details">
                                <div class="activity-icon bg-purple-light">
                                    <i class="ri-edit-line color-purple"></i>
                                </div>
                                <div>
                                    <p class="activity-text">User profile updated</p>
                                    <p class="user-name">Sarah Wilson</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="activity-time"><i class="ri-time-line"></i>&nbsp;15 minutes ago</p>
                        </div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="activity-details">
                                <div class="activity-icon bg-green-light">
                                    <i class="ri-checkbox-circle-line color-green"></i>
                                </div>
                                <div>
                                    <p class="activity-text">User account activated</p>
                                    <p class="user-name">Mike Johnson</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="activity-time"><i class="ri-time-line"></i>&nbsp;1 hour ago</p>
                        </div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="activity-details">
                                <div class="activity-icon bg-light-pink">
                                    <i class="ri-close-circle-line text-red"></i>
                                </div>
                                <div>
                                    <p class="activity-text">User account deactivated</p>
                                    <p class="user-name">Emma Brown</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="activity-time"><i class="ri-time-line"></i>&nbsp;2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="activity-details">
                                <div class="activity-icon bg-orange-light">
                                    <i class="ri-shield-line color-orange"></i>
                                </div>
                                <div>
                                    <p class="activity-text">User role changed to Admin</p>
                                    <p class="user-name">David Lee</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="activity-time"><i class="ri-time-line"></i>&nbsp;3 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>