<?php if(isset($_SESSION['msg']) or isset($_SESSION['error'])){ ?>
            <div class="box" id="msg_box">
               <div class="box-header text-center">
                   <?php if(isset($_SESSION['msg'])){ ?>
                   <p id="msg"><span class="label label-success"><?php echo $_SESSION['msg']; ?></span></p>
                   <?php unset($_SESSION['msg']); } ?>
                   <?php if(isset($_SESSION['error'])){ ?>
                   <p id="error"><span class="label label-danger"><?php echo $_SESSION['error']; ?></span></p>
                   <?php  unset($_SESSION['error']); } ?>
                </div>
            </div>
            <?php } ?>
<div id="msg" class="hidden">
  <a href="#" class="close"  onclick="hide()">&times;</a>
  <p id="msg_box"></p>
</div>
