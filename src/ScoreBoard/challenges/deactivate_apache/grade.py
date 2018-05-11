import requests

request = requests.get("169.254.236.101")
if "Apache" in request.headers['server']:
    print "10"
else: 
    print "0"
