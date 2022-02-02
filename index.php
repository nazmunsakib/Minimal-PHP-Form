<!DOCTYPE html>
<?php 
    include_once 'functions.php';
    $lsnguage = array("PHP", "Java", "Javascript", "Python", "C++");

    $fileType = array("image/png", "image/jpg", "image/jpeg");
    $file = $_FILES['photo']?? [];
    if($file ){
        if(in_array($_FILES['photo']['type'], $fileType) && $_FILES['photo']['size']<5*1024*1024 ){
            move_uploaded_file($_FILES['photo']['tmp_name'], "images/".$_FILES['photo']['name']);
        }
        
    }
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome PHP</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous" />  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="main-container mt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <div class="main-content">
                        <h1>Hello Welcome To Our Website</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum facilis aliquam reiciendis enim voluptate quasi similique assumenda facere expedita voluptates! Cum facilis aliquam reiciendis enim voluptate quasi similique assumenda facere expedita voluptates!</p>
                    </div>
                    <div class="output">
                        <?php 
                            $fname = '';
                            $lname = '';
                            $checked = '';
                            if(isset($_POST['fname']) && !empty(isset($_POST['fname']))){
                                //$fname = htmlspecialchars($_GET['fname']);
                                $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
                            }
                            if(isset($_POST['lname']) && !empty(isset($_POST['lname']))){
                                //$lname = htmlspecialchars($_GET['lname']);
                                $lname = filter_input( INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
                            }
                            if(isset($_POST['lname']) && !empty(isset($_POST['lname']))){
                                //$lname = htmlspecialchars($_GET['lname']);
                                $lname = filter_input( INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
                            }
                            if(isset($_POST['ckb']) && $_POST['ckb'] == 1){
                                $checked = 'checked';
                            }

                            $slanguage = $_POST['language']?? array();
                        ?>

                        <?php
                        if(!empty($_POST['fname']) || !empty($_POST['lname']) ){
                            printf("First Name: %s %s Last Name: %s" , $fname, "</br>", $lname );
                        }
                           
                        ?>
                    </div>

                    <pre>
                        <p>
                        <?php
                                print_r($_POST);
                                print_r($_FILES);
                            ?>
                        </p>

                    </pre>
                    <hr>
                    <form method="POST" enctype="multipart/form-data" >
                        <label for="fname">First Name</label>
                        <input class="form-control" type="text" name="fname" id="fname" value="<?php echo $fname?>">
                        <br>
                        <label  for="lname">Last Name</label>
                        <input class="form-control" type="text" name="lname" id="lname" value="<?php echo $lname?>">
                        <br>
                        <p>
                            <input type="checkbox" name="ckb" id="ckb" value="1" <?php echo $checked; ?>>
                            <label for="ckb">You can check</label>
                        </p>

                        <p>
                            <label for="image">Upload Profile Photo</label>
                            <input type="file" name="photo" id="image">
                        </p>

                        <label>Select your Expertist</label>

                        <p>
                            <input type="checkbox" name="skills[]" id="html" value="html" <?php isChecked('skills', 'html' ); ?>>
                            <label for="html">HTML</label></br>
                            <input type="checkbox" name="skills[]" id="css" value="css" <?php isChecked('skills', 'css' ); ?>>
                            <label for="css">CSS</label></br>
                            <input type="checkbox" name="skills[]" id="php" value="php" <?php isChecked('skills', 'php' ); ?>>
                            <label for="php">PHP</label></br>
                            <input type="checkbox" name="skills[]" id="javascript" value="javascript" <?php isChecked('skills', 'javascript' ); ?>>
                            <label for="javascript">Javascript</label></br>
                            <input type="checkbox" name="skills[]" id="laravel" value="laravel" <?php isChecked('skills', 'laravel' ); ?>>
                            <label for="laravel">Laravel</label></br>
                        </p>

                        <p>
                            <select  class="form-control" name="language[]" id="language" multiple>
                                <option value="">Select Your Programming langauge</option>
                                <?php 
                                    selectPption($lsnguage, $slanguage );
                                ?>
                            </select>
                        </p>
                        
                        <input class="btn btn-primary" type="submit" value="Submit">    
                        <br>
                        <br>
                        <br>
                    </form>
                    <div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

