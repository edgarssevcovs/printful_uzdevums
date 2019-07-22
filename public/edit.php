<?php
require_once('../src/config.php');
require_once('../src/header.html');

// selects and outputs query into form
if (isset ($_GET["id"]) ) {
    $id  = $_GET[ "id" ];
    $result = $mysqli->query ("SELECT * FROM list WHERE id = $id") or die($mysqli->error); 
    $edit = mysqli_fetch_row($result);
?>

        <div class = "col-8 mx-auto">
            <form method="POST" action="edit.php">
                <div class="form-group">
                    <label for="newTitle"><b>Virsraksts</b></label>
                    <input type="text" class="form-control" maxlength = "200" name="newTitle" value = "<?php echo $edit[1];?>" required>
                    <input type="hidden" name="id" value="<?php echo $edit[0];?>">
                </div>
                <div class="form-group">
                    <label for="newActivity"><b>Apraksts:</b></label>
                    <textarea class="form-control" rows="5" name="newActivity" maxlength = "1000"><?php echo $edit[2];?></textarea>
                </div>
                
                <a class="btn btn-secondary" href="index.php" role="button">Doties atpakaļ</a>
                <button type="submit" style="float: right;" class="btn btn-success">Saglabāt</button>
                <!-- shows done or not done button based on status row in database
                    if status = done, hides 'done' button and shows 'not done' button and the other way around-->
                <?php if ($edit[4] == 'not_done') { 
                ?> <a class="btn btn-success" style="float: right; margin-right: 15px;" href="isDone.php?id=<?php echo $edit[0];?>" role="button">&#x2713;</a> <?php 
                } else { ?>
                    <a class="btn btn-danger" style="float: right; margin-right: 15px;" href="notDone.php?id=<?php echo $edit[0];?>" role="button">&times;</a><?php
                }?>
                <!-- delete button -->
                <a class="btn btn-danger" style="float: right; margin-right: 15px;" href="delete.php?id=<?php echo $edit[0];?>" role="button">Dzēst</a> 
            </form>
        </div>
    </div>
</body>
</html>
<?php }

// updates database when submit button is pressed and redirects to index page
if ($_POST) {
    $newTitle = $_POST['newTitle'];
    $newActivity = $_POST['newActivity'];
    $id = $_POST['id'];
    
    $stmt = $mysqli->prepare("UPDATE list SET title = ?, activity = ? WHERE id = ?");
    $stmt->bind_param('ssi', $newTitle, $newActivity, $id);
    $stmt->execute();

    header("Location: index.php");

} 
$mysqli->close();


