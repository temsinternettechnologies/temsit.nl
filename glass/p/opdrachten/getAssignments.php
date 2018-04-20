<?php
require_once "../../core/init.php";

$assignments_todo = Database::select("select a.id as id, a.assignment as assignment, c.name as name, t.name as type, a.end_date as end_date from assignments as a inner join customer as c on a.customer_id = c.id inner join `type` as t on a.type_id = t.id where end_date >= NOW() and is_valid = true and done = false order by end_date");
$assignments_finished = Database::select("select a.assignment, c.name, t.name as type, a.end_date as end_date from assignments as a inner join customer as c on a.customer_id = c.id inner join `type` as t on a.type_id = t.id and is_valid = true and done = true order by end_date");

function dateDifference($date_1 )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create();

    $interval = date_diff($datetime1, $datetime2);

    return $interval->format("%a");

}

?>

<div class="row">
    <div class="offset-lg-2 offset-md-1 offset-xs-0 col-lg-8 col-md-10 col-xs-12 text-center">
        <h2>Opdrachten</h2>
        <div class="fake-table p-2">
            <div class="row">
                <div class="col col-lg-2 col-md-12 col-12 fake-table-head">Klant</div>
                <div class="col col-lg-2 col-md-6 col-6 fake-table-head">Afspraak</div>
                <div class="col col-lg-2 col-md-6 col-6 fake-table-head">Dagen resterend</div>
                <div class="col col-lg-4  col-md-10 col-10  fake-table-head">Opdracht</div>
                <div class="col col-lg-2  col-md-2 col-2 fake-table-head"><i class="fas fa-check-square"></i></div>
            </div>
            <?php
            foreach ($assignments_todo as $assignment) {
                ?>
                <div class="row fake-table-row">
                    <div class="col col-lg-2 col-md-12 col-12"><?=$assignment->name?></div>
                    <div class="col col-lg-2 col-md-6 col-6"><?=$assignment->type?></div>
                    <div class="col col-lg-2 col-md-6 col-6"><?=dateDifference($assignment->end_date)?></div>
                    <div class="col col-lg-4 col-md-10 col-10"><?=$assignment->assignment?></div>
                    <div class="col col-lg-2 col-md-2 col-2"><input onchange="assignment_checkbox(<?=$assignment->id?>)" title="<?=$assignment->id?>" type="checkbox"></div>
                </div>
                <?php
            }
            if($assignments_finished) {
                ?>
                <div class="row fake-table-row">
                    <div class="col col-12"></div>
                </div>
                <?php
                foreach ($assignments_finished as $assignment) {
                    ?>
                    <div class="row fake-table-row">
                        <div class="col col-lg-2 col-md-12 col-12"><?=$assignment->name?></div>
                        <div class="col col-lg-2 col-md-6 col-6"><?=$assignment->type?></div>
                        <div class="col col-lg-2 col-md-6 col-6"><?=dateDifference($assignment->end_date)?></div>
                        <div class="col col-lg-4 col-md-10 col-10"><?=$assignment->assignment?></div>
                        <div class="col col-lg-2 col-md-2 col-2"><i class="fas fa-check-square"></i></div>

                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>