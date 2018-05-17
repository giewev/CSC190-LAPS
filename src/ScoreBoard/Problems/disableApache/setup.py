import os;
cmd = "sshpass -p 'goodyear123!@#' ssh -T -o StrictHostKeyChecking=no root@192.168.56.1 'service httpd stop'";
print(os.system(cmd));
