import requests

request = requests.get("192.168.56.1")
if "Apache" in request.headers['server']:
    print "10"
else: 
    print "0"
