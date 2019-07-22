<?php 
require_once('config.php');

$result = $mysqli->query ("SELECT * FROM list") or die($mysqli->error); 

// fetches all queries from database using while loop
while ($post = $result->fetch_assoc()): ?>
    <div class = "row">
        <div class = "w-50 mx-auto col-sm-8" style="background-color: <?php if ($post['status'] == 'done') { echo '#51e854'; }else{echo '#eee';}?>; padding: 10px 5px 10px 5px; margin: 10px 0px 10px 0px">
            <div class = "top">
                <b><?= $post['title'] ? $post['title'] : '' ?></b>
                <span class = "time" style="float: right;">
                    <?= date("d.m.Y",strtotime($post['added'])) ?>
                </span>
            </div>
            <div class = "description">
                <?= $post['activity'] ? $post['activity'] : '' ?>
            </div>
            <!-- edit button -->
            <div class = "edit" style="float: right;">
                <a class="btn btn-warning" href="edit.php?id=<?php echo $post['id'];?>" role="button">Labot</a>
            <!-- if 'status' quals to not done, shows button -->
            <?php if ($post['status'] == 'not_done') { 
            ?> <a class="btn btn-success" href="isDone.php?id=<?php echo $post['id'];?>" role="button">&#x2713;</a> <?php 
            } else {

            }?>
            </div>
        </div>
    </div>
    

<?php endwhile; 
$mysqli->close();?>
