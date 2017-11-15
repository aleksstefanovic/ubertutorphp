<div class="row">
    <div class="col">
        <?php if ($transaction['statusId'] == 1 && $user['roleId'] == 2) { ?>
            <button class="btn btn-secondary">Approve</button>
        <?php } else if($transaction['statusId'] == 2 && $user['roleId'] == 2) { ?>
            <button class="btn btn-secondary">Finish</button>
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
        <p><?php echo $transaction['totalCost'] ?></p>
    </div>
</div>
