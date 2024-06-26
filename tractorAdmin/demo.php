<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add and Remove Rows Dynamically</title>
</head>
<body>

<table id="myTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" name="name[]" /></td>
            <td><input type="text" name="email[]" /></td>
            <td><button type="button" onclick="removeRow(this)">Remove</button></td>
        </tr>
    </tbody>
</table>

<button type="button" onclick="addRow()">Add Row</button>

<script>
function addRow() {
    var table = document.getElementById("myTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    cell1.innerHTML = '<input type="text" name="name[]" />';
    cell2.innerHTML = '<input type="text" name="email[]" />';
    cell3.innerHTML = '<button type="button" onclick="removeRow(this)">Remove</button>';
}

function removeRow(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}
</script>

</body>
</html>
