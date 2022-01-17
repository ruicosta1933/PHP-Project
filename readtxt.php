<div class="au-card recent-report">
                                    <div class="au-card-inner">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container" style="overflow-y: scroll; height: 100%;">
                <?php 

                if($file = fopen("logs.txt", "r")) { 
                    while(! feof($file)) { 
                        $line = fgets($file); 
                        echo $line."<br>";
                    } 
                    fclose($file); 
                } 
                ?>
            </div>
        </div>
    </div>
</div>
</div>