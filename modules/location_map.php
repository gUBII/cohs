<?php
    error_reporting(0);
    
    date_default_timezone_set("Australia/Melbourne");
    
    include("../authenticator.php");

    $query = "SELECT id, username, mtype, gender, latitude, longitude, onlinestatus FROM uerp_user WHERE latitude != '0.0000000000' AND longitude != '0.0000000000'";
    $result = mysqli_query($conn, $query);

    $locations = [];
    $userList = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $locations[] = $row;
        $userList[] = [ 'id' => $row['id'], 'username' => $row['username'], 'mtype' => $row['mtype'] ];
    } ?>

    <!DOCTYPE html>
    <html>
        <head>
            <style>
                #map { height: 90vh; width: 100%; }
                #controls { text-align: left; margin: 10px 0; }
                select, a.button { padding: 6px 12px; font-size: 16px; margin: 5px; }
                a.button { background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px; cursor: pointer; }
            </style>
        </head>
        <body>
            <div id="controls">
                <select id="userFilter" onchange="filterMarkers(this.value)" class='form-control'>
                    <option value="ALL">All</option>
                    <option value="ADMIN">Admin</option>
                    <option value="CLIENT">Client</option>
                    <option value="EMPLOYEE">Support Worker</option>
                </select>
                <select id="userSearch" onchange="findSelectedUser()" class='form-control'>
                    <option value="">-- Search User --</option>
                </select>
            </div>
            <div id="map"></div>
            <script>
                let map, allMarkers = [], cluster, radiusCircle;
                const centerLat = -33.8600, centerLng = 150.9600;
                let currentInfoWindow = null;

                const userList = <?php echo json_encode($userList); ?>;
                const locations = <?php echo json_encode($locations); ?>;

                function initMap() {
                    const centerPoint = { lat: centerLat, lng: centerLng };
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 14,
                        center: centerPoint
                    });
                
                    radiusCircle = new google.maps.Circle({
                        strokeColor: "#007BFF",
                        strokeOpacity: 0.5,
                        strokeWeight: 2,
                        fillColor: "#007BFF",
                        fillOpacity: 0.1,
                        map: map,
                        center: centerPoint,
                        radius: 10000
                    });
                    
                    loadMarkers(locations);
                    loadUserDropdown("ALL");
                }

                function loadUserDropdown(type = "ALL") {
                    const selectBox = document.getElementById('userSearch');
                    selectBox.innerHTML = '<option value="">-- Search User --</option>';
                
                    userList.forEach(user => {
                        if (type === "ALL" || user.mtype === type) {
                            const option = document.createElement('option');
                            option.value = user.username;
                            option.text = `${user.username} (${user.mtype === 'EMPLOYEE' ? 'Support Worker' : user.mtype})`;
                            selectBox.appendChild(option);
                        }
                    });
                }
                
                function loadMarkers(users) {
                if (allMarkers.length > 0) {
                    allMarkers.forEach(marker => marker.setMap(null));
                    allMarkers = [];
                    if (cluster) cluster.clearMarkers();
                }
                
                users.forEach(user => {
                    const lat = parseFloat(user.latitude), lng = parseFloat(user.longitude);
                    const position = { lat, lng };
                    const iconColor = user.mtype === "ADMIN" ? "red" : user.mtype === "CLIENT" ? "yellow" : "blue";
                
                    const marker = new google.maps.Marker({
                        position,
                        map,
                        icon: `http://maps.google.com/mapfiles/ms/icons/${iconColor}-dot.png`
                    });
                
                    marker.userType = user.mtype;
                    marker.username = user.username;
                    marker.gender = user.gender;
                    marker.mtype = user.mtype;
                    marker.userId = user.id;
                
                    marker.addListener("click", () => showMarkerInfo(marker));
                
                    allMarkers.push(marker);
                });
                
                cluster = new MarkerClusterer(map, allMarkers, {
                    imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m"
                });
                
                filterWithinRadius();
                }
                
                function showMarkerInfo(marker) {
                if (currentInfoWindow) currentInfoWindow.close();
                
                let targetType = (marker.userType === "CLIENT") ? "EMPLOYEE" : "CLIENT";
                
                let nearbyUsers = [];
                
                allMarkers.forEach(m => {
                    if (m.userType === targetType) {
                        const dist = google.maps.geometry.spherical.computeDistanceBetween(
                            marker.getPosition(),
                            m.getPosition()
                        );
                        nearbyUsers.push({ id: m.userId, username: m.username, gender: m.gender, mtype: m.mtype, distance: dist });
                    }
                });
                
                nearbyUsers.sort((a, b) => a.distance - b.distance);
                nearbyUsers = nearbyUsers.slice(0, 4);
                
                let content = `<strong>Name:</strong> ${marker.username}<br>
                <strong>Gender:</strong> ${marker.gender}<br>
                <strong>Type:</strong> ${marker.userType === "EMPLOYEE" ? "Support Worker" : marker.userType}<br>`;
                
                if (nearbyUsers.length > 0) {
                    content += `<hr><strong>Nearest Users:</strong><br>`;
                    nearbyUsers.forEach(u => {
                        content += `<a href="taskassign.php?eid=${marker.userId}&cid=${u.id}" target="_blank" style="color:blue;text-decoration:underline;">
                        ${u.username} - ${u.gender} - ${u.mtype === "EMPLOYEE" ? "Support Worker" : u.mtype}</a><br>`;
                    });
                } else {
                    content += `<span style="color:red;">No Nearby User Found</span>`;
                }
                
                const infoWindow = new google.maps.InfoWindow({ content: content });
                
                infoWindow.open(map, marker);
                currentInfoWindow = infoWindow;
                }
                
                function findSelectedUser() {
                const username = document.getElementById('userSearch').value;
                if (!username) return;
                
                const selectedMarker = allMarkers.find(marker => marker.username === username);
                if (!selectedMarker) return;
                
                let targetType = (selectedMarker.userType === "CLIENT") ? "EMPLOYEE" : "CLIENT";
                
                let nearbyUsers = [];
                
                allMarkers.forEach(m => {
                    if (m.userType === targetType) {
                        const dist = google.maps.geometry.spherical.computeDistanceBetween(
                            selectedMarker.getPosition(),
                            m.getPosition()
                        );
                        nearbyUsers.push({ marker: m, distance: dist });
                    }
                });
                
                nearbyUsers.sort((a, b) => a.distance - b.distance);
                nearbyUsers = nearbyUsers.slice(0, 4);
                
                allMarkers.forEach(m => m.setMap(null));
                
                selectedMarker.setMap(map);
                nearbyUsers.forEach(u => u.marker.setMap(map));
                
                map.setCenter(selectedMarker.getPosition());
                map.setZoom(14);
                
                showMarkerInfo(selectedMarker);
                }
                
                function filterMarkers(type) {
                    allMarkers.forEach(marker => {
                        if (type === "ALL" || marker.userType === type) {
                            marker.setMap(map);
                        } else {
                            marker.setMap(null);
                        }
                    });
                    loadUserDropdown(type);
                }
                
                function filterWithinRadius() {
                allMarkers.forEach(marker => {
                    const distance = google.maps.geometry.spherical.computeDistanceBetween(
                        new google.maps.LatLng(centerLat, centerLng),
                        marker.getPosition()
                    );
                    marker.setVisible(distance <= radiusCircle.getRadius());
                });
                }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgWVwzVHk2oOCIatI7x3h4i55MBJRKLIs&callback=initMap&libraries=geometry" async defer></script>
            <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
            
        </body>
    </html>
