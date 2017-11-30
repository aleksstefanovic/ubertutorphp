<div class="row">
    <div class="col-3">
        <?php if ($transaction['statusId'] == 1 && $user['roleId'] == 2) { ?>
         <form method="post" action="/content/transactions/process_transaction_approval.php">
            <button class="btn btn-secondary" type="submit">Approve</button>
            <input type="hidden" name="transactionid" value=<?php echo $transaction['id'] ?> />
            <input type="hidden" name="tutorid" value=<?php echo $transaction['tutorid'] ?> />
            <input type="hidden" name="approval" value="1" />
         </form>
         <form method="post" action="/content/transactions/process_transaction_approval.php">
            <button class="btn btn-secondary" type="submit">Reject</button>
            <input type="hidden" name="transactionid" value=<?php echo $transaction['id'] ?> />
            <input type="hidden" name="tutorid" value=<?php echo $transaction['tutorid'] ?> />
            <input type="hidden" name="approval" value="0" />
         </form>
        <?php } else if($transaction['statusId'] == 3 && $user['roleId'] == 2) { ?>
         <form method="post" action="/content/transactions/process_transaction_finish.php">
            <input class="form-control" name="startdatetime" type="datetime-local" placeholder="Start time..." >
            <br />
            <input class="form-control" name="enddatetime" type="datetime-local" placeholder="End time..." >
            <br />
            <button class="btn btn-secondary" type="submit">Finish</button>
            <small class="form-text uber-tutor-error"><?php echo $_SESSION['transactions-finish-message'] ?></small>
            <input type="hidden" name="transactionid" value=<?php echo $transaction['id'] ?> />
            <input type="hidden" name="tutorid" value=<?php echo $transaction['tutorid'] ?> />
         </form>
        <?php } else { ?>
            <p><?php echo $transaction['status'] ?></p>
        <?php } ?>
    </div>
    <div class="col">
        <p><?php echo $transaction['name'] ?></p>
    </div>
    <div class="col">
        <?php if (empty($transaction['startTime'])) { ?>
            <p>N/A</p>
        <?php } else { ?>
            <p><?php echo $transaction['startTime'] ?></p>
        <?php } ?>
    </div>
    <div class="col">
        <?php if (empty($transaction['endTime'])) { ?>
            <p>N/A</p>
        <?php } else { ?>
            <p><?php echo $transaction['endTime'] ?></p>
        <?php } ?>
    </div>
    <div class="col">
        <p>$<?php echo $transaction['totalCost'] ?></p>
    </div>
</div>
