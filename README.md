# !!! Not using in production, only local and testing

1. Make owner myself working catalog: sudo chown -R myself www
2. Add webserver permissions rwx:
	sudo chgrp -R www-data www
	sudo chmod -R ug+rwx www 
