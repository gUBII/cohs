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
        <script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>
        
    </head>

    <body>

    <div class='container'>
        <div class='page-title-container'>
            <div class='row g-0'>
                <div class='col-auto mb-2 mb-md-0 me-auto'>
                    <div class='w-auto sw-md-30'>
                        <h1 class='mb-0 pb-0 display-4' id='title'>Calendar</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='Dashboards.Default.html'>Home</a></li>
                                <li class='breadcrumb-item'><a href='Apps.html'>Apps</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class='w-100 d-md-none'></div>
                    <div class='col-auto d-flex align-items-start justify-content-end'>
                        <button type='button' class='btn btn-outline-primary btn-icon btn-icon-only ms-1' id='goPrev'><i data-acorn-icon='chevron-left'></i></button>
                        <button type='button' class='btn btn-outline-primary btn-icon btn-icon-only ms-1' id='goNext'><i data-acorn-icon='chevron-right'></i></button>
                    </div>
                    <div class='col col-md-auto d-flex align-items-start justify-content-end'>
                        <button type='button' class='btn btn-outline-primary btn-icon btn-icon-start ms-1 w-100 w-md-auto' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight'data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&ctitle=Add New Task', 'offcanvasRight')\"><i data-acorn-icon='plus'></i> <span>New Task</span></button>
                    </div>
                    <div class='col col-md-auto d-flex align-items-start justify-content-end'>
                        <button type='button' class='btn btn-outline-secondary btn-icon btn-icon-start ms-1 w-100 w-md-auto' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight'data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&ctitle=Add New Event', 'offcanvasRight')\"><i data-acorn-icon='plus'></i> <span>New Event</span></button>
                    </div>
                    <div class='col col-md-auto d-flex align-items-start justify-content-end'>
                        <button type='button' class='btn btn-outline-tertiary btn-icon btn-icon-start ms-1 w-100 w-md-auto' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight'data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&ctitle=Add New ToDo', 'offcanvasRight')\"><i data-acorn-icon='plus'></i> <span>New ToDo</span></button>
                    </div>
                </div>
            </div>
          
            <!-- Calendar Title Start -->
            <div class='d-flex justify-content-between'>
                <h2 class='small-title' id='calendarTitle'>Event, Tasks & Notification Calendar</h2>
                <button class='btn btn-sm btn-icon btn-icon-only btn-foreground shadow align-top mt-n2' type='button' data-bs-toggle='dropdown' aria-expanded='false' aria-haspopup='true'>
                    <i data-acorn-icon='more-horizontal' data-acorn-size='15'></i>
                </button>
                <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end shadow'>
                    <a class='dropdown-item' href='#' id='monthView'>Month</a>
                    <a class='dropdown-item' href='#' id='weekView'>Week</a>
                    <a class='dropdown-item' href='#' id='dayView'>Day</a>
                    <div class='dropdown-divider'></div>
                    <a class='dropdown-item' href='#' id='goToday'>Today</a>
                </div>
            </div>
            
            <!-- Calendar Content Start -->
            <div id='calendar-container'>
                
                <div class='card'><div class='card-body'><div id='calendar'></div></div></div>
            </div>
            
            
            <div class='overlay' id='overlay'></div>
            
            <!-- New Task Start -->
            <div class='modal modal-right fade' id='newEventModal' tabindex='-1' role='dialog' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='modalTitle'>Add Event</h5>
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
    
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    editable: true, // Enable drag-and-drop
                    selectable: true,
                    headerToolbar: {
                        left: 'prev,next today addEventButton',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    customButtons: {
                        addEventButton: {
                            text: 'Add Event',
                            click: function () {
                                openSidebar();
                            }
                        }
                    },
                    dateClick: function (info) {
                        document.getElementById('event-start').value = info.dateStr + 'T00:00';
                        document.getElementById('event-end').value = info.dateStr + 'T23:59';
                        openSidebar();
                    },
                    events: async function (fetchInfo, successCallback, failureCallback) {
                        try {
                            const response = await axios.get('backend.php');
                            successCallback(response.data);
                        } catch (error) {
                            console.error('Error fetching events:', error);
                            failureCallback(error);
                        }
                    },
                    eventDrop: async function (info) {
                        try {
                            await axios.post('backend.php', {
                                id: info.event.id,
                                start: info.event.start.toISOString(),
                                end: info.event.end ? info.event.end.toISOString() : null
                            });
                            alert('Event updated successfully!');
                        } catch (error) {
                            console.error('Error updating event:', error);
                            alert('Failed to update event.');
                            info.revert();
                        }
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
    
                addEventForm.addEventListener('submit', async function (e) {
                    e.preventDefault();
                    const title = document.getElementById('event-title').value;
                    const start = document.getElementById('event-start').value;
                    const end = document.getElementById('event-end').value;
    
                    try {
                        const response = await axios.post('backend.php', { title, start, end });
                        calendar.addEvent({ ...response.data, title });
                        closeSidebar();
                        addEventForm.reset();
                    } catch (error) {
                        console.error('Error adding event:', error);
                        alert('Failed to add event.');
                    }
                });
            });
        </script><?php
        
    echo"</body>
</html>";
?>