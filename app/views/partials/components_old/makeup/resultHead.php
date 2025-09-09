<div class="mb-2">
    <div>
        <div class="text-center text-muted mb-2">
            <h4 class="bold text-primary">RESULT SLIP</h4>
            <div class="small text-400">Approval Date: 23rd March 2023</div>
        </div>
        <div class="d-none">
            <div class="centeredB">
                <span class="mr-3">Name: <?=$data['studentaccounts_fullname']?></span>
                <span>RegNo: SMS/<?=$data['studentID']?>/23</span>
            </div>
            <div>
                Class: <?=$data['classrooms_title']?>
            </div>
            <div class="">Session: <?=toTerm($data['academicSession']).' of '.$data['academicYear'] ?></div>
            <div class="small text-400">Result Approval Date: 23rd March 2023</div>
        </div>
        <div class="mb-3 ">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <th>RegNo</th>
                        <th>Date of Birth</th>
                        <th>Class</th>
                        <th>Session</th>
                    </tr>
                    <tr>
                        <td><?=$data['studentaccounts_fullname']?></td>
                        <td>SMS/<?=$data['studentID']?>/23</td>
                        <td>20th June 2008</td>
                        <td><?=$data['classrooms_title']?></td>
                        <td><?=toTerm($data['academicSession']).' of '.$data['academicYear'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>