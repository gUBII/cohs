<!DOCTYPE html>
<html>
<head>
  <title>Multi-Select Table with Edit/Delete</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      padding: 8px;
      border: 1px solid #ccc;
      text-align: left;
    }
    button {
      margin: 5px;
    }
    .hidden {
      display: none;
    }
  </style>
</head>
<body>

<h2>Manage Table</h2>

<!-- Action Buttons -->
<button onclick="editSelected()">Edit</button>
<button onclick="deleteSelected()">Delete</button>

<table id="dataTable">
  <thead>
    <tr>
      <th><input type="checkbox" onclick="toggleAll(this)"></th>
      <th>ID</th>
      <th>Name</th>
      <th>Role</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="checkbox" class="row-checkbox"></td>
      <td>1</td>
      <td contenteditable="false">John</td>
      <td contenteditable="false">Admin</td>
    </tr>
    <tr>
      <td><input type="checkbox" class="row-checkbox"></td>
      <td>2</td>
      <td contenteditable="false">Jane</td>
      <td contenteditable="false">Editor</td>
    </tr>
    <tr>
      <td><input type="checkbox" class="row-checkbox"></td>
      <td>3</td>
      <td contenteditable="false">Mark</td>
      <td contenteditable="false">Viewer</td>
    </tr>
  </tbody>
</table>

<script>
  // Toggle all checkboxes
  function toggleAll(source) {
    const checkboxes = document.querySelectorAll('.row-checkbox');
    checkboxes.forEach(cb => cb.checked = source.checked);
  }

  // Delete selected rows
  function deleteSelected() {
    const checkboxes = document.querySelectorAll('.row-checkbox:checked');
    if (checkboxes.length === 0) return alert("No rows selected");
    if (!confirm("Are you sure to delete selected rows?")) return;

    checkboxes.forEach(cb => cb.closest("tr").remove());
  }

  // Enable editing for selected rows
  function editSelected() {
    const rows = document.querySelectorAll('.row-checkbox:checked');
    if (rows.length === 0) return alert("No rows selected");

    rows.forEach(cb => {
      const cells = cb.closest("tr").querySelectorAll("td");
      // Make name and role editable (cells[2] and cells[3])
      cells[2].setAttribute("contenteditable", "true");
      cells[3].setAttribute("contenteditable", "true");
    });

    alert("Now you can edit Name and Role directly. Click outside the cell to save.");
  }
</script>

</body>
</html>
