<!-- <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head style-primary">
                <header>List Appointments</header>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" class="table table-condensed table-hover no-margin">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('appointment_name') ?></th>
                                <th><?= $this->Paginator->sort('appointment_start') ?></th>
                                <th><?= $this->Paginator->sort('appointment_end') ?></th>
                                <th><?= $this->Paginator->sort('appointment_address') ?></th>
                                <th><?= $this->Paginator->sort('appointment_SMS_alert') ?></th>
                                <th><?= $this->Paginator->sort('hiring_manager_id') ?></th>
                                <th class="actions text-right"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?= $this->Number->format($appointment->id) ?></td>
                                <td><?= h($appointment->appointment_name) ?></td>
                                <td><?= h($appointment->appointment_start) ?></td>
                                <td><?= h($appointment->appointment_end) ?></td>
                                <td><?= h($appointment->appointment_address) ?></td>
                                <td><?= $this->Number->format($appointment->appointment_SMS_alert) ?></td>
                                <td><?= $appointment->has('hiring_manager') ? $this->Html->link($appointment->hiring_manager->hiring_manager_name, ['controller' => 'HiringManagers', 'action' => 'view', $appointment->hiring_manager->id]) : '' ?></td>
                                <td class="actions text-right">
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="View appointment"><i class="fa fa-info"></i></button>',
                                    ['action' => 'view', $appointment->id],
                                    ['escape' => false]) ?>
                                <?= $this->Html->link(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit appointment"><i class="fa fa-pencil"></i></button>',
                                    ['action' => 'edit', $appointment->id],
                                    ['escape' => false]) ?>
                                <?= $this->Form->postLink(
                                    '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Delete appointment"><i class="fa fa-trash"></i></button>', 
                                    ['action' => 'delete', $appointment->id],
                                    ['confirm' => __('Are you sure you want to delete # {0}?', $appointment->id), 'escape' => false]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('<i class="fa fa-angle-left"></i> ',
                        ['escape' => false]) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('<i class="fa fa-angle-right"></i>',
                        ['escape' => false]) ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="fab_wrapper">
        <?= $this->Html->link(
            '<button class="btn btn_fab btn-primary"><i class="fa fa-plus"></i></button>',
            ['action' => 'add'],
            ['escape' => false]) ?>
    </div>
</div> -->


<?= $this->Html->css('theme/libs/fullcalendar/fullcalendar') ?>
<?= $this->Html->script('libs/fullcalendar/moment.min') ?>
<?= $this->Html->script('libs/fullcalendar/fullcalendar.min') ?>

<section>
    <div class="section-header">
        <ol class="breadcrumb">
            <li class="active">Calendar</li>
        </ol>
    </div>
    <div class="section-body">
        <div class="row">

            <!-- BEGIN CALENDAR EVENTS -->
            <div class="col-sm-3">
                <h2>Upcoming events</h2>
                <p class="opacity-75">Please plan your upcomming events by dragging them on the calendar.</p>
                <br/>
                <div class="checkbox checkbox-styled">
                    <label>
                        <input id="drop-remove" type="checkbox" checked>
                        <span>Remove after drop</span>
                    </label>
                </div>
                <br/>
                <ul class="list divider-full-bleed list-events">
                    <li class="tile">
                        <div class="tile-content">
                            <div class="tile-text">Call clients for follow-up</div>
                            <div class="tile-icon"><i class="fa fa-circle-thin text-primary"></i></div>
                        </div>
                    </li>
                    <li class="tile" data-class-name="event-warning">
                        <div class="tile-content">
                            <div class="tile-text">Schedule meeting</div>
                            <div class="tile-icon"><i class="fa fa-circle-thin text-warning"></i></div>
                        </div>
                    </li>
                    <li class="tile" data-class-name="event-info">
                        <div class="tile-content">
                            <div class="tile-text">Upload files to server</div>
                            <div class="tile-icon"><i class="fa fa-circle-thin text-info"></i></div>
                        </div>
                    </li>
                    <li class="tile" data-class-name="event-success">
                        <div class="tile-content">
                            <div class="tile-text">Book flight for holiday</div>
                            <div class="tile-icon"><i class="fa fa-circle-thin text-success"></i></div>
                        </div>
                    </li>
                    <li class="tile" data-class-name="event-danger">
                        <div class="tile-content">
                            <div class="tile-text">Receive shipment</div>
                            <div class="tile-icon"><i class="fa fa-circle-thin text-danger"></i></div>
                        </div>
                    </li>
                    <li class="tile" data-class-name="event-default">
                        <div class="tile-content">
                            <div class="tile-text">Go to concert</div>
                            <div class="tile-icon"><i class="fa fa-circle-thin text-default"></i></div>
                        </div>
                    </li>
                </ul>
            </div><!--end .col -->
            <!-- END CALENDAR EVENTS -->

            <!-- BEGIN CALENDAR -->
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-head style-primary">
                        <header>
                            <span class="selected-day">&nbsp;</span> &nbsp;<small class="selected-date">&nbsp;</small>
                        </header>
                        <div class="tools">
                            <div class="btn-group">
                                <a id="calender-prev" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-left"></i></a>
                                <a id="calender-next" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-angle-right"></i></a>
                            </div>
                            <div class="btn-group pull-right">
                            </div>
                        </div>
                        <ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
                            <li data-mode="month" class="active"><a href="#">Month</a></li>
                            <li data-mode="agendaWeek"><a href="#">Week</a></li>
                            <li data-mode="agendaDay"><a href="#">Day</a></li>
                        </ul>
                    </div><!--end .card-head -->
                    <div class="card-body no-padding">
                        <div id="calendar"></div>
                    </div><!--end .card-body -->
                </div><!--end .card -->
            </div><!--end .col -->
            <!-- END CALENDAR -->

        </div><!--end .row -->
    </div><!--end .section-body -->
</section>

<script type="text/javascript">
$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        weekends: false, // will hide Saturdays and Sundays
        dayClick: function() {
            alert('a day has been clicked!');
        },
        
    })

});
</script>