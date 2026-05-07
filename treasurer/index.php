<?php
require("../db.php");
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "treasurer") {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['save'])) {
    $student_id = $_POST['student_id'];
    $class = $_POST['class'];
    $term = $_POST['term'];
    $total_fee = $_POST['total_fee'];
    $amount_paid = $_POST['amount_paid'];
    $date = $_POST['payment_date'];

    $balance = $total_fee - $amount_paid;
    $status = ($balance <= 0) ? "Paid" : "Unpaid";

    mysqli_query($conn, "
    INSERT INTO fees (student_id, class, term, total_fee, amount_paid, balance, payment_date, status)
    VALUES ('$student_id','$class','$term','$total_fee','$amount_paid','$balance','$date','$status')
    ");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM fees WHERE fee_id='$id'");
}

$students = mysqli_query($conn, "SELECT * FROM student");

$totalToday = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT SUM(amount_paid) as t FROM fees WHERE payment_date=CURDATE()"))['t'] ?? 0;

$totalOutstanding = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT SUM(balance) as t FROM fees"))['t'] ?? 0;

$paidCount = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as t FROM fees WHERE status='Paid'"))['t'];

$unpaidCount = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) as t FROM fees WHERE status='Unpaid'"))['t'];

$filter = "";
if (isset($_GET['class'])) {
    $c = $_GET['class'];
    $filter .= " AND f.class='$c'";
}
if (isset($_GET['term'])) {
    $t = $_GET['term'];
    $filter .= " AND f.term='$t'";
}


$fees = mysqli_query($conn, "
SELECT f.*, s.first_name, s.last_name
FROM fees f
JOIN student s ON f.student_id = s.student_id
WHERE 1=1 $filter
ORDER BY f.payment_date DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="treasurer.css">
</head>

<body>


<div class="navbar">

    <div class="nav-center">
      <h2>Treasurer dashboard</h2>
    </div>

    <div class="nav-right">
        <a href="../class_teacher/logout.php">
<button style="background: #f3295b;color:white;">Logout</button>
</a>
    </div>
</div>


<div class="cards">
<div>Total Today: <?php echo $totalToday; ?></div>
<div>Outstanding: <?php echo $totalOutstanding; ?></div>
<div>Paid Students: <?php echo $paidCount; ?></div>
<div>Defaulters: <?php echo $unpaidCount; ?></div>
</div>

<h3>Add Payment</h3>
<form method="POST">
<select name="student_id" required>
<option>Select Student</option>
<?php while($s = mysqli_fetch_assoc($students)) { ?>
<option value="<?php echo $s['student_id']; ?>">
<?php echo $s['first_name']." ".$s['last_name']; ?>
</option>
<?php } ?>
</select>

<input type="number" name="class" placeholder="Class" required>
<input type="number" name="term" placeholder="Term" required>
<input type="number" name="total_fee" placeholder="Total Fee" required>
<input type="number" name="amount_paid" placeholder="Amount Paid" required>
<input type="date" name="payment_date" required>

<button name="save">Save Payment</button>
</form>

<form method="GET">
<input type="number" name="class" placeholder="Filter Class">
<input type="number" name="term" placeholder="Filter Term">
<button>Filter</button>
</form>

<h3>Payment History</h3>
<table>
<tr>
<th>Name</th>
<th>Class</th>
<th>Amount</th>
<th>Balance</th>
<th>Date</th>
<th>Term</th>
<th>Status</th>
<th>Actions</th>
</tr>

<?php while($f = mysqli_fetch_assoc($fees)) { ?>
<tr>
<td><?php echo $f['first_name']." ".$f['last_name']; ?></td>
<td><?php echo $f['class']; ?></td>
<td><?php echo $f['amount_paid']; ?></td>
<td><?php echo $f['balance']; ?></td>
<td><?php echo $f['payment_date']; ?></td>
<td><?php echo $f['term']; ?></td>
<td><?php echo $f['status']; ?></td>

<td>
<button onclick="receipt('<?php echo $f['first_name']; ?>',<?php echo $f['amount_paid']; ?>,'<?php echo $f['payment_date']; ?>')">
Receipt
</button>

<a href="?delete=<?php echo $f['fee_id']; ?>" onclick="return confirm('Delete?')">
<button>Delete</button>
</a>
</td>

</tr>
<?php } ?>
</table>

<h3>Students with balance</h3>
<table>
<tr><th>Name</th><th>Class</th><th>Balance</th></tr>

<?php
$def = mysqli_query($conn,"
SELECT f.*, s.first_name, s.last_name
FROM fees f
JOIN student s ON f.student_id=s.student_id
WHERE f.balance > 0
");

while($d = mysqli_fetch_assoc($def)) {
?>
<tr>
<td><?php echo $d['first_name']." ".$d['last_name']; ?></td>
<td><?php echo $d['class']; ?></td>
<td><?php echo $d['balance']; ?></td>
</tr>
<?php } ?>
</table>

<!-- RECEIPT MODAL -->
<div id="modal">
<div class="modal-content">
<h3>Receipt</h3>
<p id="r_name"></p>
<p id="r_amount"></p>
<p id="r_date"></p>
<button onclick="closeModal()">Close</button>
</div>
</div>

<script>
function receipt(name, amount, date){
    document.getElementById("modal").style.display="block";
    document.getElementById("r_name").innerText="Name: "+name;
    document.getElementById("r_amount").innerText="Amount: "+amount;
    document.getElementById("r_date").innerText="Date: "+date;
}

function closeModal(){
    document.getElementById("modal").style.display="none";
}
</script>

</body>
</html>