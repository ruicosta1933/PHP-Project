<div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>
                                                <?php
                                                $sql_frase=$mysqli->query("Select * from utilizadores") or die ("Erro ao selecionar o home.");
                                                $count = 0;
                                                while($row = $sql_frase->fetch_assoc()){
                                                    $count++;
                                                }
                                                echo $count;
                                                    ?>
                                                    </h2>
                                                <span>members</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php
                                                
                                                $sql_frase=$mysqli->query("Select * from produtos") or die ("Erro ao selecionar o home.");
                                                $count = 0;
                                                while($row = $sql_frase->fetch_assoc()){
                                                    $count+=$row["quantidade"];
                                                }
                                                echo $count;
                                                    ?></h2>
                                                <span>items in stock</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text"><h2>
                                            <?php
                                                
                                                $sql_frase=$mysqli->query("Select * from produtos") or die ("Erro ao selecionar o home.");
                                                $total = 0;
                                                while($row = $sql_frase->fetch_assoc()){
                                                    $total += $row["preco"];
                                                }
                                                echo $total." €";
                                                    ?></h2>
                                                <span>total value</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>