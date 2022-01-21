<?php
echo $msq;


    if ($user_q->num_rows()):

        $user_q = $user_q->result()[0];


        echo form_open(base_url("/Users/update/{$user_q->id}"));

        echo '<label>'. 'name'  .'</label>';
        echo form_input('name',$user_q->name);

        echo '<label>'. 'username'  .'</label>';
        echo form_input('log_in_name',$user_q->log_in_name);

        echo '<label>'. 'phone'  .'</label>';
        echo form_input('phone',$user_q->phone);

        echo '<label>'. 'password'  .'</label>';
        echo form_input('password',$user_q->password);

        echo '<label>'. 'active'  .'</label>';
        echo form_dropdown('active',array(1 =>'active',0=>'not active'),$user_q->active);

        echo form_submit('submit','save','class="btn btn-primary"');

        echo form_close();

    endif;

?>