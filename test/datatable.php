<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Advanced DataTable</title>
    <style>
        tbody tr:hover {
            background-color: #fdf3c1;
        }
        tr.manager {
            background-color: #d2f4d2;
        }
        table { width:100%; border-collapse:collapse; margin-top:10px; }
        th, td { border:1px solid #ccc; padding:8px; text-align:left; }
        th.sortable:hover { cursor:pointer; background:#f1f1f1; }
    </style>
    <style media="print">
          body * {
            visibility: hidden;
          }
          table, table * {
            visibility: visible;
          }
          table {
            position: absolute;
            top: 0;
            left: 0;
          }
    </style>
</head>
<body>
<h2>Employee Records</h2>

<input type="text" id="search" placeholder="Search..." onkeyup="loadData()" style="margin-bottom:10px;">
<button onclick="exportCSV()">CSV</button>
<button onclick="exportPDF()">PDF</button>
<button onclick="window.print()">Print</button>
<a href="ajax/export_json.php" target="_blank"><button>JSON</button></a>
<button onclick="deleteSelected()" style="margin-bottom:10px;">Delete Selected</button>
<button onclick="showAddModal()" style="margin-bottom:10px;">Add New</button>
<button onclick="editSelected()" style="margin-bottom:10px;">Edit Selected</button>

<table id="dataTable">
    <thead>
        <tr>
            <th><input type="checkbox" id="select_all" onclick="toggleAll(this)"></th>
            <th class="sortable" onclick="sortData('id')">ID <span id="icon_id"></span></th>
            <th class="sortable" onclick="sortData('name')">Name <span id="icon_name"></span></th>
            <th class="sortable" onclick="sortData('email')">Email <span id="icon_email"></span></th>
            <th class="sortable" onclick="sortData('designation')">Designation <span id="icon_designation"></span></th>
            <th>Action</th>
        </tr>
        <tr>
            <th></th>
            <th><input type="text" id="filter_id" oninput="loadData()"></th>
            <th><input type="text" id="filter_name" oninput="loadData()"></th>
            <th><input type="text" id="filter_email" oninput="loadData()"></th>
            <th>
                <select id="filter_designation" onchange="loadData()">
                    <option value="">All</option>
                    <option>Manager</option>
                    <option>Developer</option>
                    <option>HR</option>
                </select>
            </th>
        </tr>
    </thead>
    <tbody id="tableData"></tbody>
</table>

<div id="pagination"></div>

<!-- Edit Modal -->
<div id="editModal" style="display:none; position:fixed; top:20%; left:30%; width:40%; background:#fff; border:1px solid #ccc; padding:20px;">
    <form id="editForm">
        <input type="hidden" id="edit_id" name="id">
        <label>Name:</label><br><input type="text" name="name" id="edit_name"><br><br>
        <label>Email:</label><br><input type="text" name="email" id="edit_email"><br><br>
        <label>Designation:</label><br><input type="text" name="designation" id="edit_designation" list="designationList" required>
        <datalist id="designationList">
            <option value="Manager"><option value="Developer"><option value="HR"><option value="Sales"><option value="Intern">
        </datalist>
        <button type="submit">Update</button>
        <button type="button" onclick="closeModal()">Cancel</button>
    </form>
</div>

<!-- Bulk Edit Modal -->
<div id="bulkEditModal" style="display:none; position:fixed; top:20%; left:30%; width:40%; background:#fff; border:1px solid #ccc; padding:20px; z-index:1000;">
    <form id="bulkEditForm">
        <label>Name:</label><br>
        <input type="text" name="name" placeholder="Leave blank to skip"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" placeholder="Leave blank to skip"><br><br>

        <label>Designation:</label><br>
        <input type="text" name="designation" placeholder="Leave blank to skip"><br><br>

        <button type="submit">Apply to Selected</button>
        <button type="button" onclick="document.getElementById('bulkEditModal').style.display='none'">Cancel</button>
        <button type="button" onclick="document.getElementById('bulkEditForm').reset()">Clear All Fields</button>
    </form>
</div>


<!-- Add Modal -->
<div id="addModal" style="display:none; position:fixed; top:20%; left:30%; width:40%; background:#fff; border:1px solid #ccc; padding:20px;">
    <form id="addForm">
        <label>Name:</label><br><input type="text" name="name" required><br><br>
        <label>Email:</label><br><input type="email" name="email" id="add_email" required onblur="checkDuplicateEmail()"><br>
        <small id="email_warning" style="color:red;display:none;">Email already exists!</small><br>
        <label>Designation:</label><br><input type="text" name="designation" id="designation_input" list="designationList" required>
        <datalist id="designationList">
            <option value="Manager"><option value="Developer"><option value="HR"><option value="Sales"><option value="Intern">
        </datalist>
        <button type="submit">Add</button>
        <button type="button" onclick="document.getElementById('addModal').style.display='none'">Cancel</button>
    </form>
</div>

<div id="toast" style="position:fixed; bottom:20px; right:20px; background:#333; color:#fff; padding:10px 20px; border-radius:5px; display:none;"></div>

<script>
    let currentPage = 1;
    let currentSort = 'id';
    let currentOrder = 'DESC';

    window.onload = function() {
        updateSortIcons();
        loadData();
    };

    function loadData() {
        const search = document.getElementById('search').value;
        const filters = {
            id: document.getElementById('filter_id').value,
            name: document.getElementById('filter_name').value,
            email: document.getElementById('filter_email').value,
            designation: document.getElementById('filter_designation').value
        };
    
        const params = new URLSearchParams({
            page: currentPage,
            search: search,
            sort: currentSort,
            order: currentOrder,
            ...filters
        });
    
        fetch(`ajax/fetch.php?${params.toString()}`)
            .then(res => res.json())
            .then(res => {
                document.getElementById("tableData").innerHTML = res.table;
                document.getElementById("pagination").innerHTML = res.pagination;
            });
    }

    function sortData(column) {
        if (currentSort === column) {
            currentOrder = currentOrder === 'ASC' ? 'DESC' : 'ASC';
        } else {
            currentSort = column;
            currentOrder = 'ASC';
        }
        updateSortIcons();
        loadData();
    }
    
    function updateSortIcons() {
        const columns = ['id', 'name', 'email', 'designation'];
        columns.forEach(col => {
            const icon = document.getElementById(`icon_${col}`);
            if (col === currentSort) {
                icon.innerHTML = currentOrder === 'ASC' ? '▲' : '▼';
            } else {
                icon.innerHTML = '';
            }
        });
    }

    function changePage(p) {
        currentPage = p;
        loadData();
    }
    
    function toggleAll(source) {
        const checkboxes = document.querySelectorAll('.row-check');
        checkboxes.forEach(checkbox => {
            checkbox.checked = source.checked;
        });
    }
    
    document.addEventListener("change", function (e) {
        if (e.target.classList.contains("row-check")) {
            const all = document.querySelectorAll(".row-check");
            const checked = document.querySelectorAll(".row-check:checked");
            document.getElementById("select_all").checked = all.length === checked.length;
        }
    });

    function showAddModal() {
        document.getElementById('addModal').style.display = 'block';
    }
    
    document.getElementById("addForm").onsubmit = function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        fetch('ajax/add.php', {
            method: 'POST',
            body: formData
        }).then(res => res.text())
          .then(() => {
            this.reset();
            document.getElementById('addModal').style.display = 'none';
            loadData();
        });
        showToast("Record added successfully");
    };

    function editRow(id, name, email, designation) {
        document.getElementById("edit_id").value = id;
        document.getElementById("edit_name").value = name;
        document.getElementById("edit_email").value = email;
        document.getElementById("edit_designation").value = designation;
        document.getElementById("editModal").style.display = 'block';
    }
    
    function editSelected() {
        const selected = Array.from(document.querySelectorAll('.row-check:checked')).map(el => el.value);
        if (selected.length === 0) {
            alert("No rows selected.");
            return;
        }
        document.getElementById('bulkEditModal').style.display = 'block';
    
        document.getElementById('bulkEditForm').onsubmit = function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('ids', selected.join(','));
    
            fetch('ajax/bulk_edit.php', {
                method: 'POST',
                body: formData
            }).then(res => res.text())
              .then(() => {
                  this.reset();
                  document.getElementById('bulkEditModal').style.display = 'none';
                  showToast("Bulk update successful");
                  loadData();
              });
        };
    }
    
    function closeModal() {
        document.getElementById("editModal").style.display = 'none';
    }
    
    document.getElementById("editForm").onsubmit = function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        fetch('ajax/update.php', {
            method: 'POST',
            body: formData
        }).then(res => res.text()).then(() => {
            closeModal();
            loadData();
        });
        showToast("Record updated successfully");
    };
    
    function checkDuplicateEmail() {
        const email = document.getElementById('add_email').value;
        if (email.length < 3) return;
        fetch('ajax/check_email.php?email=' + encodeURIComponent(email))
        .then(res => res.text())
        .then(data => {
            const warning = document.getElementById('email_warning');
            if (data === 'exists') {
                warning.style.display = 'inline';
            } else {
                warning.style.display = 'none';
            }
        });
    }

    function deleteOne(id) {
        if (!confirm("Delete this record?")) return;
    
        fetch('ajax/delete.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ ids: [id] })
        })
        .then(res => res.text())
        .then(() => loadData());
    }
    
    function deleteSelected() {
        const selected = Array.from(document.querySelectorAll('.row-check:checked')).map(el => el.value);
        if (selected.length === 0) {
            alert("No rows selected.");
            return;
        }
        if (!confirm("Delete selected records?")) return;
    
        fetch('ajax/delete.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ ids: selected })
        })
        .then(res => res.text())
        .then(() => loadData());
        showToast("Record(s) deleted successfully");

    }

    function exportCSV() {
        window.location.href = 'export/export_csv.php';
    }
    
    function exportPDF() {
        window.location.href = 'export/export_pdf.php';
    }
    
    function showToast(message) {
        const toast = document.getElementById('toast');
        toast.innerText = message;
        toast.style.display = 'block';
        setTimeout(() => toast.style.display = 'none', 3000);
    }

    window.onload = loadData;
</script>
</body>
</html>
