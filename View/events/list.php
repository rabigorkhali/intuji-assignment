<div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <table id="eventTable" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Action</th>
                            <th>Event Name</th>
                            <th>StartDate</th>
                            <th>End Date</th>
                            <th>Event ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['access_token'])) {
                            $incr = 1;
                            $events = $eventController->listEvents();
                            if (empty($events)) {
                                // echo "<tr><td colspan='5'>No events found. Please create new event.</td> </tr>";
                            } else {
                                foreach ($events as $event) {

                                    $startDateTime = null;
                                    $endDateTime = null;
                                    if ($event->getStart() && $event->getStart()->getDateTime()) {
                                        $startDateTime = $event->getStart()->getDateTime() ?? 'Not specified';
                                    }
                                    if ($event->getEnd() && $event->getEnd()->getDateTime()) {
                                        $endDateTime = $event->getEnd()->getDateTime() ?? 'Not specified';
                                    }

                                    echo "<tr>
                                    <td>{$incr}</td>
                                    <td>
                                         <form id='deleteForm{$event->getId()}' action='index.php' method='get' name='deleteEvent'>
                                            <input type='hidden' name='event_id' value='{$event->getId()}'>
                                            <input type='hidden' name='_method' value='DELETE'> 
                                            <button type='button' class='btn btn-sm btn-danger' onclick='confirmDelete(\"{$event->getId()}\")'>Delete</button>
                                        </form>
                                    </td>                                    
                                    <td>{$event->getSummary()}</td>
                                    <td>{$startDateTime}</td>
                                    <td>{$endDateTime}</td>
                                    <td>" . substr($event->getId(), 0, 40) . "</td>
                                    </tr>";
                                    $incr = $incr + 1;
                                }
                            }
                        } else {
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>