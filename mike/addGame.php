<?php 

include 'config.php';

error_reporting(0);

session_start();

// if (isset($_SESSION['username'])) {
//     header("Location: addGame.php");
// }

if (isset($_POST['submit'])) {
	$gameTitle = $_POST['title'];
	$system = $_POST['system'];
	$release_year = ($_POST['releaseYear']);
    $genre = ($_POST['genre']);
    $game_condition = ($_POST['gameCondition']);
	$have_case = ($_POST['haveCase']);
    $have_booklet = ($_POST['haveBooklet']);

    $sql = "INSERT INTO games (title, system, releaseYear, genre, gameCondition, haveCase, haveBooklet )
            VALUES ('$gameTitle', '$system', '$release_year', '$genre', '$game_condition', '$have_case', '$have_booklet')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Game Added to Library.')</script>";
        $gameTitle = "";
        $system = "";
        $release_year = "";
    } else {
        echo "<script>alert('Whoops! Something Wrong Went.')</script>";
    } 
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="loggedInStyle.css">

	<title>Add Game</title>
</head>
<body>
	<div class="container" id="addGameContainer">
		<form action="" method="post">
            
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Add Game</p>

			<div class="form-group">
				<input class="form-control" type="text" placeholder="Game Title" name="title" value="<?php echo $gameTitle; ?>" required>
			</div>
            <br>
			<div class="form-group">
				<input class="form-control" type="text" placeholder="System" name="system" value="<?php echo $system; ?>" required>
			</div>
            <br>
			<div class="form-group">
				<input class="form-control" type="number" placeholder="Release Year" name="releaseYear" value="" required>
            </div>
            <br>
            <div class="form-group">
                <label for="genre">Genre</label>
                <br>
				<SELECT class="form-control" type="text" name="genre" value="<?php echo $_POST['genre']; ?>" required>
                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>    
                    <option value="Action RPG">Action RPG</option>
                    <option value="Fighting">Fighting</option>
                    <option value="Platform">Platform</option>
                    <option value="Puzzle">Puzzle</option>
                    <option value="Racing">Racing</option>
                    <option value="RPG">RPG</option>
                    <option value="Shooter">Shooter</option>
                    <option value="Simulation">Simulation</option>
                    <option value="Sports">Sports</option>
                    <option value="Strategy">Strategy</option>
                    <option value="Misc">Misc</option>
                </SELECT>
			</div>
            <br>
            <div class="form-group">
                <label for="gameCondition">Condition?</label>
                <br>
				<SELECT class="form-control" type="text" placeholder="Condition?" name="gameCondition" value="<?php echo $_POST['gameCondition']; ?>" required>
                    <option value="Unopened">Unopened</option>
                    <option value="Like New">Like New</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Good">Good</option>
                    <option value="Poor">Poor</option>
                </SELECT>
			</div>
            <br>
            <div class="form-group">
				<label for="haveCase">Original Case?</label>
                <br>
                <SELECT class="form-control" type="text" name="haveCase" value="<?php echo $_POST['haveCase']; ?>" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </SELECT>
			</div>
            <br>
            <div class="form-group">
            <label for="haveBooklet">Original Booklet?</label>
                <br>
				<SELECT class="form-control" type="text" name="haveBooklet" value="<?php echo $_POST['haveBooklet']; ?>" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </SELECT>
			</div>
            
            <br>
			<div class="form-group">
				<button name="submit" class="btn btn-primary" id="addGameBtn">Add Game</button>
			</div>
            
			<button class="btn btn-primary" id="backToLibraryBtn" onclick="location.href='library.php'">Back to Library</button>
		</form>
	</div>
</body>
</html>