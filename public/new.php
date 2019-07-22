<?php require_once('../src/header.html'); ?>
<!-- form to create new to-do -->
        <div class = "col-8 mx-auto">
            <form method="POST" action="add.php">
                <div class="form-group">
                    <label for="title"><b>Virsraksts:</b></label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description"><b>Apraksts:</b></label>
                    <textarea class="form-control" rows="5" maxlength = "1000" name="activity"></textarea>
                </div>
                <a class="btn btn-secondary" href="index.php" role="button">Doties atpakaļ</a>
                <button type="submit" class="btn btn-success">Pievienot</button>
            </form>
        </div>
    </div>
</body>
</html>