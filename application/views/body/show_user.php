




<table class="table">
    <thead>
    <th>id</th>
    <th>name</th>
    <th>username</th>
    <th>phone</th>
    <th>statue</th>
    </thead>

    <tbody>


    <?php foreach ($user->result() as  $row): ?>

        <tr>
            <td> <?= $row->id ?> </td>
            <td> <?= $row->name ?> </td>
            <td> <?= $row->log_in_name ?> </td>
            <td> <?= $row->phone ?> </td>
            <td>
                <?php
                    if($row->active==1)
                        {
                            echo 'active';
                        }
                    else
                        {
                            echo 'not active';
                        }
                ?>
            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>


</table>




