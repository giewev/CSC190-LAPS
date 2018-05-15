import requests

request = requests.get("69.254.236.101/virus.html")
if "Apache" in request.headers['server']:
    print "0"
else: 
    print "10"
