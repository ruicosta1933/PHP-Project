<?php

date_default_timezone_set('Europe/Lisbon');

if(!isset($_GET['message'])){
    $_GET['message']=0;
}
    switch($_GET['message']) {

        case 1:
        echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Failed</span>
        The two passwords didnt match. Please, try again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    break;

            case 2:
            echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Failed</span>
            The password did not match with our standarts. Please, use one with 8 carachaters, special-carachteres, Uppercase, etc.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        break;

        case 3:
        echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Failed</span>
        Please, select a role to the user that is being added.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    break;

    case 4:
        echo '
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Failed</span>
            Username already token. Please, try another one.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    break;

    case 5:
        echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
<span class="badge badge-pill badge-danger">Failed</span>
Email already used. Please, try another one.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>';
    break;

    case 6:
        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        Record created successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    if(isset($_SESSION["username"])){
        $log_string = date("Y-m-d")." | ".$_SESSION["username"]." adicionou um utilizador ??s ".date("h:i:s")."\n\n============================================================================== \n\n";
        $log_file = "logs.txt";
    
        $handle = fopen($log_file, "a") or die ('Something went wrong !');
    
        fwrite($handle, $log_string);
        fclose($handle);
    }
    else{
        $log_string = date("Y-m-d")." | Novo utilizador criou conta na plataforma ??s ".date("h:i:s")."\n\n============================================================================== \n\n";
        $log_file = "logs.txt";
    
        $handle = fopen($log_file, "a") or die ('Something went wrong !');
    
        fwrite($handle, $log_string);
        fclose($handle);
    }
    

    break;

    case 7:
        echo ' <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
        <span class="badge badge-pill badge-warning">Oops</span>
        Someting went wrong please try again later.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    break;

    case 8:
        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        User deleted successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    $log_string = date("Y-m-d")." | ".$_SESSION["username"]." apagou um utilizador ??s ".date("h:i:s")."\n\n============================================================================== \n\n";
    $log_file = "logs.txt";

    $handle = fopen($log_file, "a") or die ('Something went wrong !');

    fwrite($handle, $log_string);
    fclose($handle);
    break;
    case 9:
        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        User updated successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    $log_string = date("Y-m-d")." | ".$_SESSION["username"]." atualizou um utilizador ??s ".date("h:i:s")."\n\n============================================================================== \n\n";
    $log_file = "logs.txt";

    $handle = fopen($log_file, "a") or die ('Something went wrong !');

    fwrite($handle, $log_string);
    fclose($handle);
    break;
    case 10:
        echo '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
<span class="badge badge-pill badge-danger">Failed</span>
Image field is required. Please upload an image.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>';
    break;
    case 11:
        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        Password updated successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    if(isset($_SESSION["username"])){
    $log_string = date("Y-m-d")." | ".$_SESSION["username"]." atualizou a sua palavra-passe ??s ".date("h:i:s")."\n\n============================================================================== \n\n";
    $log_file = "logs.txt";

    $handle = fopen($log_file, "a") or die ('Something went wrong !');

    fwrite($handle, $log_string);
    fclose($handle);
    }
    else {
        $log_string = date("Y-m-d")." | Um utilizador atualizou a sua palavra-passe ??s ".date("h:i:s")."\n\n============================================================================== \n\n";
        $log_file = "logs.txt";
    
        $handle = fopen($log_file, "a") or die ('Something went wrong !');
    
        fwrite($handle, $log_string);
        fclose($handle);
    }
    break;
    
    case 12:
        echo ' <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
        <span class="badge badge-pill badge-warning">Oops</span>
        The current password is not the same. Please, try again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    break;
    case 13:
        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        New user updated successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    $log_string = date("Y-m-d")." | ".$_SESSION["username"]." atualizou um utilizador ??s ".date("h:i:s")."\n\n============================================================================== \n\n";
    $log_file = "logs.txt";

    $handle = fopen($log_file, "a") or die ('Something went wrong !');

    fwrite($handle, $log_string);
    fclose($handle);
    break;
    case 14:
        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        You have been registered successfuly.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    break;
    case 15:
        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        User is now unblocked.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    break;
    case 16:
        echo ' <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
        <span class="badge badge-pill badge-warning">Success</span>
        User is now blocked.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    break;



}

?>

