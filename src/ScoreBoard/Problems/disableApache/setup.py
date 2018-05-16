import os;
cmd = "sshpass -p 'goodyear123!@#' ssh-t root@192.168.56.1 sudo service apache2 stop";
os.system(cmd);
