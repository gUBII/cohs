<style>
            body, html {
                margin: 0;
                padding: 0;
                height: 100%;
                overflow-x: hidden;
            }
    
            .draggable {
                cursor: grab;
                padding: 6px 10px;
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
                min-height: 120px;
                padding: 10px;
            }
    
            .close-btn {
                position: absolute;
                top: 2px;
                right: 8px;
                color: white;
                font-weight: bold;
                cursor: pointer;
            }
    
            .transition {
                transition: all 0.3s ease;
            }
    
            #layoutWrapper {
                display: flex;
                width: 100%;
                height: 100%;
                position: relative;
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
</style>


<?php

    error_reporting(0);

    echo"<div class='container'>
        <div class='hide-area page-title-container'>";
            
            if($mtype=="ADMIN"){
                echo"<div class='row'>
                    <div class='col-12 col-sm-6'><h1 class='mb-0 pb-0 display-4' id='title'>My Dashboard</h1><p>Global Dashboard</p></div>
                        <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRightx' aria-controls='offcanvasRightx' style='margin-right:10px'>
                                ☰&nbsp;&nbsp;<span>Custom Dashboard</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class='page-title-container'>
                    <div class='row'>
                        <div class='col-12 col-sm-12'>
                            <span style='font-size:12pt'>Welcome back to Nexis 365, <b>$username $username2</b></span><br>
                            <span style='font0-size:15pt'>Quickly access your Dashboards, Projects, Tasks, Leads, Inbox and workspaces, and many other modules from one platform.</span>
                        </div>
                    </div>
                </div>";
            }
            
            if($_COOKIE["dbname"]=="saas_info_goodwillcare_net"){
            
                // Handle drag drop updates
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['items'])) {
                        $data = json_decode($_POST['items'], true);
                        foreach ($data as $item) {
                            $stmt = $conn->prepare("UPDATE global_dashboard SET row_pos = ?, col_pos = ?, position = ?, visible = 1 WHERE id = ?");
                            $stmt->bind_param("iiii", $item['row'], $item['col'], $item['position'], $item['id']);
                            $stmt->execute();
                            $stmt->close();
                        }
                        echo "success";
                        exit;
                    }
                
                    // Handle hiding item
                    if (isset($_POST['hide_id'])) {
                        $hideId = (int)$_POST['hide_id'];
                        $stmt = $conn->prepare("UPDATE global_dashboard SET visible = 0, row_pos = NULL, col_pos = NULL WHERE id = ?");
                        $stmt->bind_param("i", $hideId);
                        $stmt->execute();
                        $stmt->close();
                        echo "hidden";
                        exit;
                    }
                }
                
                // Fetch all items
                $result = $conn->query("SELECT * FROM global_dashboard ORDER BY position ASC");
                $items = [];
                while ($row = $result->fetch_assoc()) {
                    $items[] = $row;
                }
    
                echo"<div id='layoutWrapper'>
                    <div id='contentWrapper'>
                        <div class='grid-container'>";
                            for ($i = 1; $i <= 1; $i++){
                                for ($j = 1; $j <= 3; $j++){
                                    echo"<div class='grid-cell' data-row='$i' data-col='$j'>";
                                        $cellItems = array_filter($items, fn($it) => $it['row_pos'] == $i && $it['col_pos'] == $j && $it['visible']);
                                        usort($cellItems, fn($a, $b) => $a['position'] <=> $b['position']);
                                        foreach ($cellItems as $item){
                                            echo"<div id='item-".$item['id']."' class='draggable' draggable='true' data-id='".$item['id']."'>
                                                <span class='close-btn' onclick=\"hideItem(".$item['id'].")\">×</span>
                                                ".$item['name']."<hr>";
                                                $v1=0;
                                                $v2=0;
                                                $v1=strtolower($item['name']);
                                                $v2=str_replace(" ","_",$v1);
                                                include("$v2.php");
                                            echo"</div>";
                                        }
                                    echo"</div>";
                                }
                            }
                        echo"</div>
                    </div>
                    
                    <div class='offcanvas offcanvas-end' tabindex='-1' id='offcanvasRightx' aria-labelledby='offcanvasRightLabel' style='z-index:9999'>
                        <div class='offcanvas-header'>
                            <h5 id='offcanvasRightLabel'>Custom Widgets</h5>
                            <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                        </div>
                        
                        <div class='offcanvas-body' > 
                            <section class='scroll-section' id='existingHtml'>
                                <div id='existingHtmlList'>
                                    <div id='sidebarDrawer'>
                                        <div id='sidebar-items'>";
                                            foreach ($items as $item){
                                                if ($item['visible'] == 0){
                                                    echo"<div id='item-".$item['id']."' class='draggable' draggable='true' data-id='".$item['id']."'>123 ".$item['name']."</div>";
                                                }
                                            }
                                        echo"</div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>";
            }
            
            if($mtype=="ADMIN"){
                echo"<div class='row'>
                    <div class='mb-5'>
                        <div class='row g-2'>";
                            $t=0;
                            $m2x = "select * from solutions where dashboard='1' and status='1' and id<>'10006' order by orders asc";
                            $m22x = $conn->query($m2x);
                            if ($m22x->num_rows > 0) { while($m222x = $m22x->fetch_assoc()) { $t=($t+1); } }
                            if($t>=2){
                                $t=0;
                                $m1 = "select * from solutions where dashboard='1' and status='1' order by orders asc";
                                $m11 = $conn->query($m1);
                                if ($m11->num_rows > 0) { while($m111 = $m11->fetch_assoc()) {
                                    $m1x = "select * from modules where parent='".$m111["id"]."' and status='1' and orders='1' order by orders asc limit 1";
                                    $m11x = $conn->query($m1x);
                                    if ($m11x->num_rows > 0) { while($m111x = $m11x->fetch_assoc()) {
                                        $dashboardname=0;
                                        $dashboardname=strtolower($m111x["name"]);
                                        $dashboardname=str_replace(" ","_",$dashboardname); 
                                        $dashboardid=$m111x["id"];
                                        $dashboardnamex=$m111x["name"];
                                    } }
                                    $t=($t+1);
                                    echo"<div class='col-6 col-sm-6 col-lg-4' data-title='".$m111["name"]."' data-intro='$dashboardnamex -  View All in this Dashboard.' data-step='$t'>
                                        <a href='$mainurl/index.php?url=$dashboardname.php&id=$dashboardid' data-href='$mainurl/index.php?url=$dashboardname.php&id=$dashboardid'>
                                            <div class='card hover-border-primary' style='height:100px'>
                                                <div class='card-body'><center><span>$dashboardnamex</span></center></div>
                                            </div>
                                        </a>
                                    </div>";
                                } }
                            }else{
                                $m1 = "select * from solutions where dashboard='1' and status='1' and id<>'10006' order by orders asc limit 1";
                                $m11 = $conn->query($m1);
                                if ($m11->num_rows > 0) { while($m111 = $m11->fetch_assoc()) {
                                    $m1x = "select * from modules where parent='".$m111["id"]."' and status='1' and orders='1' order by orders asc limit 1";
                                    $m11x = $conn->query($m1x);
                                    if ($m11x->num_rows > 0) { while($m111x = $m11x->fetch_assoc()) {
                                        $dashboardname=0;
                                        $dashboardname=strtolower($m111x["name"]);
                                        $dashboardname=str_replace(" ","_",$dashboardname); 
                                        $dashboardid=$m111x["id"];
                                        $dashboardnamex=$m111x["name"];
                                    } }
                                    echo"<form method='get' action='index.php' name='main' target='_top'>
                                        <input type=hidden name='url' value='$dashboardname.php'><input type=hidden name='id' value='$dashboardid'>
                                    </form>";
                                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                                } }
                            }
                        echo"</div>
                    </div>
                </div>";
            
                
            }else if($mtype=="USER"){
                
                include ("users_dashboard.php");
                
            }else if($mtype=="CLIENT"){
            
                include ("client_dashboard.php");
            }
            
        echo"</div>
    </div>";
?>

<script>
    const toggleBtn = document.getElementById("toggleSidebarBtn");
    const sidebar = document.getElementById("sidebarDrawer");
    const content = document.getElementById("contentWrapper");
    
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
            const container = cell;
            if (!dragged.querySelector(".close-btn")) {
                const close = document.createElement("span");
                close.className = "close-btn";
                close.innerText = "×";
                close.onclick = () => hideItem(dragged.dataset.id);
                dragged.appendChild(close);
            }
            
            container.appendChild(dragged);
            
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
        const item = document.getElementById("item-" + id);
        item.remove();
        fetch("", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: `hide_id=${id}`
        }).then(res => res.text()).then(data => {
            if (data === "hidden") {
                const sidebar = document.getElementById("sidebar-items");
                const closeBtn = item.querySelector(".close-btn");
                if (closeBtn) closeBtn.remove();
                sidebar.appendChild(item);
                makeDraggable(item);
            }
        });
    }
</script>