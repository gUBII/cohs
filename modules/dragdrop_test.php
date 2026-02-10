<?php
include ("../include.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['items'])) {
        $data = json_decode($_POST['items'], true);
        foreach ($data as $item) {
            $stmt = $conn->prepare("UPDATE items SET row_pos = ?, col_pos = ?, position = ?, visible = 1 WHERE id = ?");
            $stmt->bind_param("iiii", $item['row'], $item['col'], $item['position'], $item['id']);
            $stmt->execute();
            $stmt->close();
        }
        echo "success";
        exit;
    }

    if (isset($_POST['hide_id'])) {
        $hideId = (int)$_POST['hide_id'];
        $stmt = $conn->prepare("UPDATE items SET visible = 0, row_pos = NULL, col_pos = NULL WHERE id = ?");
        $stmt->bind_param("i", $hideId);
        $stmt->execute();
        $stmt->close();
        echo "hidden";
        exit;
    }
}

$result = $conn->query("SELECT * FROM items ORDER BY position ASC");
$items = [];
while ($row = $result->fetch_assoc()) {
    if ($row['id'] == 1) $row['name'] = 'Area Chart';
    elseif ($row['id'] == 2) $row['name'] = 'Bar Chart';
    elseif ($row['id'] == 3) $row['name'] = 'Line Chart';
    $items[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drag & Drop Grid with Clean Style</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-x: hidden;
        }

        .draggable {
            cursor: grab;
            background-color: #fff;
            color: black;
            border: 1px solid #000;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
            position: relative;
            width: 100%;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
        }

        .grid-cell {
            min-height: 250px;
            padding: 10px;
            background: #f9f9f9;
            position: relative;
        }

        .menu-wrapper {
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 20;
        }

        iframe.chart-frame {
            width: 100%;
            height: 400px;
            border: none;
        }

        #layoutWrapper {
            display: flex;
            width: 100%;
            height: 100%;
            position: relative;
        }

        #sidebarDrawer {
            position: absolute;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100vh;
            background-color: #f8f9fa;
            border-left: 1px solid #ddd;
            z-index: 1050;
            padding: 20px;
            overflow-y: auto;
        }

        #sidebarDrawer.show {
            right: 0;
        }

        #sidebar-items .draggable {
            background: #fff;
            color: black;
        }

        #contentWrapper {
            flex-grow: 1;
            transition: margin-right 0.3s ease;
            padding: 30px;
        }

        #contentWrapper.shifted {
            margin-right: 300px;
        }

        #toggleSidebarBtn {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1100;
        }

        #fullscreenModal {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            width: 100vw;
            height: 100vh;
            background: white;
            display: none;
            padding: 20px;
            overflow: auto;
        }

        #fullscreenModal.active {
            display: block;
        }

        #fullscreenModal .close-btn {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 28px;
            color: black;
            cursor: pointer;
            z-index: 10000;
        }
    </style>
</head>
<body>

<button id="toggleSidebarBtn" class="btn btn-primary">☰ Items</button>

<div id="fullscreenModal">
    <span class="close-btn" onclick="closeFullscreen()">×</span>
    <div id="fullscreenContent"></div>
</div>

<div id="layoutWrapper">
    <div id="contentWrapper">
        <div class="grid-container">
            <?php for ($i = 1; $i <= 1; $i++): ?>
                <?php for ($j = 1; $j <= 3; $j++): ?>
                    <div class="grid-cell" data-row="<?= $i ?>" data-col="<?= $j ?>">
                        <?php
                        $cellItems = array_filter($items, fn($it) => $it['row_pos'] == $i && $it['col_pos'] == $j && $it['visible']);
                        usort($cellItems, fn($a, $b) => $a['position'] <=> $b['position']);
                        foreach ($cellItems as $item):
                            $iframeSrc = $item['id'] == 1 ? 'areachart.php' :
                                         ($item['id'] == 2 ? 'barchart.php' :
                                         ($item['id'] == 3 ? 'linechart.php' : ''));
                        ?>
                            <div id="item-<?= $item['id'] ?>" class="draggable" draggable="true" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>">
                                <div class="menu-wrapper dropdown">
                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenu<?= $item['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                        ⋮
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu<?= $item['id'] ?>">
                                        <li><a class="dropdown-item" href="#" onclick="openFullscreen(event, '<?= $iframeSrc ?>')">Full screen</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="showSettings(<?= $item['id'] ?>)">Settings</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#" onclick="hideItem(<?= $item['id'] ?>)">Delete</a></li>
                                    </ul>
                                </div>
                                <iframe class="chart-frame" src="<?= $iframeSrc ?>"></iframe>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endfor; ?>
            <?php endfor; ?>
        </div>
    </div>

    <div id="sidebarDrawer" class="transition">
        <h5>Available Items</h5>
        <div id="sidebar-items">
            <?php foreach ($items as $item): ?>
                <?php if ($item['visible'] == 0): ?>
                    <div id="item-<?= $item['id'] ?>" class="draggable" draggable="true" data-id="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>">
                        <?= $item['name'] ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const toggleBtn = document.getElementById("toggleSidebarBtn");
    const sidebar = document.getElementById("sidebarDrawer");
    const content = document.getElementById("contentWrapper");
    const fullscreenModal = document.getElementById("fullscreenModal");
    const fullscreenContent = document.getElementById("fullscreenContent");

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("show");
        content.classList.toggle("shifted");
    });

    function makeDraggable(elem) {
        elem.addEventListener("dragstart", e => {
            e.dataTransfer.setData("text/plain", elem.id);
        });
    }

    document.querySelectorAll(".draggable").forEach(makeDraggable);

    document.querySelectorAll(".grid-cell").forEach(cell => {
        cell.addEventListener("dragover", e => e.preventDefault());
        cell.addEventListener("drop", e => {
            e.preventDefault();
            const itemId = e.dataTransfer.getData("text/plain");
            const dragged = document.getElementById(itemId);
            const itemName = dragged.dataset.name;
            const container = cell;

            let iframeSrc = "";
            if (itemName === "Area Chart") iframeSrc = "areachart.php";
            else if (itemName === "Bar Chart") iframeSrc = "barchart.php";
            else if (itemName === "Line Chart") iframeSrc = "linechart.php";

            const wrapper = document.createElement("div");
            wrapper.className = "draggable";
            wrapper.setAttribute("draggable", "true");
            wrapper.setAttribute("data-id", dragged.dataset.id);
            wrapper.setAttribute("data-name", itemName);
            wrapper.id = dragged.id;
            makeDraggable(wrapper);

            wrapper.innerHTML = `
                <div class="menu-wrapper dropdown">
                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">⋮</button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#" onclick="openFullscreen(event, '${iframeSrc}')">Full screen</a></li>
                        <li><a class="dropdown-item" href="#" onclick="showSettings(${dragged.dataset.id})">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="hideItem(${dragged.dataset.id})">Delete</a></li>
                    </ul>
                </div>
                <iframe class="chart-frame" src="${iframeSrc}"></iframe>
            `;

            container.appendChild(wrapper);
            dragged.remove();

            const updatedItems = [];
            container.querySelectorAll(".draggable").forEach((item, idx) => {
                updatedItems.push({
                    id: item.dataset.id,
                    row: container.dataset.row,
                    col: container.dataset.col,
                    position: idx
                });
            });

            fetch("", {
                method: "POST",
                headers: {"Content-Type": "application/x-www-form-urlencoded"},
                body: `items=${encodeURIComponent(JSON.stringify(updatedItems))}`
            }).then(res => res.text()).then(data => {
                if (data !== "success") alert("Update failed.");
            });
        });
    });

    function hideItem(id) {
        const item = document.querySelector(`.draggable[data-id='${id}']`);
        if (item) item.remove();

        fetch("", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: `hide_id=${id}`
        }).then(res => res.text()).then(data => {
            if (data === "hidden") {
                const sidebar = document.getElementById("sidebar-items");
                const newItem = document.createElement("div");
                newItem.id = "item-" + id;
                newItem.className = "draggable";
                newItem.setAttribute("draggable", "true");
                newItem.setAttribute("data-id", id);
                newItem.setAttribute("data-name", item.dataset.name);
                newItem.innerText = item.dataset.name;
                makeDraggable(newItem);
                sidebar.appendChild(newItem);
            }
        });
    }

    function openFullscreen(event, src) {
        event.preventDefault();
        fullscreenContent.innerHTML = `<iframe class="chart-frame" style="height: 90vh;" src="${src}"></iframe>`;
        fullscreenModal.classList.add("active");
    }

    function closeFullscreen() {
        fullscreenModal.classList.remove("active");
        fullscreenContent.innerHTML = "";
    }

    function showSettings(id) {
        alert("Settings for item " + id + " coming soon...");
    }
</script>

</body>
</html>
