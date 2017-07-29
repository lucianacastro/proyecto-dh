<?php

//usser y password pueden variar de máquina en máquina, esta es la de mi compu(Luciana)
$comando = 'mysql --user=root --password=root teamUp < teamUp.dump.sql';

system($comando, $error);