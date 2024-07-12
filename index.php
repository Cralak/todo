<?php require_once 'tools.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your To-Does</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="script.js"></script>


</head>

<body id="body">
    <div id="main">
        <header>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#dcf8e6">
                <path
                    d="M120-80v-60h100v-30h-60v-60h60v-30H120v-60h120q17 0 28.5 11.5T280-280v40q0 17-11.5 28.5T240-200q17 0 28.5 11.5T280-160v40q0 17-11.5 28.5T240-80H120Zm0-280v-110q0-17 11.5-28.5T160-510h60v-30H120v-60h120q17 0 28.5 11.5T280-560v70q0 17-11.5 28.5T240-450h-60v30h100v60H120Zm60-280v-180h-60v-60h120v240h-60Zm180 440v-80h480v80H360Zm0-240v-80h480v80H360Zm0-240v-80h480v80H360Z" />
            </svg>
            <div class="title">
                <span>Todoes</span>
            </div>
        </header>

        <!-- ADD NEW TASK -->

        <form action="addtask.php" method="POST">
            <div class="task-container" id="temp-task">
                <div class="new-task">
                    <textarea name="newtask_text" autocomplete="off" class="newtask-input" placeholder="Describe your task..."></textarea>
                </div>
                <div class="newtask-datetime-add">
                    <div class="newtask-datetime" id="datetime-picker">
                        <div class="datetime-checkbox-container">
                            <span>DATE</span>
                            <input type="checkbox" id="datetimecheckbox" autocomplete="off" onClick="showDateTime()" value="Add deadline/date to do ?">
                            <div class="background-layer"></div>
                        </div>
                        <div id="newtask-datetime-container">
                            <div class="newtask-datetime-group"> 
                                <input name="newtask_date" type="date" class="date-picker" autocomplete="off">
                            </div>
                            <div class="newtask-datetime-group">
                                <div class="newtask-time-picker">
                                    <input name="newtask_time" type="time" class="time-picker" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="newtask-add">
                        <button type="submit" value="Submit" class="add">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                            
                        </button>
                        <button type="button" class="add" onClick="hideNewTask()">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </form>


        <!-- ADD TASK, SORT AND SEARCH BUTTONS -->

        <div class="add-sort-search">

            <!-- ADD TASK -->

            <button id="newtask-add" type="submit" class="add" title="Add new task" onClick="showNewTask()">
                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#dcf8e6"><path d="M450-280h60v-170h170v-60H510v-170h-60v170H280v60h170v170ZM180-120q-24 0-42-18t-18-42v-600q0-24 18-42t42-18h600q24 0 42 18t18 42v600q0 24-18 42t-42 18H180Zm0-60h600v-600H180v600Zm0-600v600-600Z"/></svg>
            </button>

            <!-- SORT -->

            <div class="button b2" id="button-10">
                <input type="checkbox" class="checkbox" />
                <div class="knobs">
                    <span>RECENT</span>
                </div>
                <div class="layer"></div>
            </div>

            <!-- SORT -->

            <div class="searchbar-container">
                <input type="text" class="searchbar">
                <button class="searchbar-button" type=submit>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                </button>
            </div>

        </div>

        <!-- Task -->

        <div class="all-tasks">
            <!-- All tasks -->

            <?php

            $tasks = fetchData("tasks");

            foreach ($tasks as $task): ?>


            <div class="task-container">
                <div class="task">
                    <?php echo $task[task_text]; ?>
                </div>
                <div class=task-dates>
                    <div class="task-deadline" title="<?php echo $task[task_deadline] ?>">
                    <?php

                        // $timezone = "<script type='text/javascript'>document.write(getTimeZone());</script>"; THIS DID NOT WORK

                        $date_deadline = new DateTime($task[task_deadline]);

                        $date_now = new DateTime(date("Y-m-d H:i:s"));

                        if ($date_deadline > $date_now){
                            $date_diff = $date_deadline->diff($date_now);
                            $str = dateTimeToString($date_diff);
                            if (!empty($str)){
                                echo $str . " remaining"; 
                            }
                        } else if (!empty($str)) {
                            echo "You missed your deadline !";
                        }

                        ?>
                    </div>
                    <div class="task-date-trash">
                        
                        <button class="delete-task" onClick="deleteTask(this.id)" id="<?php echo $task[id] ?>"  >
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        </button>
                        

                        <div class="task-date" title="<?php echo $task[task_date]; ?>">
                            <?php

                            // $timezone = "<script type='text/javascript'>document.write(getTimeZone());</script>"; THIS DID NOT WORK

                            $date_added = new DateTime($task[task_date]);

                            $date_now = new DateTime(date("Y-m-d H:i:s"));

                            $date_diff = $date_added->diff($date_now);

                            $str = dateTimeToString($date_diff);

                            echo $str . " ago"; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>