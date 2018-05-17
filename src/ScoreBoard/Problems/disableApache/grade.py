import requests

try:
	request = requests.get("http://192.168.56.1")
	print "10"
except Exception as e:
	print "0"