<header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                            
                            </form>
                            <div class="header-button">
                               
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                        <?php
                                                        echo '<img src="data:'.$_SESSION['imageType'].';base64,'.base64_encode($_SESSION['imageData']).'"/>';
                                                        ?>
                                        </div>

                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['username']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                    <?php
                                                        echo '<img src="data:'.$_SESSION['imageType'].';base64,'.base64_encode($_SESSION['imageData']).'"/>';
                                                        ?>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['username']; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['email']; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                               <div class="account-dropdown__item">
                                                 <!--   <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a> -->
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a  href="?page=2&userid=<?php echo $_SESSION["id"]; ?>">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a  href="../index.php">
                                                        <i class="zmdi zmdi-airplay"></i>FrontEnd</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>