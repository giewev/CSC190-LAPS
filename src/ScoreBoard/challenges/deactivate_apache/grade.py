import requests

request = requests.get("http://www.google.com")
if "Apache" in request.headers['server']:
    print "10"
else: 
    print "0"
