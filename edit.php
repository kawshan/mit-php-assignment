<?php

$servername = "localhost";
$username = "root";
$password = "kawshan6358";
$dbname = "neighborhood";

$connction = new mysqli($servername, $username, $password, $dbname);

$title  = "";
$description ="";
$type = "";
$datetime = "";
$priority = "";

$successMessage="";
$errorMessage="";

// GET request (load data)
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (!isset($_GET["id"])) {
        header("location:/mit/assignment/index.php");
        exit;
    }

    $id = $_GET["id"];

    // Read the data from DB
    $sql = "SELECT * FROM complain WHERE id = $id";
    $result = $connction->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location:/mit/assignment/index.php");
        exit;
    }

    // store data into variables
    $title = $row["title"];
    $description = $row["description"];
    $type = $row["type"];
    $datetime = $row["datetime"];
    $priority = $row["priority"];

}
// POST request (save data)
else {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $type = $_POST["type"];
    $datetime = $_POST["datetime"];
    $priority = $_POST["priority"];

    do {

        if (empty($title) || empty($description) || empty($type) || empty($datetime) || empty($priority)){
            $errorMessage = "All fields are required";
            break;
        }

        $sql = "UPDATE complain 
                SET title='$title', description='$description', type='$type', datetime='$datetime', priority='$priority'
                WHERE id=$id";

        $result = $connction->query($sql);

        if (!$result){
            $errorMessage = "Invalid query: ". $connction->error;
            break;
        }

        header("location:/mit/assignment/index.php");
        exit;

    } while (false);
}

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div style="border-radius: 30px; height: 100px; color: whitesmoke; background: #020024; background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);">
    <h1 style="text-align: center; padding: 30px">Neighbourhood Complain Management System </h1>
</div>


<?php

if(!empty($errorMessage)){
    echo "
        <strong>$errorMessage</strong>        
        ";
}

?>

<form method="post">

    <input type="hidden" name="id" value="<?php echo $id; ?>">


    <div style="padding: 100px">


        <div class="input-wrapper" style="display: flex; justify-content: space-between; margin-top: 30px">
            <lable>Title</lable>
            <input type="text" required placeholder="Type here..." name="title" class="input" value="<?php echo $title?>">
        </div>


        <div class="input-wrapper" style="display: flex; justify-content: space-between; margin-top: 30px">
            <lable>Description</lable>
            <input type="text" required placeholder="Type here..." name="description" class="input" value="<?php echo $description?>">
        </div>


        <div style="display: flex; justify-content: space-between; margin-top: 30px">
            <lable>Type</lable>
            <select class="form-select" name="type">
                <option disabled>Select a complaint type</option>
                <option value="Noise"   <?php if($type=="Noise") echo "selected"; ?>>Noise</option>
                <option value="Garbage" <?php if($type=="Garbage") echo "selected"; ?>>Garbage</option>
                <option value="Parking" <?php if($type=="Parking") echo "selected"; ?>>Parking</option>
            </select>

        </div>


        <div class="input-wrapper" style="display: flex; justify-content: space-between; margin-top: 30px">
            <lable>Date and time of complain</lable>
            <input type="datetime-local" required name="datetime" class="input" value="<?php echo $datetime?>">
        </div>



        <div style="display: flex; justify-content: space-between; margin-top: 30px">
            <label>Priority Level</label>
            <select class="form-select" name="priority">
                <option  selected disabled value="">Select priority</option>
                <option value="High" <?php if($priority=="High") echo "selected"; ?> >High</option>
                <option value="Medium" <?php if($priority=="Medium") echo "selected"; ?> >Medium</option>
                <option value="Low" <?php if($priority=="Low") echo "selected"; ?> >Low</option>
            </select>
        </div>


    </div>

    <div>
        <button type="submit" class="green-button">Save</button>
        <a href="/mit/assignment/index.php" class="red-button">Reset</a>
    </div>

</form>


</body>
</html>












