<?php 
// require 'PAGES/config.php'; 
?>
<div class="table-wrapper">
    <table border = 1 class="fl-table">
        <thead>
        <tr>
            <th>#</th>
            <th>NAME OF PARTICIPANT</th>
            <th>CONTACT</th>
            <th>ADDRESS</th>
            <th>REMARKS</th>
            <th>EVENT NAME</th>
            <th>JOINED TIME</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        $rows = mysqli_query($conn, "SELECT * FROM event_participants");
        foreach($rows as $row) :
        ?>
        <tr>
            <td> <?php echo $i++; ?> </td>
            <td> <?php echo $row["name"]; ?> </td>
            <td> <?php echo $row["contact"]; ?> </td>
            <td> <?php echo $row["address"]; ?> </td>
            <td> <?php echo $row["remarks"]; ?> </td>
            <td> <?php echo $row["event_name"]; ?> </td>
            <td> <?php echo $row["joined_at"]; ?> </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>