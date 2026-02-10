<!DOCTYPE html>
<?php echo"
<html lang='en' data-footer='true'>
    <head>
        <meta charset='UTF-8' />
        <link rel='preconnect' href='https://fonts.gstatic.com' />
        <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
        <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
        <link rel='stylesheet' href='font/CS-Interface/style.css' />
        <link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
        <link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
        <link rel='stylesheet' href='css/vendor/select2.min.css' />
        <link rel='stylesheet' href='css/vendor/select2-bootstrap4.min.css' />
        <link rel='stylesheet' href='css/vendor/fullcalendar.min.css' />
        <link rel='stylesheet' href='css/vendor/bootstrap-datepicker3.standalone.min.css' />
        <link rel='stylesheet' href='css/styles.css' />
        <link rel='stylesheet' href='css/main.css' />
        <script src='js/base/loader.js'></script>
        
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet'>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>";
        
        ?><style>
            
            .sidebar {
                position: fixed;
                top: 0;
                right: -400px;
                width: 400px;
                height: 100%;
                background-color: #f4f4f4;
                box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
                overflow-y: auto;
                padding: 20px;
                transition: right 0.3s ease;
                z-index: 1000;
            }
            .sidebar.open {
                right: 0;
            }
            .sidebar header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }
            .sidebar header h2 {
                margin: 0;
                font-size: 20px;
            }
            .sidebar header .close-btn {
                background: none;
                border: none;
                font-size: 24px;
                cursor: pointer;
                color: #333;
            }
            .sidebar form {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }
            
            
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
            .overlay.active {
                display: block;
            }
            
        </style><?php
        
    echo"</head>

    <body>

    <div class='container'>
        <div class='page-title-container'>
            <div class='row g-0'>
                <div class='col-auto mb-2 mb-md-0 me-auto'>
                    <div class='w-auto sw-md-30'>
                        <h1 class='mb-0 pb-0 display-4' id='title'>Calendar</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=calendar.php'>My Calendar</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class='w-100 d-md-none'></div>";
                    /*
                    <div class='col col-md-auto d-flex align-items-start justify-content-end'>
                        <button type='button' class='btn btn-outline-primary btn-icon btn-icon-start ms-1 w-100 w-md-auto' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight'data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&url=calendar.php&ctitle=Add New Task', 'offcanvasRight')\"><i data-acorn-icon='plus'></i> <span>Task</span></button>
                    </div>
                    
                    <div class='col col-md-auto d-flex align-items-start justify-content-end'>
                        <button type='button' class='btn btn-outline-secondary btn-icon btn-icon-start ms-1 w-100 w-md-auto' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight'data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&url=calendar.php&ctitle=Add New Event', 'offcanvasRight')\"><i data-acorn-icon='plus'></i> <span>Event</span></button>
                    </div>
                    <div class='col col-md-auto d-flex align-items-start justify-content-end'>
                        <button type='button' class='btn btn-outline-tertiary btn-icon btn-icon-start ms-1 w-100 w-md-auto' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight'data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&url=calendar.php&ctitle=Add New ToDo', 'offcanvasRight')\"><i data-acorn-icon='plus'></i> <span>ToDo</span></button>
                    </div>
                    */
                echo"</div>
            </div>
            <div id='calendar-container'>
                <div class='card'>
                    <div class='card-body'>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
            
            <div class='overlay' id='overlay'></div>
            
            <div class='sidebar' id='sidebar' style='background-color:#111111;z-index:9999'>
                <header>
                    <h2 id='form-title'>Add Task</h2>
                    <button class='close-btn' id='close-sidebar'>&times;</button>
                </header>
                <form id='add-event-form'>
                    <input type='hidden' name='processor' value='tasklist'><input type='hidden' name='id' value=''>";
                    $randid=rand(100,999);
                    $ctime=time();
                    $rdate=date("Y-m-d H:m:s",$ctime);                
                    $next_uid=0;
                    echo"<fieldset><div class='row'>
                        <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Task Title*</label>
            			    <input type='text' class=form-control id='event-title' placeholder='Task Title' name='title' value='' required>
                        </div></div>
                        <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Task Detail*</label>
            			    <textarea id='event-detail' name='detail' class='form-control'></textarea>
                        </div></div>
                        <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                            <label>Start Date & Time *</label>
                            <input type='datetime-local' id='event-start' class='form-control' name='start' value='' placeholder='Start Date & Time' required>
                        </div></div>
                        
                        <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                            <label>Start Date & Time *</label>
                            <input type='datetime-local' id='event-end' class='form-control' name='end' value='' placeholder='End Date & Time' required>
                        </div></div>
                        
                        <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                                <label>Assignee Name * </label>
                                <select class='form-control m-b required' id='event-employeeid' name='employeeid' required>";
                                    if($mtype=="ADMIN"){
                                        echo"<option value=''>Select Employee</option>";
                                        $s7 = "select * from uerp_user where mtype='ADMIN' and status='1' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        } }
                                        $s7 = "select * from uerp_user where mtype='USER' and status='1' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        } }
                                    }else{
                                        $s7 = "select * from uerp_user where id='".$_COOKIE["userid"]."' and status='1' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        } }
                                    }
                                echo"</select>
                            </div></div>
                            <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                                <label>Participants Name *</label>
                                <select class='form-control m-b required' id='event-clientid' name='clientid'>
                                    <option value=''>Select Participant Name</option>";
                                    if($mtype=="ADMIN"){
                                        $s77 = "select * from project where status='1' order by name asc";
                                        $r77 = $conn->query($s77);
                                        if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
                                            if($rs77["lead"]==0) $leadstatus="Closed";
                                            if($rs77["lead"]==1) $leadstatus="Lead";
                                            if($rs77["lead"]==2) $leadstatus="Project";
                                            if($rs77["lead"]==3) $leadstatus="Missed";
            
                                            $s7 = "select * from uerp_user where id='".$rs77["clientid"]."' order by id asc limit 1";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                $clientname="".$rs7["username"]." ".$rs7["username2"]."";
                                            } }
                                            echo"<option value='".$rs77["id"]."'>".$rs77["name"]." ($clientname) ($leadstatus).</option>";
                                        } }
                                    }else{
                                        $s7 = "select * from project_team_allocation where employeeid='".$_COOKIE["userid"]."' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            $s71 = "select * from project where id='".$rs7["projectid"]."' order by id asc limit 1";
                                            $r71 = $conn->query($s71);
                                            if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                                $s72 = "select * from uerp_user where id='".$rs71["clientid"]."' and status='1' order by id asc limit 1";
                                                $r72 = $conn->query($s72);
                                                if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                    echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                                } }
                                            } }
                                        } }     
                                    }
                                echo"</select>
                            </div></div>
                            
                            <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Task Mode *</label>
                                <select class='form-control m-b required' id='event-mode' name='mode'>
                                    <option value=''>Select Task Mode</option>
                                    <option value='OPEN'>OPEN</option>
                                    <option value='SELECTIVE'>SELECTIVE</option>
                                </select>
                            </div></div>
                            <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Priority Level *</label>
            			        <select class='form-control m-b required' id='event-priority' name='priority'>
            			            <option value='1'>1 (Neutral)</option><option value='0'>0 (Low)</option><option value='2'>2 (Medium)</option>
            			            <option value='3'>3 (High)</option>
            			        </select>
                            </div></div>
                        
                    </div></fieldset>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                        if(isset($_GET["projectid"])) $projectid=$_GET["projectid"];
                        else $projectid=0;
                        echo"<input type='hidden' id='event-projectid' name='projectid' value='$projectid'>
                        <button type='button' class='btn btn-outline-danger' id='delete-event-btn'>Delete Task</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type='submit' class='btn btn-outline-primary'>Submit</button>
                        
                    </div>
                </form>
            </div>
            
            
            <div class='modal modal-right fade' id='newEventModal' tabindex='-1' role='dialog' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='modalTitle'>Add Task</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body d-flex flex-column'>
                            <div class='mb-3 top-label'><input class='form-control' id='eventTitle' /><span>TITLE</span></div>
                            <div class='mb-3 top-label'>
                                <select id='eventCategory'>
                                      <option label='&nbsp;'></option>
                                      <option data-class='border-primary' value='Work'>Work</option>
                                      <option data-class='border-tertiary' value='Personal'>Personal</option>
                                      <option data-class='border-secondary' value='Education'>Education</option>
                                </select>
                                <span>CATEGORY</span>
                            </div>
                            <div class='row g-0'>
                                <div class='col pe-2'>
                                    <div class='mb-3 top-label'>
                                        <input type='text' data-provide='datepicker' class='form-control' data-date-autoclose='true' id='eventStartDate' />
                                        <span>START DATE</span>
                                    </div>
                                </div>
                                <div class='col-auto'>
                                    <div class='mb-3 top-label custom-control-container time-picker-container'>
                                        <input class='form-control time-picker' id='eventStartTime' />
                                        <span>START TIME</span>
                                    </div>
                                </div>
                            </div>
                            <div class='row g-0'>
                                <div class='col pe-2'>
                                    <div class='mb-3 top-label'>
                                        <input type='text' data-provide='datepicker' class='form-control' data-date-autoclose='true' id='eventEndDate' />
                                        <span>END DATE</span>
                                    </div>
                                </div>
                                <div class='col-auto'>
                                    <div class='mb-3 top-label custom-control-container time-picker-container'>
                                        <input class='form-control time-picker' id='eventEndTime' />
                                        <span>END TIME</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='modal-footer border-0'>
                            <button class='btn btn-icon btn-icon-only btn-outline-primary' type='button' data-delay='{'show':'500', 'hide':'0'}' data-bs-toggle='tooltip' data-bs-placement='top' title='Delete' id='deleteEvent'><i data-acorn-icon='bin'></i></button>
                            <button class='btn btn-icon btn-icon-end btn-primary' type='button' id='saveEvent'><span>Save</span><i data-acorn-icon='check'></i></button>
                            <button class='btn btn-icon btn-icon-start btn-primary' type='button' id='addEvent'><i data-acorn-icon='plus'></i><span>Add</span></button>
                        </div>
                    </div>
                </div>
            </div>
          
            <!-- Delete Confirm Modal Start -->
            <div class='modal fade modal-close-out' id='deleteConfirmModal' tabindex='-1' role='dialog' aria-labelledby='deleteConfirmModal' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='verticallyCenteredLabel'>Are you sure?</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <span id='deleteConfirmDetail' class='fw-bold'></span>
                            <span>will be deleted. Are you sure?</span>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>No</button>
                            <button type='button' id='deleteConfirmButton' class='btn btn-outline-primary'>Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
        // <script src='js/vendor/fullcalendar/main.min.js'></script>
        echo"<script src='js/vendor/moment-with-locales.min.js'></script>
        <script src='js/vendor/datepicker/bootstrap-datepicker.min.js'></script>
        <script src='js/vendor/timepicker.js'></script>
        <script src='js/base/helpers.js'></script>
        <script src='js/base/globals.js'></script>
        <script src='js/base/nav.js'></script>
        <script src='js/base/search.js'></script>
        <script src='js/base/settings.js'></script>";
        // <script src='js/apps/calendar.js'></script>
        echo"<script src='js/common.js'></script>
        <script src='js/scripts.js'></script>"; ?>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const calendarEl = document.getElementById('calendar');
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('overlay');
                const addEventForm = document.getElementById('add-event-form');
                const closeSidebarBtn = document.getElementById('close-sidebar');
                const addEventBtn = document.getElementById('add-event-btn');
                const deleteEventBtn = document.getElementById('delete-event-btn');
                const formTitle = document.getElementById('form-title');
                let selectedEvent = null;
                
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    editable: true,
                    selectable: true,
                    headerToolbar: {
                        left: 'prev,next today addEventButton',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    customButtons: {
                        addEventButton: {
                            text: 'Add Task',
                            click: function () {
                                selectedEvent = null;
                                formTitle.textContent = 'Add Task';
                                addEventForm.reset();
                                deleteEventBtn.style.display = 'none';
                                openSidebar();
                            }
                        }
                    },
                    
                    dateClick: function (info) {
                        selectedEvent = null;
                        document.getElementById('event-start').value = info.dateStr + 'T00:00';
                        document.getElementById('event-end').value = info.dateStr + 'T23:59';
                        formTitle.textContent = 'Add Task';
                        deleteEventBtn.style.display = 'none';
                        openSidebar();
                    },
                    
                    events: async function (fetchInfo, successCallback, failureCallback) {
                        try {
                            const response = await axios.get('calendar_backend.php');
                            successCallback(response.data);
                        } catch (error) {
                            console.error('Error fetching events:', error);
                            failureCallback(error);
                        }
                    },
                    
                    eventDrop: async function (info) {
                        try {
                            await axios.post('calendar_backend.php', {
                                id: info.event.id,
                                detail: info.event.detail,
                                employeeid: info.event.employeeid,
                                clientid: info.event.clientid,
                                projectid: info.event.projectid,
                                mode: info.event.mode,
                                priority: info.event.priority,
                                start: info.event.start.toISOString(),
                                end: info.event.end ? info.event.end.toISOString() : null
                            });
                            alert('Task updated successfully!');
                        } catch (error) {
                            console.error('Error updating event:', error);
                            alert('Failed to update Task.');
                            info.revert();
                        }
                    },
                
                    eventClick: function (info) {
                        selectedEvent = info.event;
                        formTitle.textContent = 'Edit Task';
                        document.getElementById('event-title').value = selectedEvent.title;
                        document.getElementById('event-detail').value = selectedEvent.detail;
                        document.getElementById('event-employeeid').value = selectedEvent.employeeid;
                        document.getElementById('event-clientid').value = selectedEvent.clientid;
                        document.getElementById('event-projectid').value = selectedEvent.projectid;
                        document.getElementById('event-mode').value = selectedEvent.mode;
                        document.getElementById('event-priority').value = selectedEvent.priority;
                        document.getElementById('event-start').value = selectedEvent.start.toISOString().slice(0, 16);
                        document.getElementById('event-end').value = selectedEvent.end ? selectedEvent.end.toISOString().slice(0, 16) : '';
                        
                        deleteEventBtn.style.display = 'block';
                        openSidebar();
                    }
                });
    
                calendar.render();
    
                function openSidebar() {
                    sidebar.classList.add('open');
                    overlay.classList.add('active');
                }
    
                function closeSidebar() {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('active');
                }
    
                overlay.addEventListener('click', closeSidebar);
                
                closeSidebarBtn.addEventListener('click', closeSidebar);
                
                // ADD
                addEventForm.addEventListener('submit', async function (e) {
                    e.preventDefault();
    
                    const title = document.getElementById('event-title').value;
                    const start = document.getElementById('event-start').value;
                    const end = document.getElementById('event-end').value;
                    const detail = document.getElementById('event-detail').value;
                    const employeeid = document.getElementById('event-employeeid').value;
                    const clientid = document.getElementById('event-clientid').value;
                    const mode = document.getElementById('event-mode').value;
                    const priority = document.getElementById('event-priority').value;
                    const projectid = document.getElementById('event-projectid').value;
    
                    const newEvent = { title, start, end, detail, employeeid, clientid, mode, priority, projectid };
                    
                    // const newEvent = { title, start, end };
    
                    try {
                        const response = await axios.post('calendar_backend.php', newEvent);
                        calendar.addEvent({ ...newEvent, id: response.data.id });
                        alert('Task added successfully!');
                        closeSidebar();
                        addEventForm.reset();
                    } catch (error) {
                        console.error('Error adding task:', error);
                        alert('Failed to add task.');
                    }
                });
                
                //DELETE
                deleteEventBtn.addEventListener('click', async function () {
                    if (confirm('Are you sure you want to delete this Task?')) {
                        await axios.post('calendar_backend.php', { id: selectedEvent.id, delete: true });
                        selectedEvent.remove();
                        closeSidebar();
                    }
                });
            });
        </script><?php
        
    echo"</body>
</html>";
?>