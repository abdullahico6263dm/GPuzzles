<?php $page_title = 'Puzzles > Create Book'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('nav.php'); 
    $page="puzzles_list.php";   
   // verifyLogin($page); 

?>
<?php 
    $mysqli = NEW MySQLi('localhost','root','','quiz_master');
    $resultset = $mysqli->query("SELECT DISTINCT topic FROM topics ORDER BY topic ASC");   
?>
<link href="css/form.css" rel="stylesheet">
<style>#title {text-align: center; color: darkgoldenrod;}</style>
<div class="container">
    <!--Check the CeremonyCreated and if Failed, display the error message-->
    <?php
    if(isset($_GET['createPuzzle'])){
        if($_GET["createPuzzle"] == "fileRealFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not real, Please Try Again!</h3>';
        }
    }
    if(isset($_GET['createPuzzle'])){
        if($_GET["createPuzzle"] == "answerFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your answer was not one of the choices, Please Try Again!</h3>';
        }
    }
    if(isset($_GET['createPuzzle'])){
        if($_GET["createPuzzle"] == "fileTypeFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not a valid image type (jpg,jpeg,png,gif), Please Try Again!</h3>';
        }
    }
    if(isset($_GET['createPuzzle'])){
        if($_GET["createPuzzle"] == "fileExistFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - There is already a puzzle using that image, Please Try Again!</h3>';
        }
    }
  
    ?>
    <form action="createTheBook.php" method="POST" enctype="multipart/form-data">
        <br>
        <h3 id="title">Create A Book</h3> <br>
        
        <table>
            <!-- Puzzle name -->

            <!-- Creator name -->
 
            <!-- Author name -->
            <tr>
                <td style="width:100px">Author:</td>
                <td><input type="text"  name="authorName" maxlength="50" size="50" required title="Please enter the author's name"></td>
            </tr>
            <!-- Book name -->
            <tr>
                <td style="width:100px">Book name:</td>
                <td><input type="text"  name="bookName" maxlength="50" size="50" required title="Please enter the name of the book this puzzle will be in."></td>
            </tr>
            <!-- Puzzle -->
            <tr>
                <td style="width:100px">Puzzle:</td>
                <td><input type="file" name="puzzleFileToUpload" id="puzzleFileToUpload" maxlength="50" size="50" title="Enter the puzzle"></td>
            </tr>
            <!-- Solution -->
            <tr>
                <td style="width:100px">Solution:</td>
                <td><input type="file" name="solutionFileToUpload" id="solutionFileToUpload" maxlength="50" size="50" title="Enter the solution to the puzzle"></td>
            </tr>

        </table>

        <br><br>
        <div align="center" class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create Book</button>
        </div>
        <br> <br>

    </form>
</div>

