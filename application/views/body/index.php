<table class="table">
    <thead>
        <th>id</th>
        <th>name</th>
        <th>username</th>
        <th>phone</th>
        <th>statue</th>
        <th>view user</th>
        <th>update</th>
    </thead>

    <tbody>


    <?php foreach ($users->result() as  $user): ?>

        <tr>
            <td> <?= $user->id ?> </td>
            <td> <?= $user->name ?> </td>
            <td> <?= $user->log_in_name ?> </td>
            <td> <?= $user->phone ?> </td>
            <td>
                <?php

                if($user->active==1)
                {
                    echo 'active';
                }
                else
                {
                    echo 'not active';
                }  ?>
            </td>
            <td> <a href="
            <?php

               echo base_url('/Users/show_user/').$user->id;

               ?>"> view user
                </a>
            </td>
            <td>

            </td>
        </tr>

    <?php endforeach; ?>

    </tbody>


</table>

<?php
echo $this->pagination->create_links();


